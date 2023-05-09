<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNvrReques;
use App\Http\Requests\UpdateNvrReques;
use App\Models\Areas;
use App\Models\Nvrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NvrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $useDB;

    public function __construct(){
        $this->useDB        = new Nvrs();
        //$this->middleware('role:Super-Admin');
        $this->middleware('permission:nvr-list|nvr-create|nvr-edit|nvr-delete', ['only' => ['index','store']]);
        $this->middleware('permission:nvr-create', ['only' => ['create','store']]);
        $this->middleware('permission:nvr-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:nvr-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datas      =  $this->useDB->getAll();
        return view('nvr.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $db_Areas = new Areas();
        $areas = $db_Areas->getAll();

        return view('nvr.create', compact('areas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNvrReques $request)
    {
        $data = [
            'name'              =>      $request->name,
            'serial'            =>      $request->serial,
            'version'           =>      $request->version,
            'area_id'          =>       $request->area_id ,
            'ip'                =>      $request->ip,
            'port'              =>      $request->port,
            'note'              =>      $request->note,
            'status'            =>      $request->status,
            'created_at'        =>      now(),
            'updated_at'        =>      now(),
        ];

        //Lưu dữ liệu
        $this->useDB->insert($data);
        $notification = array(            
            'message' => 'Đã thêm '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('nvr.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $db_Areas = new Areas();
        $areas = $db_Areas->getAll();

        return view('nvr.edit', compact('areas','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNvrReques $request, $id)
    {
        $data = [
            'name'              =>      $request->name,
            'serial'            =>      $request->serial,
            'version'           =>      $request->version,
            'area_id'          =>       $request->area_id ,
            'ip'                =>      $request->ip,
            'port'              =>      $request->port,
            'note'              =>      $request->note,
            'status'            =>      $request->status,
            'updated_at'        =>      now(),
        ];
        //Cập nhật dữ liệu
        $this->useDB->updateData($data, $id);

        $notification = array(            
            'message' => 'Đã cập nhật '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('nvr.index')->with($notification);
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
            return redirect()->route('nvr.index')->with($notification);
        }else{
            $this->useDB->deleteData($id);

            $notification = array(            
                'message' => 'Đã xóa '. $dataId->name,
                'alert-type' => 'success'            
            );
            return redirect()->route('nvr.index')->with($notification);
        }
    }
}
