<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nvrs;
use App\Models\Cameras;
use Illuminate\Support\Facades\DB;
use App\Models\Areas;
class nvrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */private $useDB;
     public function __construct()
     {
         $this->middleware('auth');
         $this->useDB = new Nvrs();
     }
    public function index()
    {
        $nvrs = Nvrs::all();
        
        foreach ($nvrs as $nvr) {
            $cameraQuantity = Cameras::where('nvr_id', $nvr->id)->count();
            $nvr->camera_quantity = $cameraQuantity;
            $nvr->save();
        }  
       
        
        $data = $this->useDB->getAll(); 
       
            
        return view('page.danh_sach_nvr', compact('data'));
    }

   

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areaModel = new Areas();
        $dataArea = $areaModel->getAll();
        return view('page.them_danh_sach_nvr',compact('dataArea'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Nvrs();
        $user->name = $request->name;
        $user->status = $request->status;
        $user->IP = $request->IP;
        $user->serial = $request->serial;
        $user->area_id = $request->area_id;
        $user->version = $request->version;
        $user->camera_quantity = $request->camera_quantity;
        $user->note = $request->note;
        $user->link = $request->link;
        $user->user_id = $request->user_id ;
        $user->save();

        return redirect()->route('nvr.index')->with('success', 'User created successfully.');
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
        //$dataArea = DB::table('areas')->get();
        $areaModel = new Areas();

        // Gọi phương thức getUserName() của model User
        $dataArea = $areaModel->getAll();

        $dataId = $this->useDB->getId($id);
        return view('page.sua_nvr', compact('dataId','dataArea'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_theodoi = [
            'name'           =>      $request->name,
            'status'           =>      $request->status,
            'IP'           =>      $request->IP,
            'serial'           =>      $request->serial,
            'area_id'           =>      $request->area_id,
            'version'           =>      $request->serial,
            'camera_quantity'           =>      $request->camera_quantity,
            'serial'           =>      $request->serial,
            'note'           =>      $request->note,
            'link'           =>      $request->link,
            'user_id'       =>     $request->user_id
        ];
       
        //Lưu dữ liệu
        $this->useDB->updateData($data_theodoi,$id);
        return redirect()->route('nvr.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->useDB->deleteData($id);
        return redirect()->route('nvr.index')->with('success', 'User deleted successfully.');
    }
}
