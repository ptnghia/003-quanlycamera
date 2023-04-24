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

       //$datas =  DB::table($this->table)->get();
       $result = Cameras::join('nvrs', 'cameras.nvr_id', '=', 'nvrs.id')
                 ->join('areas', 'cameras.area_id', '=', 'areas.id')
                 ->select('cameras.*', 'nvrs.name as nvrname', 'areas.name as areaname')
                 ->get();
       return $result;

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
