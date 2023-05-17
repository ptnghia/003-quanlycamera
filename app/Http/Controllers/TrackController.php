<?php

namespace App\Http\Controllers;

use App\Models\Track_historys;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    private $useDB;
    public function __construct()
    {
        //$this->middleware('role:Super-Admin');
        $this->useDB= new Track_historys();
        $this->middleware('permission:datacam-view', ['only' => ['index']]);
    }

    public function index(){

        return view('page.track');

    }
}
