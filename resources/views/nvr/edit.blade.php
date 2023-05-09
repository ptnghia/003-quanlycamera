@extends('main')

@section('css')
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách NVR</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống CCTV</li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm mới NVR</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5 pt-3">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-server me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Thêm thiết bị NVR</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{route('nvr.update',$data->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="col-md-8 col-12">
                            <label for="name" class="form-label">Tên thiết bị</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') ?? $data->name }}" name="name" id="name" placeholder="Nhập tên thiết bị">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Trạng thái</label>
                            <select class="form-select" name="status">
                                <option {{  $data->status ==1 ?'selected':'' }} value="1">Đang hoạt động</option>
                                <option {{  $data->status ==0 ?'selected':'' }} value="0">Ngừng hoạt động</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">IP</label>
                            <input type="text" class="form-control @error('ip') is-invalid @enderror"  value="{{ old('ip') ?? $data->ip }}" name="ip" placeholder="Nhập địa chỉ IP">
                            @error('ip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Port</label>
                            <input type="text" class="form-control @error('port') is-invalid @enderror"  value="{{ old('port') ?? $data->port }}" name="port" placeholder="Nhập Port">
                            @error('port')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Serial</label>
                            <input type="text" class="form-control @error('serial') is-invalid @enderror"  value="{{ old('serial') ?? $data->serial }}" name="serial" placeholder="Nhập Serial" >
                            @error('serial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-8 col-12">
                            <label class="form-label">Khu Vực</label>
                            <select class=" form-control select2" name="area_id">
                                @foreach ($areas as $row)
                                <option {{  $data->serial == $row->id ?'selected':'' }} value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                            @error('area_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Phiên bản</label>
                            <input type="text" class="form-control @error('version') is-invalid @enderror"  value="{{ old('version') ?? $data->version }}" name="version" placeholder="Nhập phiên bản" >
                            @error('version')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ghi chú</label>
                            <textarea class=" form-control  @error('note') is-invalid @enderror" name="note" rows="4" placeholder="Nhập ghi chú...">{{ old('note') ?? $data->note  }}</textarea>
                            @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary" href="{{route('nvr.index')}}"><i class="bx bx-arrow-back me-1 font-13"></i>Quay lại</a>
                            <button type="submit" class="btn btn-primary px-3"><i class="bx bx-save me-1"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-3 pt-3">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-map me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Danh sách khu vực</h5>
                    </div>
                    <hr>

                    <ul class="list_thongso_vb" id="list_thongso_vb">
                        <li class="form_add_thongso_vb ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="tên khu vực" id="text">
                                <button class="btn btn-outline-secondary add_thongso_vb" type="button">Thêm mới</button>
                            </div>
                            <div class="thongbao thongbao"></div>
                        </li>
                        @foreach ($areas as $child)
                        <li class="item_thongso_vb" id="item_thongso_vb_{{$child->id}}">
                            <input type="text" readonly class=" form-control ajax_edit_thongso_vb" value="{{$child->name}}" data_id="{{$child->id}}" />
                            <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="{{$child->id}}"><i class="bx bx-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit{{$child->id}}" style="display: none" ><i class="bx bx-check"></i></button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select2').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>

<script>
    $('.add_thongso_vb').click(function(){
        var text = $('#text').val();
        if(text!==''){
            $('#text').val('');
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token  :   '{{csrf_token()}}',
                    atc     :   'add_areas',
                    text    :   text
                },
                success : function (result){
                    $('#list_thongso_vb').append(result);
                    $('.thongbao').html('');
                    
                    $('#text').removeClass('is-invalid');
                    $('#text').focus();
                    $('.thongbao').html('');
                }
            });
        }else{
            $('#text').addClass('is-invalid');
            $('#text').focus();
            $('.thongbao').html('<span style="margin-top: -10px;color: red;font-style: oblique;font-size: 13px;margin-bottom: 10px;display: block;">Vui lòng nhập nội dung</span>')
        }
        
    })

    $('.ajax_edit_thongso_vb').click(function () { 
        var data_id = $(this).attr('data_id');
        $(".ajax_edit_thongso_vb").attr("readonly", true); 
        $(this).attr("readonly", false); 
        $('.btn-edit').hide();
        $('#btn-edit'+data_id).show();
    });
    $('.ajax_edit_thongso_vb').change(function () { 
        var data_id = $(this).attr('data_id');
        $.ajax({
                url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token  :   '{{csrf_token()}}',
                atc     :   'edit_area',
                id      :   data_id,
                text    :   $(this).val()
            },
            success : function (result){
                $('#list_thongso_vb_'+data_id).append(result);
                $('.thongbao'+data_id).html('');
                $('.btn-edit').hide();
                $.notify("Cập nhật thành công", "success");
            }
        });
    });
    $('.btn-edit').click(function(){
        $(this).hide();
    })
    $('.btn-del').click(function(){
        var data_id = $(this).attr('data_id');
        swal({
            title: "Xác nhận xóa khu vực?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                 data : {
                    _token  :   '{{csrf_token()}}',
                    atc     :   'del_area',
                    id      :   data_id
                },
                success : function (result){
                    $('#item_thongso_vb_'+data_id).remove();
                    swal("Xóa thành công", {
                        icon: "success",
                    });
                }
            });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
        
    })
</script>

@endsection