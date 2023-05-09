<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThanhvienReques;
use App\Http\Requests\UpdateThanhvienReques;
//use App\Models\Permission;
//use App\Models\Role;
use App\Models\Thanhvien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class ThanhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $useDB;

    public function __construct(){
        $this->useDB        = new Thanhvien();
        //$this->middleware('role:Super-Admin');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datas      =  $this->useDB->getAll();
        return view('thanh-vien.index', compact('datas'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::orderBy('id','DESC')->get();
        
        $permission = Permission::get();

        if(auth()->user()->hasRole('Super-Admin')){
            $roles = Role::pluck('name','name')->all();
        }else{
           $roles = Role::pluck('name','name')->except(['name', 'Super-Admin']);
        }

        return view('thanh-vien.create', compact('role', 'roles','permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateThanhvienReques $request)
    {
       
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        $notification = array(            
            'message' => 'Đã thêm '.$request->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('thanh-vien.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=0)
    {
        $role = Role::orderBy('id','DESC')->paginate(5);
        $user = User::find($id);
        if($user->hasRole('Super-Admin')){
            $notification = array(            
                'message' => "You have no permission for edit this user",
                'alert-type' => 'error'            
            );
            return redirect()->route('users.index')
                            ->with($notification);
        }
        if(auth()->user()->hasRole('Super-Admin')){
            $roles = Role::pluck('name','name')->all();
        }else{
            $roles = Role::pluck('name','name')->except(['name', 'Super-Admin']);
        }
        $userRole = $user->roles->pluck('name','name')->all();

        $dataId = $user;
        return view('thanh-vien.edit', compact('dataId','role', 'roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThanhvienReques $request, $id)
    {
        
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        $notification = array(            
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'            
        );
        return redirect()->route('thanh-vien.index') ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(auth()->id() == $id){
            $notification = array(            
                'message' => "Không thể xóa chính mình",
                'alert-type' => 'error'            
            );
            return redirect()->route('thanh-vien.index')
                            ->with($notification);
        }
        if($user->hasRole('Super-Admin')){
            $notification = array(            
                'message' => "Không có quyền xóa người dùng này",
                'alert-type' => 'error'            
            );
            return redirect()->route('thanh-vien.index')
                            ->with($notification);
        }
        $user->delete();
        $notification = array(            
            'message' => "Đã xóa người dùng ".$user->name,
            'alert-type' => 'success'            
        );
        return redirect()->route('thanh-vien.index')->with($notification);
    }
}
