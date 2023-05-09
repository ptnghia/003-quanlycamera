<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Identified_histories extends Model
{
    use HasFactory;
    protected  $table = 'identified_histories';

    public function getAll($identified_id){

        $datas =  DB::table($this->table)
        ->join('cameras','identified_histories.camera_id','=','cameras.id')
        ->where('identified_histories.identified_id','=', $identified_id)
        ->orderBy('identified_histories.id')
        ->select('identified_histories.*', 'cameras.name as name_camera', 'cameras.name_area as khuvuc',)
        ->get();
        return $datas;
    }

    public function getAll_sukien(){

        $datas =  DB::table($this->table)
        ->join('identifieds','identified_histories.identified_id','=','identifieds.id')
        ->join('identified_types','identifieds.identified_type_id','=','identified_types.id')
        ->join('cameras','identified_histories.camera_id','=','cameras.id')
        ->orderBy('identified_histories.id')
        ->select('identified_histories.*', 'identifieds.name as name', 'identified_types.name as type', 'cameras.name as name_camera', 'cameras.name_area as khuvuc',)
        ->get();
        return $datas;
    }

    public function getAll_cate($identified_cate){

        $datas =  DB::table($this->table)
        ->join('identifieds','identified_histories.identified_id','=','identifieds.id')
        ->join('identified_types','identifieds.identified_type_id','=','identified_types.id')
        ->join('cameras','identified_histories.camera_id','=','cameras.id')
        ->where('identifieds.identified_cate_id','=', $identified_cate)
        ->orderBy('identified_histories.id')
        ->select('identified_histories.*', 'identifieds.name as name', 'identified_types.name as type',  'cameras.name as name_camera', 'cameras.name_area as khuvuc')
        ->get();
        return $datas;
    }

    public function getAll_ajax($id){
 
        $datas =  DB::table($this->table)
        ->join('identifieds','identified_histories.identified_id','=','identifieds.id')
        ->join('cameras','identified_histories.camera_id','=','cameras.id')
        ->where('identified_histories.id','=', $id)
        ->select('identified_histories.*', 'identifieds.name as doituong', 'identifieds.id as id_doituong', 'identifieds.id as id_doituong', 'cameras.name as name_camera', 'cameras.name_area as khuvuc')
        ->first();
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
