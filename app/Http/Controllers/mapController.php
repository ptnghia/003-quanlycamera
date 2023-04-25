<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Maps;
use App\Models\Cameras;

class mapController extends Controller
{
    protected $useDB;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new Maps();
        
    }
   public function index()
   {
    
       
      
       $data = $this->useDB->getAll();    
       return view('page.ban_do_so', compact('data'));
   }

  

   

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $areaModel = new Areas();
       $cameraModel = new Cameras();
       $dataArea = $areaModel->getAll();
       $dataCamera = $cameraModel->getAll();
       return view('page.them_ban_do_so',compact('dataArea', 'dataCamera'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $user = new Maps();
       $user->name = $request->name;
       $user->area_id = $request->area_id;
       $user->camera_id = $request->camera_id;
       
       $user->location = $request->location;
       
       $user->save();

       return redirect()->route('map.index')->with('success', 'Map created successfully.');
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
