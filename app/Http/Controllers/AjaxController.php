<?php

namespace App\Http\Controllers;

use App\Models\Ajax;
use App\Models\Areas;
use App\Models\Cameras;
use App\Models\Identified_cates;
use App\Models\Identified_histories;
use App\Models\Identified_images;
use App\Models\Identified_types;
use App\Models\Identifieds;
use App\Models\Track_historys;
use App\Models\Video_identifieds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){

        $atc        =   $request->atc;
        $db = new Ajax();

        if($atc == 'upload_avata'){

            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $request->file('file')->move('uploads/images', $fileName, 'public/uploads/');
                $file = 'uploads/images/'.$fileName;
                return $db->axjaxUpdateAvata($file);
            }

        }elseif($atc == 'add_areas'){
            
            $ten        =   $request->text;
            $area= new Areas();
            $data = [
                'name'  =>  $ten,
            ];
            $id = $area->insert($data);
            
            if((int)$id > 0){
                $html='
                <li class="item_thongso_vb" id="item_thongso_vb" id="item_thongso_vb_'.$id.'">
                    <input type="text" readonly class=" form-control ajax_edit_thongso_vb" value="'.$ten.'" data_id="'.$id.'" />
                    <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="'.$id.'" ><i class="bx bx-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit'.$id.'" style="display: none" ><i class="bx bx-check"></i></button>
                </li>';
                return $html;
            }else{
                return false;
            }
        
        }elseif($atc == 'edit_area'){
            $id         =   $request->id;
            $ten        =   $request->text;
            $area= new Areas();
            $data = [
                'name'  =>  $ten,
            ];
            return $area->updateData($data,$id);
        }elseif($atc == 'del_area'){
            $id         =   $request->id;
            $area= new Areas();
            return $area->deleteData($id);
        }
        
        elseif($atc == 'add_cate'){
            
            $ten        =   $request->text;
            $cate= new Identified_cates();
            $data = [
                'name'  =>  $ten,
            ];
            $id = $cate->insert($data);
            
            if((int)$id > 0){
                $html='
                <li class="item_cate" id="item_cate" id="item_cate_'.$id.'">
                    <input type="text" readonly class=" form-control ajax_edit_cate" value="'.$ten.'" data_id="'.$id.'" />
                    <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="'.$id.'" ><i class="bx bx-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit'.$id.'" style="display: none" ><i class="bx bx-check"></i></button>
                </li>';
                return $html;
            }else{
                return false;
            }
        
        }elseif($atc == 'edit_cate'){
            $id         =   $request->id;
            $ten        =   $request->text;
            $cate= new Identified_cates();
            $data = [
                'name'  =>  $ten,
            ];
            return $cate->updateData($data,$id);
        }elseif($atc == 'del_cate'){
            $id         =   $request->id;
            $cate= new Identified_cates();
            return $cate->deleteData($id);
        }

        elseif($atc == 'add_type'){
            
            $ten        =   $request->text;
            $cate= new Identified_types();
            $data = [
                'name'  =>  $ten,
            ];
            $id = $cate->insert($data);
            
            if((int)$id > 0){
                $html='
                <li class="item_type" id="item_type" id="item_type_'.$id.'">
                    <input type="text" readonly class=" form-control ajax_edit_type" value="'.$ten.'" data_id="'.$id.'" />
                    <button type="button" class="btn btn-sm btn-danger btn-xs btn-del_type" data_id="'.$id.'" ><i class="bx bx-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success btn-xs btn-edit_type" id="btn-edit_type'.$id.'" style="display: none" ><i class="bx bx-check"></i></button>
                </li>';
                return $html;
            }else{
                return false;
            }
        
        }elseif($atc == 'edit_type'){
            $id         =   $request->id;
            $ten        =   $request->text;
            $cate= new Identified_types();
            $data = [
                'name'  =>  $ten,
            ];
            return $cate->updateData($data,$id);
        }elseif($atc == 'del_type'){
            $id         =   $request->id;
            $cate= new Identified_types();
            return $cate->deleteData($id);
        }

        elseif($atc == 'upload_identified_img'){

            if($request->hasFile('OurFile')){

                $file = $request->file('OurFile');

                $fileName = time().'_'.$file->getClientOriginalName();
                $request->file('OurFile')->move('uploads/images', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/images/'.$fileName;
                
                $dataInsert=[ 
                    'identified_id' =>  0,
                    'url'           =>  $file,
                    'key_file'      =>  session('key_upload'),
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ];
                $db_img = new Identified_images();
                $db_img->insert($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }

        elseif($atc == 'upload_video'){

            if($request->hasFile('OurFile')){

                $file = $request->file('OurFile');

                $fileName = time().'_'.$file->getClientOriginalName();
                $request->file('OurFile')->move('uploads/videos', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/videos/'.$fileName;

                Session::put('video_file', $file);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }

        elseif($atc == 'get_phantich_video'){

            $db_his = new Video_identifieds();
            $histories =  $db_his->getAll_ajax($request->id);

            $db_img = new Identified_images();
            $images = $db_img->getOnde($histories->id_doituong);

            $data = [
            
                'mo_ta'         =>      $histories->note,
                'doi_tuong'     =>      $histories->doituong,
                'thoi_gian'     =>      $histories->time_get,
                'big_img'       =>      $histories->screen_image,
                'hinh_anh'      =>      asset($images->url),
                
            ];
            return response()->json($data);

        }

        elseif($atc == 'get_nhandien_ct'){

            $db_his = new Track_historys();
            $histories =  $db_his->getId($request->id);

            $data = [           
                'mo_ta'         =>      $histories->note,
                'doi_tuong'     =>      $histories->name,
                'thoi_gian'     =>      $histories->time_get,
                'camera'        =>      $histories->cam_name,
                'vi_tri'        =>      $histories->khuvuc,
                'big_img'       =>      $histories->general_url,
                'hinh_anh'      =>      $histories->crop_url,
            ];
            
            return response()->json($data);

        }

        elseif($atc=='add_track_his_bienso'){
            $json = $request->json;
            $array = json_decode($json, true);

            $cam_name       =  $array['cam_name'];
            $plate          =  $array['plate'];
            $crop_url       =  $array['crop_url'];
            $general_url    =  $array['general_url'];
            $loss_url       =  $array['general_url'];
            
            
            $cam = new Cameras();
            $camera = $cam->get_cam_name($cam_name);
            
            $iden = new Identifieds();
            $check = $iden->get_iden_name($plate,2);
            $date = now();
            
            if(!empty($check)){

                $dataInsert=[ 
                    'name'          =>  $plate,
                    'note'          =>  'Phát hiện biển số xe trong danh sách đen',
                    'time_get'      =>  $date,
                    'camera_id'     =>  $camera->id,
                    'cam_name'      =>  $camera->name,
                    'crop_url'      =>  $crop_url,
                    'khuvuc'        =>  $camera->name_area,
                    'general_url'   =>  $general_url,
                    'loss_url'      =>  $loss_url,
                    'type'          =>  2,
                    'alert_type'    =>  1,
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ];

                $db_track = new Track_historys();
                $db_track->insert($dataInsert);

                $dataInsert2=[ 
                    'name'          =>  $plate,
                    'note'              =>  'Phát hiện biển số xe trong danh sách đen',
                    'identified_id'     =>  $check->id,
                    'time_get'          =>  $date,
                    'camera_id'         =>  $camera->id,
                    'screen_image'      =>  $general_url,
                    'crop_url'          =>  $crop_url,
                    'loss_url'          =>  $loss_url,
                    'created_at'        =>  now(),
                    'updated_at'        =>  now()
                ];
                $db_his = new Identified_histories();
                $db_his->insert($dataInsert2);


            }else{
                
                $dataInsert=[ 
                    'name'          =>  $plate,
                    'note'          =>  'Nhận diện biển số xe ngoài danh sách',
                    'time_get'      =>  $date,
                    'camera_id'     =>  $camera->id,
                    'cam_name'      =>  $camera->name,
                    'crop_url'      =>  $crop_url,
                    'khuvuc'        =>  $camera->name_area,
                    'general_url'   =>  $general_url,
                    'loss_url'      =>  $loss_url,
                    'type'          =>  2,
                    'alert_type'    =>  0,
                    'created_at'    =>  now(),
                    'updated_at'    =>  now()
                ];
                
                $db_track = new Track_historys();
                return $db_track->insert($dataInsert);

            }
            

        }
    }

    public function get_track_his(){

        $db_track = new Track_historys();
        $datas = $db_track->getAll();

        $data_new = [];
        foreach($datas as $key => $item){
            if($item->alert_type==1){
                $alert = '<span class="badge rounded-pill bg-danger px-2 py-1 font-12">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-white"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        </span>
                        Cảnh báo
                    </span>';
            }else{
                $alert='<span class="badge rounded-pill bg-success px-2 py-1 font-12">Thông thường</span>';
            }
            $data_new[$key]['hinh_anh']     =   ' <img src="'.$item->crop_url.'" style="object-fit: cover" alt="" width="90px" height="70px" />';
            $data_new[$key]['doituong']     =   $item->name;
            $data_new[$key]['su_kien']      =   $item->note;
            $data_new[$key]['thoi_gian']    =   $item->time_get;
            $data_new[$key]['camera']       =   $item->cam_name;
            $data_new[$key]['khuvuc']       =   $item->khuvuc;
            $data_new[$key]['canhbao']      =   '<div class="text-center">'.$alert.'</div>';
            $data_new[$key]['action']       =   '<button type="button" class="btn btn-sm btn-info" onclick="show_nhandien_ct('.$item->id.')" data-bs-toggle="modal" data-bs-target="#Modal_bienso">
                                                    <svg style="width: 15px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    Chi tiết
                                                </button>';
        }

        return response()->json($data_new);
    }

    public function get_track_his_2(){
        $db_track = new Track_historys();
        $datas = $db_track->getAll();

        $data_new = [];
        foreach($datas as $key => $item){
            $data_new[$key]['hinh_anh']     =   '<div class="text-center"> <img src="'.$item->crop_url.'" style="object-fit: cover;width: 50px;" alt="" height="50px" /></div>';
            $data_new[$key]['doituong']     =   $item->name;
            $data_new[$key]['thoi_gian']    =   $item->time_get;
            $data_new[$key]['camera']       =   $item->cam_name;
            $data_new[$key]['khuvuc']       =   $item->khuvuc;
            $data_new[$key]['action']       =   '<div class="text-center"><button type="button" class="btn btn-sm btn-info" onclick="show_nhandien_ct('.$item->id.')" data-bs-toggle="modal" data-bs-target="#Modal_bienso">
                                                    <svg style="width: 15px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </button></div>';
        }

        return response()->json($data_new);
    }
}
