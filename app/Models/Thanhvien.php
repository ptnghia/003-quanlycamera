<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Thanhvien extends Model
{
    use HasFactory;

    protected  $table = 'users';

    public function getAll(){

       $datas =  DB::table($this->table)
       ->where('id','<>',1)
       ->get();
       return $datas;

    }

    public function getId($id){

        $data = DB::table($this->table)->find($id);
        return $data;

    }

    public function insert($data){

        $id = DB::table($this->table)->insertGetId($data);
        return $id;

    }
 
    public function updateData($data, $id){
 
        return DB::table($this->table)->where('id',  $id)->update($data);
        
    }
 
    public function deleteData($id){
        $user = User::find($id);
        if(auth()->id() == $id){
            $notification = array(            
                'message' => "You cannot delete yourself",
                'alert-type' => 'error'            
            );
            return redirect()->route('users.index')
                            ->with($notification);
        }
        if($user->hasRole('Super-Admin')){
            $notification = array(            
                'message' => "You have no permission for delete this user",
                'alert-type' => 'error'            
            );
            return redirect()->route('users.index')
                            ->with($notification);
        }
        $user->delete();
        $notification = array(            
            'message' => "User deleted successfully",
            'alert-type' => 'success'            
        );
        return redirect()->route('thanh-vien.index')  ->with($notification);
    }
}
