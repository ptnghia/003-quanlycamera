<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateidentifiedReques;
use App\Http\Requests\UpdateidentifiedReques;
use App\Models\Identified_cates;
use App\Models\Identified_histories;
use App\Models\Identified_images;
use App\Models\Identified_types;
use App\Models\Identifieds;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdentifiedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $useDB;

    public function __construct(){
        $this->useDB        = new Identifieds();
        //$this->middleware('role:Super-Admin');
        $this->middleware('permission:identified-list|identified-create|identified-edit|identified-delete|identified-show', ['only' => ['index','store', 'all','all_cate']]);
        $this->middleware('permission:identified-create', ['only' => ['create','store']]);
        $this->middleware('permission:identified-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:identified-delete', ['only' => ['destroy']]);
        $this->middleware('permission:identified-show', ['only' => ['all','all_cate']]);
    }

    public function index()
    {
        $db_cate = new Identified_cates();
        $cates = $db_cate->getAll();

        $db_type = new Identified_types();
        $types = $db_type->getAll();

        $row      =  $this->useDB->getAll();
        $datas=[];
        $db_img = new Identified_images();
        foreach($row as $key => $data){
            
            $images = $db_img->getOnde($data->id);
            if(!empty($images)){
                $url_img = $images->url;
            }else{
                $url_img='';
            }

            $datas[$key]['data']     = $data;
            $datas[$key]['image']    = $url_img;
        }
        //print_r($datas);
        //die();
        return view('identified.index', compact('datas','cates', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $db_cate = new Identified_cates();
        $cates = $db_cate->getAll();

        $db_type = new Identified_types();
        $types = $db_type->getAll();

        Session::put('key_upload', Auth::user()->id.time());

        return view('identified.create', compact('cates','types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateidentifiedReques $request)
    {
        $data = [
            'name'                  =>      $request->name,
            'identified_type_id'    =>      $request->identified_type_id,
            'identified_cate_id'    =>      $request->identified_cate_id,
            'note'                  =>       $request->note,
            'created_at'            =>      now(),
            'updated_at'            =>      now(),
        ];

        //Lưu dữ liệu
        $id = $this->useDB->insert($data);
        //lấy danh sách file trống chưa có van_ban_id của user
        $db_img= new Identified_images();
        $list_img = $db_img->getImgRong();
        foreach($list_img as $item){
            if($item ->key_file == $request->key_file){
                //nếu khớp thì cập nhật van_ban_id cho file
                $db_img->UpdateIdIdentified($id, $item->id);
            }else{
                //nếu sai thì xóa đồng thời xóa luôn file đã tải lên trước đó
                $db_img->deleteId($item->id);
            }
        }
        $notification = array(            
            'message' => 'Đã thêm '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('identified.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->useDB->getId($id);

        $db_img = new Identified_images();
        $images = $db_img->getAll($id);

        $db_his = new Identified_histories();
        $histories =  $db_his->getAll($id);

        return view('identified.show', compact('data','histories','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->useDB->getId($id);

        $db_cate = new Identified_cates();
        $cates = $db_cate->getAll();

        $db_type = new Identified_types();
        $types = $db_type->getAll();

        $db_img = new Identified_images();
        $images = $db_img->getAll($id);

        Session::put('key_upload', Auth::user()->id.time());

        return view('identified.edit', compact('cates', 'types', 'images', 'data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateidentifiedReques $request, $id)
    {
        $data = [
            'name'                  =>      $request->name,
            'identified_type_id'    =>      $request->identified_type_id,
            'identified_cate_id'    =>      $request->identified_cate_id,
            'note'                  =>      $request->note,
            'updated_at'            =>      now(),
        ];
        //Cập nhật dữ liệu
        $this->useDB->updateData($data, $id);
        //lấy danh sách file trống chưa có van_ban_id của user
        $db_img = new Identified_images();
        $list_img = $db_img->getImgRong();
        foreach($list_img as $item){
            if($item ->key_file == $request->key_file){
                //nếu khớp thì cập nhật van_ban_id cho file
                $db_img->UpdateIdIdentified($id, $item->id);
            }else{
                //nếu sai thì xóa đồng thời xóa luôn file đã tải lên trước đó
                $db_img->deleteId($item->id);
            }
        }
        $notification = array(            
            'message' => 'Đã cập nhật '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('identified.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataId = $this->useDB->getId($id);
        if(empty($dataId)){
            $notification = array(            
                'message' => 'Dữ liệu không tồn tại',
                'alert-type' => 'error'            
            );
            return redirect()->route('identified.index')->with($notification);
        }else{
            $this->useDB->deleteData($id);

            $notification = array(            
                'message' => 'Đã xóa '. $dataId->name,
                'alert-type' => 'success'            
            );
            return redirect()->route('identified.index')->with($notification);
        }
    }

    public function all(){

        $db_type = new Identified_types();
        $types = $db_type->getAll();

        $db_his = new Identified_histories();
        $datas = $db_his -> getAll_sukien();
        return view('identified.all', compact('datas','types'));
    }

    public function all_cate($id){

        $db_type = new Identified_types();
        $types = $db_type->getAll();

        $db_his = new Identified_histories();
        $datas = $db_his -> getAll_cate($id);

        return view('identified.all', compact('datas','types'));
    }
}
