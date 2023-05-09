<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video_identifieds extends Model
{
    use HasFactory;
    protected  $table = 'video_identifieds';

    public function getAll($video_id){

        $datas =  DB::table($this->table)
        ->join('identifieds','video_identifieds.identifieds_id','=','identifieds.id')
        ->join('identified_types','identifieds.identified_type_id','=','identified_types.id')
        ->where('video_identifieds.video_id','=', $video_id)
        ->orderBy('video_identifieds.id')
        ->select('video_identifieds.*', 'identifieds.name as doituong', 'identified_types.name as type')
        ->get();
        return $datas;
    }
 
    public function getAll_ajax($id){
 
        $datas =  DB::table($this->table)
        ->join('identifieds','video_identifieds.identifieds_id','=','identifieds.id')
        ->where('video_identifieds.id','=', $id)
        ->orderBy('video_identifieds.id')
        ->select('video_identifieds.*', 'identifieds.name as doituong', 'identifieds.id as id_doituong')
        ->first();
        return $datas;

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
