<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Identifieds extends Model
{
    use HasFactory;
    protected  $table = 'identifieds';

    public function getAll(){

        $datas =  DB::table($this->table)
        ->join('identified_cates','identifieds.identified_cate_id','=', 'identified_cates.id')
        ->join('identified_types','identifieds.identified_cate_id','=', 'identified_types.id')
        ->orderBy('identifieds.id')
        ->select('identifieds.*', 'identified_cates.name as cate',  'identified_types.name as type',)
        ->get();
        return $datas;
 
    }
    
    public function getId($id){
 
         $data = DB::table($this->table)->find($id);
         return $data;

    }

    public function get_iden_name($name, $type){

        $data =  DB::table($this->table)
        ->where('name','=', $name)
        ->where('identified_cate_id','=', $type)
        ->select('name')
        ->first();
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
