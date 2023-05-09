<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevideoReques;
use App\Http\Requests\UpdatevideoReques;
use App\Models\Identified_images;
use App\Models\Identified_types;
use App\Models\Video_identifieds;
use App\Models\videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $useDB;

    public function __construct(){
        $this->useDB        = new videos();
        //$this->middleware('role:Super-Admin');
        $this->middleware('permission:video-list|video-create|video-edit|video-delete', ['only' => ['index','store']]);
        $this->middleware('permission:video-create', ['only' => ['create','store']]);
        $this->middleware('permission:video-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:video-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //unlink('uploads/videos/1683641181_vlc-record-2023-04-11-01h36m35s-rtsp___kdcbenloi.zapto.org_555_Streaming_channels_102-.mp4');
        $datas      =  $this->useDB->getAll();
        return view('video.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatevideoReques $request)
    {
        if (session()->has('video_file')) {

            $data = [
                'name'              =>      $request->name,
                'note'              =>      $request->note,
                'url'               =>      session('video_file'),
                'status'            =>      0,
                'created_at'        =>      now(),
                'updated_at'        =>      now(),
            ];

            //Lưu dữ liệu
            $this->useDB->insert($data);
            Session::forget('video_file');

            $notification = array(            
                'message' => 'Đã thêm '.$request->name,
                'alert-type' => 'success'            
            );
        }else{
            $notification = array(            
                'message' => 'Chưa upload file video',
                'alert-type' => 'error'            
            );
        }
        return redirect()->route('video.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $db_his = new Video_identifieds();
        $histories =  $db_his->getAll($id);

        $db_type = new Identified_types();
        $types = $db_type->getAll();

        $data = $this->useDB->getId($id);
        return view('video.show', compact('data','histories','types'));
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

        return view('video.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevideoReques $request, $id)
    {
        $dataId = $this->useDB->getId($id);

        if (session()->has('video_file')) {
            unlink($dataId->url);
            $data = [
                'name'              =>      $request->name,
                'note'              =>      $request->note,
                'url'               =>      session('video_file'),
                'updated_at'        =>      now(),
            ];
        }else{
            $data = [
                'name'              =>      $request->name,
                'note'              =>      $request->note,
                'updated_at'        =>      now(),
            ];
        }
        
        //Cập nhật dữ liệu
        $this->useDB->updateData($data, $id);
        Session::forget('video_file');
        $notification = array(            
            'message' => 'Đã cập nhật '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('video.index')->with($notification);
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
            return redirect()->route('video.index')->with($notification);

        }else{
            unlink($dataId->url);
            $this->useDB->deleteData($id);

            $notification = array(            
                'message' => 'Đã xóa '. $dataId->name,
                'alert-type' => 'success'            
            );
            return redirect()->route('video.index')->with($notification);
        }
    }
}
