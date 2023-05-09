<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Identified_cates extends Model
{
    use HasFactory;

    protected  $table = 'identified_cates';

    public function getAll(){

        $datas =  DB::table($this->table)
        ->orderBy('name')
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
 
          return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
          
    }
}
