<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCameraReques;
use App\Http\Requests\UpdateCameraReques;
use App\Models\Cameras;
use App\Models\Nvrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $useDB;

    public function __construct(){
        $this->useDB        = new Cameras();

        //$this->middleware('role:Super-Admin');
        $this->middleware('permission:camera-list|camera-create|camera-edit|camera-delete', ['only' => ['index','store']]);
        $this->middleware('permission:camera-create', ['only' => ['create','store']]);
        $this->middleware('permission:camera-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:camera-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datas      =  $this->useDB->getAll();
        return view('camera.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $db_Nvrs = new Nvrs();
        $nvrs = $db_Nvrs->getAll();

        return view('camera.create', compact('nvrs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCameraReques $request)
    {
        $data = [
            'name'              =>      $request->name,
            'name_area'         =>      $request->name_area,
            'nvr_id'            =>      $request->nvr_id,
            'ip'                =>      $request->ip ,
            'speed'             =>      $request->speed ,
            'link'              =>      $request->link,
            'status'            =>      1,
            'note'              =>      $request->note,
            'created_at'        =>      now(),
            'updated_at'        =>      now(),
        ];

        //Lưu dữ liệu
        $this->useDB->insert($data);
        $notification = array(            
            'message' => 'Đã thêm '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('camera.index')->with($notification);
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

        $db_Nvrs = new Nvrs();
        $nvrs = $db_Nvrs->getAll();

        return view('camera.edit', compact('nvrs','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCameraReques $request, $id)
    {
        $data = [
            'name'              =>      $request->name,
            'name_area'         =>      $request->name_area,
            'nvr_id'            =>      $request->nvr_id,
            'ip'                =>      $request->ip ,
            'speed'             =>      $request->speed ,
            'link'              =>      $request->link,
            'note'              =>      $request->note,
            'updated_at'        =>      now(),
        ];

        //Cập nhật dữ liệu
        $this->useDB->updateData($data, $id);

        $notification = array(            
            'message' => 'Đã cập nhật '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('camera.index')->with($notification);
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
            return redirect()->route('camera.index')->with($notification);
        }else{
            $this->useDB->deleteData($id);

            $notification = array(            
                'message' => 'Đã xóa '. $dataId->name,
                'alert-type' => 'success'            
            );
            return redirect()->route('camera.index')->with($notification);
        }
    }
}
