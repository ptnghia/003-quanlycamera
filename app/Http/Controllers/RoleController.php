<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('role:Super-Admin');
    }
    
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        $notification = array(            
            'message' => 'Đã thêm nhóm người dùng',
            'alert-type' => 'success'            
        );
        return redirect()->route('thanh-vien.create')->with( $notification);
    }

    public function edit($id)
    {
        $role = Role::find($id);
        if($role->name == 'Super-Admin'){
            $notification = array(            
                'message' => "Cập nhật thành công",
                'alert-type' => 'error'            
            );
            return redirect()->route('thanh-vien.create') -> with($notification);
        }

        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('roles','name')->ignore($id)
            ],
            'permission' => 'required'
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
        $notification = array(            
            'message' => 'Đã cập nhật nhóm người dùng',
            'alert-type' => 'success'            
        );
        return redirect()->route('thanh-vien.create') ->with( $notification);
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if (auth()->user()->roles->find($id)) {        
            $notification = array(            
                'message' => 'Bạn không có quyền số nhóm này',
                'alert-type' => 'error'            
            );
            return redirect()->route('thanh-vien.create')
                            ->with($notification);
        }
        if ($role->name == "Super-Admin"){
            $notification = array(            
                'message' => 'Không thể xóa nhóm quản trị viên cao cấp',
                'alert-type' => 'error'            
            );
            return redirect()->route('thanh-vien.index')
                            ->with($notification);
        }
        $role->delete();       

        $notification = array(            
            'message' => 'Đã xóa nhóm người dùng',
            'alert-type' => 'success'            
        );
        return redirect()->route('thanh-vien.index')
                        ->with($notification);
    }
}
