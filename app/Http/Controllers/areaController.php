<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $useDB;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new Areas();
    }
   public function index()
   {
       $data = $this->useDB->getAll();
       
       return view('page.danh_sach_khu_vuc', compact('data'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('page.them_khu_vuc');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $user = new Areas();
       $user->name = $request->name;
       
       $user->save();

       return redirect()->route('area.index')->with('success', 'User created successfully.');
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
       $dataId = $this->useDB->getID($id);
       return view('page.sua_khu_vuc', compact('dataId'));
       
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
           
           
       ];

       //Lưu dữ liệu
       $this->useDB->updateData($data_theodoi,$id);
       return redirect()->route('area.index')->with('success', 'User updated successfully.');
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
       return redirect()->route('area.index')->with('success', 'User deleted successfully.');
   }
}
