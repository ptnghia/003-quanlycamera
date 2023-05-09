<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Identified_images extends Model
{
    use HasFactory;
    protected  $table = 'identified_images';

    public function getAll($identified_id){

        $datas =  DB::table($this->table)
        ->where('identified_id','=', $identified_id)
        ->orderBy('id')
        ->get();
        return $datas;
    }
    public function getOnde($identified_id){

        $datas =  DB::table($this->table)
        ->where('identified_id','=', $identified_id)
        ->orderByDesc('id')
        ->first();
        return $datas;
    }
    public function getImgRong()
    {
        $listvanban = DB::table($this->table)
            ->where('key_file', '<>', '')
            ->where('identified_id', '=', 0)
            ->get();
            return $listvanban;
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

    public function UpdateIdIdentified($identified_id, $id)
    {
        return DB::table($this->table)->where('id',  $id)->update(['identified_id' => $identified_id, 'key_file' => '']);
    }

    public function deleteId($id)
    {
        $file       =  Identified_images::find($id);

        $file_url   =  $file['file_url'];
        if (file_exists($file_url)) {
            File::delete($file_url);
        }
        $file->delete();
        
    }
  
    public function deleteData($id){
 
          return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
          
    }
}
