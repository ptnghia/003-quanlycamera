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

       $datas =  DB::table($this->table)->get();
       
        // $datas = DB::table('nvrs')
        //         ->join('areas', 'nvrs.area_id', '=', 'areas.id')
        //         ->join('users', 'nvrs.user_id', '=', 'users.id')
        //         ->select('nvrs.*', 'areas.name', 'users.username')
        //         ->get();
               
            
       return $datas;

    }
    // public function getArea(){
    //     $area = DB::table('nvrs')
    //             ->join('area', 'nvrs.area_id', '=', 'areas.id')
    //             ->select('nvrs.*', 'area.name')
    //             ->get();
    //             return $area;
    //         }
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
