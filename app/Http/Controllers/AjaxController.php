<?php

namespace App\Http\Controllers;

use App\Models\Ajax;
use App\Models\Areas;
use App\Models\Identified_cates;
use App\Models\Identified_histories;
use App\Models\Identified_images;
use App\Models\Identified_types;
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

            $db_his = new Identified_histories();
            $histories =  $db_his->getAll_ajax($request->id);

            $db_img = new Identified_images();
            $images = $db_img->getOnde($histories->id_doituong);

            $data = [
            
                'mo_ta'         =>      $histories->note,
                'doi_tuong'     =>      $histories->doituong,
                'thoi_gian'     =>      $histories->time_get,
                'camera'        =>      $histories->name_camera,
                'vi_tri'        =>      $histories->khuvuc,
                'big_img'       =>      $histories->screen_image,
                'hinh_anh'      =>      asset($images->url),
                
            ];
            return response()->json($data);

        }
    }
}
