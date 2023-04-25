<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Maps extends Model
{
    use HasFactory;
    protected  $table = 'maps';
    
    


    public function getAll(){
        $datas = Maps::join('cameras', 'maps.camera_id', '=', 'cameras.id')
        ->join('areas', 'maps.area_id', '=', 'areas.id')
        ->select('maps.*', 'cameras.name as cameraname', 'areas.name as areaname')
        ->get();
       return $datas;

    }

}
