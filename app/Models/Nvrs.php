<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nvrs extends Model
{
    use HasFactory;

    protected  $table = 'nvrs';

    public function getAll(){

        $datas =  DB::table($this->table)
        ->join('areas', 'nvrs.area_id', '=', 'areas.id')
        ->orderBy('nvrs.name')
        ->select('nvrs.*', 'areas.name as areas_name')
        ->get();
        return $datas;
 
    }

    public function getAll_area($area_id){

        $datas =  DB::table($this->table)
        ->where('area_id','=', $area_id)
        ->get();
        return $datas;
 
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
