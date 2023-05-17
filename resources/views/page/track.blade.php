@extends('main')

@section('css')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
<style>
    .dataTables_filter{
        display: block !IMPORTANT;
    }
</style>
@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Giám sát</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị chung</li>
                    <li class="breadcrumb-item active" aria-current="page">Theo dõi nhận diện</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row g-3">
        <div class="col-lg-7">
            <div class="card radius-10">
                <div class="card-body">
                    <div class=" table-responsive">
                        <table class=" table table-bordered table-striped" id="datatable">
                            <thead class=" table-primary">
                                <tr>
                                    <th>Thời gian</th>
                                    <th style="width: 70px;">Hình ảnh</th>
                                    <th>Đối tượng</th>
                                    <th>Camera</th>
                                    <th>Khu vực</th>
                                    <th style="width: 50px;">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card radius-10 shadow-none">
                <div class="card-body">
                    <div class="mb-4 box-text">
                        <span class="title">Camera</span>
                        <div class="text text-center" style="height: 200px;">

                        </div>
                    </div>
                    <div class="mb-4 box-text">
                        <span class="title">Hình ảnh</span>
                        <div class="text text-center" style="height: 50px;">
                            <img id="hinh_anh2" src="{{asset('assets/images/image.png')}}" style="object-fit: contain;max-height: 100%; max-width:100%" alt="" />
                        </div>
                    </div>
                    <div class="mb-4 box-text">
                        <span class="title">Đối tượng</span>
                        <div class="text" id="doi_tuong2">
                            ...
                        </div>
                    </div>
                    <div class="mb-4 box-text">
                        <span class="title">Thời gian</span>
                        <div class="text" id="thoi_gian2">
                            ...
                        </div>
                    </div>
                    <div class="mb-4 box-text">
                        <span class="title">Camera</span>
                        <div class="text" id="camera2">
                            ...
                        </div>
                    </div>
                </div>
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


<script>
    var  sound_Path='{{asset('assets/plugins/notifications/sounds/')}}/'
</script>
<link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}" />
<script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
<script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {

        var table = $('#datatable').DataTable({
            ajax: {
                url: '{{route('ajaxtrack2')}}',
                dataSrc: ''
            },
            "columns": [
                { "data"    :   "thoi_gian" },
                { "data"    :   "hinh_anh" },
                { "data"    :   "doituong" },
                { "data"    :   "camera"},
                { "data"    :   "khuvuc"},
                { "data"    :   "action"}
            ],
            "order": [[0, "desc"]]
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
<script>
    const socket = io('http://42.115.114.5:3001/');
    socket.on("server-send-plates-ocr", (data) => {
        const obj = JSON.parse(data);
        console.log(obj);
        if(obj['plate']!==''){
            const currentDate = new Date();
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth() + 1; // Lưu ý: Tháng trong JavaScript bắt đầu từ 0, nên cần cộng thêm 1.
            const day = currentDate.getDate();
            const hours = currentDate.getHours();
            const minutes = currentDate.getMinutes();
            const seconds = currentDate.getSeconds();

            $('#hinh_anh2').attr('src',obj['crop_url'])
            $('#doi_tuong2').html(obj['plate']);
            $('#camera2').html(obj['cam_name'])
            $('#thoi_gian2').html(day+'/'+month+'/'+year+' '+hours+':'+minutes+':'+seconds);

            @if(Auth::user()->can('datacam-view') and !auth()->user()->hasRole('Super-Admin'))

            const jsonString = JSON.stringify(obj);
            add_track_his_bienso(jsonString)
            @else
            $('#datatable').DataTable().ajax.reload();
            @endif
        }
        
        
        //$('#datatable').DataTable().ajax.reload();

        //const jsonString = JSON.stringify(obj);
        //add_track_his_bienso(jsonString)
        //alert(obj);
    });

    
    @if(Auth::user()->can('datacam-view') and !auth()->user()->hasRole('Super-Admin'))
    function add_track_his_bienso(json){
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token  :   '{{csrf_token()}}',
                atc     :   'add_track_his_bienso',
                json      :   json
            },
            success : function (result){
                //alert(result);
                $('#datatable').DataTable().ajax.reload();
            }
        });
    }
    @endif
</script>
@endsection