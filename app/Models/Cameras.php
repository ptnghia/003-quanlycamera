<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cameras extends Model
{
    use HasFactory;

    protected  $table = 'cameras';

    public function getAll(){

        $datas =  DB::table($this->table)
        ->join('nvrs', 'cameras.nvr_id', '=', 'nvrs.id')
        ->orderBy('cameras.name')
        ->select('cameras.*', 'nvrs.name as nvr_name')
        ->get();
        return $datas;
    }

    public function getAll_area($nvr_id){

        $datas =  DB::table($this->table)
        ->where('nvr_id','=', $nvr_id)
        ->get();
        return $datas;
 
    }

    public function get_cam_name($name){

        $data =  DB::table($this->table)
        ->where('name','=', $name)
        ->select('name','name_area','id')
        ->first();
        return $data;
 
    }

    public function getId($id){
 
         $data = DB::table($this->table)->find($id);
         return $data;

    }
 
    public function insert($data){
 
        $id = DB::table($this->table)->insert($data);
        return $id;
 
    }
  
    public function updateData($data, $id){
  
         return DB::table($this->table)->where('id',  $id)->update($data);
         
    }
  
    public function deleteData($id){
 
          return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
          
    }
}
