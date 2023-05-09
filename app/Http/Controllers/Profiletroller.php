<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Profiletroller extends Controller
{
    private $useDB;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB= new Profile();
    }

    public function index(){
        
        return view('page.profile');
    }

    public function UpdateData(UpdateProfileRequest $request){
        
        $dataUpdata=[ 
            $request['name'],
            $request['email'],
            $request['username'],
            date('Y-m-d H:i:s', time())
        ];
        $this->useDB->updateData($dataUpdata);

        if(isset( $request['password'])){
            $new_password = Hash::make($request->new_password);

            $this->useDB->updatePassword($new_password);
        }
        return redirect(route('profile.index'))->with('success', 'Cập nhật thành công');
    }
}
