@extends('main')

@section('css')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
<style>
    
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách sự kiện</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống Camera AI</li>
                    <li class="breadcrumb-item" aria-current="page">Phân tích video</li>
                    <li class="breadcrumb-item active" aria-current="page">Kết quả phân tích</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <div class="search-form position-relative">
                        <input id="custom-search-input"  type="text" placeholder="Tìm kiếm" class=" form-control" />
                        <i class=" bx bx-search position-absolute top-50 end-0 px-2 translate-middle-y font-18" ></i>
                    </div>
                    
                </div>
                <div class="dropdown ms-auto d-flex">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-filter-alt font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($types as $item)
                        <li>
                            <a class="dropdown-item font-13 filter_search" href="javascript:;" data="{{$item->name}}">
                                <span style="display: inline-block;width: 25px;">
                                    <i class="bx bx-barcode-reader"></i>
                                </span>
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item font-13" href="javascript:;">
                                <span style="display: inline-block;width: 25px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw text-primary"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
                                </span>
                                Cập nhật dữ liệu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped" id="datatable">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 110px;">Hình ảnh</th>
                            <th>Đối tượng</th>
                            <th>Sự kiện</th>
                            <th>Thời gian</th>
                            <th>Phân loại</th>
                            <th style="width: 125px;">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $item)
                        <tr>
                            <td class=" text-center">
                                <img src="{{$item->screen_image}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                                {{$item->doituong}}
                            </td>
                            <td>
                                {{$item->note}}
                            </td>
                            <td>
                                {{$item->time_get}}
                            </td>
                            <td>
                                {{$item->type}}
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
                                        <img id="hinh_anh" src="" style="object-fit: cover" alt="" height="100px" width="" />
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
            "lengthChange": false,
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
                atc         :    'get_phantich_video',
            },
            success : function (result){
                
                var jsonArray = JSON.parse(result);

                $('#mo_ta').html(jsonArray.mo_ta);
                $("#hinh_anh").attr('src',jsonArray.hinh_anh);
                $("#doi_tuong").html(jsonArray.doi_tuong);
                $("#thoi_gian").html(jsonArray.thoi_gian);
                $("#big_img").attr('src',jsonArray.big_img);
            }
        });
    }
</script>

@endsection