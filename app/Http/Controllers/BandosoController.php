<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Cameras;
use App\Models\Nvrs;
use Illuminate\Http\Request;

class BandosoController extends Controller
{
    public function __construct(){

        //$this->middleware('role:Super-Admin');
        $this->middleware('permission:xemtructiep-view', ['only' => ['xem_truc_tiep','xem_chi_tiet']]);
        $this->middleware('permission:bando-view', ['only' => ['index','xem_chi_tiet']]);
    }

    public function index(){

        $db_Areas = new Areas();
        $areas = $db_Areas->getAll();

        $db_Nvrs = new Nvrs();
        $db_Camera = new Cameras();

        $datas = [];
        foreach($areas as $key0 => $area){

            $nvrs = $db_Nvrs->getAll_area( $area->id );

            $datas[$key0]['name'] = $area->name;

            foreach($nvrs as $key => $nvr){

                $cameras = $db_Camera->getAll_area( $nvr->id );

                //$datas[$key0]['nvr'][$key] = $nvr->name;
                $datas[$key0]['nvr'] = $cameras;
                
                
            }
        }
        $list_cameras      =  $db_Camera->getAll();

        return view('page.ban_do_so', compact('datas','list_cameras'));
    }

    public function xem_truc_tiep(){

        $db_Camera = new Cameras();
        $list_cameras      =  $db_Camera->getAll();

        return view('page.xemn_truc_tiep', compact('list_cameras'));
    }

    public function xem_chi_tiet($id){

        $db_Camera = new Cameras();
        $camera      =  $db_Camera->getId($id);

        return view('page.xemn_truc_tiep_chi_tiet', compact('camera'));
    }
}
