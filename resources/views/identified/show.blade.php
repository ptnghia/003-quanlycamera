@extends('main')

@section('css')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
<style>
    .dataTables_filter{display: block !important}
</style>
@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Lịch sử nhận diện</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống Camera AI</li>
                    <li class="breadcrumb-item" aria-current="page">Danh sách nhận dạng</li>
                    <li class="breadcrumb-item active" aria-current="page">Lịch sử nhận dạng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card radius-10">
        <div class="card-body">
            @if($data->identified_cate_id == 2)
            <p><b><i class="bx bx-barcode-reader me-2 font-18" style="position: relative;top: 3px;"></i>Biển số xe</b></p>
            <div class="row g-3">
                <div class="col-lg-6 col-12">
                    <div class="box-text">
                        <span class="title">Biển kiểm soát</span>
                        <div class="text">
                            {{$data->name}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="box-text">
                        <span class="title">Mô tả</span>
                        <div class="text">
                            {{$data->note}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($data->identified_cate_id == 1)
            <p><b><i class="bx bx-user me-2 font-18"></i> {{$data->name}}</b></p>
            <div class="d-flex align-items-center">
                <div class=" card-img">
                    @foreach ($images as $item)
                    @endforeach
                    <img class="radius-10" width="100px" height="100px" src="{{asset($item->url)}}" />
                </div>
                <div class="dropdown ms-auto d-flex">
                    @foreach ($images as $item)
                    <div class=" card-img me-2">
                        <img class="radius-10" width="100px" height="100px" src="{{asset($item->url)}}" />
                    </div>
                    @endforeach
                    
                </div>
            </div>
            @endif
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped" id="datatable">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 110px;">Hình ảnh</th>
                            <th>Thời gian</th>
                            <th>Camera</th>
                            <th>Vị trí</th>
                            <th style="width: 125px;" class="text-center">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $item)
                        <tr>
                            <td class=" text-center">
                                <img src="{{$item->screen_image}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                                {{$item->time_get}}
                            </td>
                            <td>
                                <i class=" bx bx-cctv me-1"></i> {{$item->name_camera}}
                            </td>
                            <td>
                                {{$item->khuvuc}}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info" onclick="show_nhandien_ct({{$item->id}})" data-bs-toggle="modal" data-bs-target="#Modal_bienso">
                                    <svg style="width: 15px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Chi tiết
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class=" d-flex justify-content-between">
                <a class="btn btn-sm btn-primary" href="{{route('identified.index')}}"><i class="bx bx-arrow-back me-1 font-13"></i> Quay lại</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal_bienso" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mo_ta"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="card radius-10 shadow-none">
                            <div class="card-body">
                                <div class="mb-4 box-text">
                                    <span class="title">Hình ảnh</span>
                                    <div class="text text-center">
                                        <img id="hinh_anh" src="" style="object-fit: cover" alt="" width="100px" />
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Đối tượng</span>
                                    <div class="text" id="doi_tuong">
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Thời gian</span>
                                    <div class="text" id="thoi_gian">
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Camera</span>
                                    <div class="text" id="camera">
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Vị trí</span>
                                    <div class="text" id="vi_tri">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <p><b>Ảnh toàn cảnh</b></p>
                                <img src="" id="big_img" class="card-img-top" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            //"lengthChange": false,
            //"bFilter": false,
        });

        $('#custom-search-input').keyup(function() {
            var table = $('#datatable').DataTable();
            table.search($(this).val()).draw();
        });
        $('.filter_search').click(function () { 
            var table = $('#datatable').DataTable();
            table.search($(this).attr('data')).draw();
        });
    });

    function show_nhandien_ct(id){
        
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token      :    '{{csrf_token()}}',
                id          :    id,
                atc         :    'get_nhandien_ct',
            },
            success : function (result){
                
                var jsonArray = JSON.parse(result);

                $('#mo_ta').html(jsonArray.mo_ta);
                $("#hinh_anh").attr('src',jsonArray.hinh_anh);
                $("#doi_tuong").html(jsonArray.doi_tuong);
                $("#thoi_gian").html(jsonArray.thoi_gian);
                $("#camera").html(jsonArray.camera);
                $("#vi_tri").html(jsonArray.thoi_gian);
                $("#big_img").attr('src',jsonArray.big_img);
            }
        });
    }
</script>

@endsection