<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Track_historys extends Model
{
    use HasFactory;
    protected  $table = 'track_historys';

    public function getAll(){

        $datas =  DB::table($this->table)
        ->orderBy('time_get')
        ->get();
        return $datas;

    }

    public function getId($id){
 
        $data = DB::table($this->table)->find($id);
        return $data;

    }

    public function getAll_type($type_id){

        $datas =  DB::table($this->table)
        ->where('type','=', $type_id)
        ->get();
        return $datas;
    }

    public function getAll_type_alert($alert_type){

        $datas =  DB::table($this->table)
        ->where('alert_type','=', $alert_type)
        ->get();
        return $datas;
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
