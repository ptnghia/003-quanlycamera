<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thanhvien;
use Illuminate\Support\Facades\DB;



class ThanhvienController extends Controller
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
         $this->useDB = new Thanhvien();
     }
    public function index()
    {
        $data = $this->useDB->getAll();
        
        return view('page.danh_sach_thanh_vien', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.them_thanh_vien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Thanhvien();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('thanhvien.index')->with('success', 'User created successfully.');
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
        return view('page.sua_thanh_vien', compact('dataId'));
        
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
            'username'           =>      $request->username,
            'email'           =>      $request->email,
            'password'           =>      $request->password
            
        ];

        //Lưu dữ liệu
        $this->useDB->updateData($data_theodoi,$id);
        return redirect()->route('thanhvien.index')->with('success', 'User updated successfully.');
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
        return redirect()->route('thanhvien.index')->with('success', 'User deleted successfully.');
    }
}
