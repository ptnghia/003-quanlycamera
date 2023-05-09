@extends('main')

@section('css')
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách nhận dạng</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống Camera AI</li>
                    <li class="breadcrumb-item active" aria-current="page">Sửa thông tin</li>
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
                        <div><i class="bx bx-cctv me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Thêm đối tượng giám sát</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{route('identified.update',$data->id)}}" id="identified">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="col-md-8 col-12">
                            <label class="form-label">Tên đối tượng</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') ?? $data->name }}"  name="name" placeholder="Nhập tên đối tượng cần giám sá">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Loại nhận diện</label>
                            <select class="form-select select2" name="identified_cate_id">
                                @foreach ($cates as $item)
                                <option {{ $data->identified_cate_id  == $item->id ?'selected':''}} value="{{ $item->id}}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="inputtime" class="form-label">Thời gian</label>
                            <input type="datetime-local" readonly class="form-control" id="inputtime" value="{{ $data->created_at }}">
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label">Phân loại</label>
                            <select class="form-select select2" name="identified_type_id">
                                @foreach ($types as $item)
                                <option {{ $data->identified_type_id == $item->id ?'selected':'' }} value="{{ $item->id}}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ghi chú</label>
                            <textarea class=" form-control" rows="4" name="note" placeholder="Nhập ghi chú...">{{ old('note')  ?? $data->note  }}</textarea>
                        </div>
                        @if (!empty($images))
                        <div class="row g-3">
                            @foreach ($images as $item)
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6" id="img_{{$item->id}}">
                                <div class="box_img position-relative" >
                                    <img style="width: 100%;height: 100px;object-fit: cover;border-radius: 5px;" src="{{asset($item->url)}}" />
                                    <button style="position: absolute;right: 0;padding: 2px 4px;" class="btn btn-danger btn-sm" type="button" onclick="dele_img({{$item->id}})"><i class="bx bx-trash-alt me-0"></i></button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="col-12">
                            <label class="col-form-label">Bấm chọn hoặc kéo thả hình ảnh vào ô bên dưới</label>
                            <input id="OurFile" type="file" name="OurFile" accept="image/png, image/jpeg"  multiple>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary" href="{{route('identified.index')}}"><i class="bx bx-arrow-back me-1 font-13"></i> Quay lại</a>
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
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Loại nhận diện</h5>
                    </div>
                    <hr>
                    <ul class="list_cate" id="list_cate">
                        <li class="form_add_cate ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Loại nhận diện" id="text">
                                <button class="btn btn-outline-secondary add_cate" type="button">Thêm mới</button>
                            </div>
                            <div class="thongbao thongbao"></div>
                        </li>
                        @foreach ($cates as $child)
                        <li class="item_cate" id="item_cate_{{$child->id}}">
                            <input type="text" readonly class=" form-control ajax_edit_cate" value="{{$child->name}}" data_id="{{$child->id}}" />
                            <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="{{$child->id}}"><i class="bx bx-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit{{$child->id}}" style="display: none" ><i class="bx bx-check"></i></button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-3 pt-3">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-info-circle me-1 font-22 text-danger"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Loại cảnh báo</h5>
                    </div>
                    <hr>
                    <ul class="list_type" id="list_type">
                        <li class="form_add_type ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Loại cảnh báo" id="text_type">
                                <button class="btn btn-outline-secondary add_type" type="button">Thêm mới</button>
                            </div>
                            <div class="thongbao thongbao_type"></div>
                        </li>
                        @foreach ($types as $child)
                        <li class="item_type" id="item_type_{{$child->id}}">
                            <input type="text" readonly class=" form-control ajax_edit_type" value="{{$child->name}}" data_id="{{$child->id}}" />
                            <button type="button" class="btn btn-sm btn-danger btn-xs btn-del_type" data_id="{{$child->id}}"><i class="bx bx-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-success btn-xs btn-edit_type" id="btn-edit_type{{$child->id}}" style="display: none" ><i class="bx bx-check"></i></button>
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
<link href="{{asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
<script>
    $('#OurFile').FancyFileUpload({
        url:'{{route('ajax')}}',
        params: {
            _token  :   $('#identified').find('input[name="_token"]').first().val(),
            atc     :   'upload_identified_img' 
        },
        maxfilesize: 10000000,
        //edit:true
    });

    function dele_img(id){
        swal({
            title: "Xác nhận xóa hình ảnh nhận diện?",
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
                    atc     :   'del_img',
                    id      :   data_id
                },
                success : function (result){
                    $('#item_cate_'+data_id).remove();
                    swal("Xóa thành công", {
                        icon: "success",
                    });
                }
            });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
    }
</script>
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
    $('.add_cate').click(function(){
        var text = $('#text').val();
        if(text!==''){
            $('#text').val('');
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token  :   '{{csrf_token()}}',
                    atc     :   'add_cate',
                    text    :   text
                },
                success : function (result){
                    $('#list_cate').append(result);
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

    $('.ajax_edit_cate').click(function () { 
        var data_id = $(this).attr('data_id');
        $(".ajax_edit_cate").attr("readonly", true); 
        $(this).attr("readonly", false); 
        $('.btn-edit').hide();
        $('#btn-edit'+data_id).show();
    });
    $('.ajax_edit_cate').change(function () { 
        var data_id = $(this).attr('data_id');
        $.ajax({
                url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token  :   '{{csrf_token()}}',
                atc     :   'edit_cate',
                id      :   data_id,
                text    :   $(this).val()
            },
            success : function (result){
                $('#list_cate_'+data_id).append(result);
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
            title: "Xác nhận xóa loại nhận diện?",
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
                    atc     :   'del_cate',
                    id      :   data_id
                },
                success : function (result){
                    $('#item_cate_'+data_id).remove();
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

<script>
    $('.add_type').click(function(){
        var text = $('#text_type').val();
        if(text!==''){
            $('#text_type').val('');
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token  :   '{{csrf_token()}}',
                    atc     :   'add_type',
                    text    :   text
                },
                success : function (result){
                    $('#list_type').append(result);
                    $('.thongbao_type').html('');
                    
                    $('#text_type').removeClass('is-invalid');
                    $('#text_type').focus();
                    $('.thongbao_type').html('');
                }
            });
        }else{
            $('#text_type').addClass('is-invalid');
            $('#text_type').focus();
            $('.thongbao_type').html('<span style="margin-top: -10px;color: red;font-style: oblique;font-size: 13px;margin-bottom: 10px;display: block;">Vui lòng nhập nội dung</span>')
        }
        
    })

    $('.ajax_edit_type').click(function () { 
        var data_id = $(this).attr('data_id');
        $(".ajax_edit_type").attr("readonly", true); 
        $(this).attr("readonly", false); 
        $('.btn-edit_type').hide();
        $('#btn-edit_type'+data_id).show();
    });
    $('.ajax_edit_type').change(function () { 
        var data_id = $(this).attr('data_id');
        $.ajax({
                url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token  :   '{{csrf_token()}}',
                atc     :   'edit_type',
                id      :   data_id,
                text    :   $(this).val()
            },
            success : function (result){
                $('#list_type_'+data_id).append(result);
                $('.thongbao_type'+data_id).html('');
                $('.btn-edit').hide();
                $.notify("Cập nhật thành công", "success");
            }
        });
    });
    $('.btn-edit_type').click(function(){
        $(this).hide();
    })
    $('.btn-del_type').click(function(){
        var data_id = $(this).attr('data_id');
        swal({
            title: "Xác nhận xóa loại cảnh báo?",
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
                    atc     :   'del_type',
                    id      :   data_id
                },
                success : function (result){
                    $('#item_type_'+data_id).remove();
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