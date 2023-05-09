<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use HasFactory;
    protected  $table = 'users';

    public function updateData($data){

        return  DB::update('UPDATE '.$this->table.' SET name = ?, email =?, username =?, updated_at=?  WHERE id = '.Auth::user()->id.'', $data);
    }

    public function updatePassword($password){
        return  DB::update('UPDATE '.$this->table.' SET password = ?  WHERE id = '.Auth::user()->id.'', [$password]);
    }
}
