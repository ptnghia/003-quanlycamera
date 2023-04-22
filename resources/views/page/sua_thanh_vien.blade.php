@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Thêm người dùng</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị chung</li>
                    <li class="breadcrumb-item active" aria-current="page">Sửa người dùng</li>
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
                        <div><i class="bx bx-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Thêm người dùng</h5>
                    </div>
                    <hr>
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="inputLastName1" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="inputLastName1" placeholder="Nhập họ tên" value="{{$dataId->name}}">
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" placeholder="Nhập số định danh" value="{{$dataId->username}}">
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Nhập email" value="{{$dataId->email}}">
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" value="">
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="inputLastName2" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" value="">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ghi chú</label>
                            <textarea class=" form-control" rows="4" placeholder="Nhập ghi chú..."></textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary" href=""><i class="bx bx-arrow-back me-1 font-13"></i>Quay lại</a>
                            <button type="submit" class="btn btn-primary px-5"><i class="bx bx-save me-1"></i>Cập nhật</button>
                        </div>
                    </form>
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
        url:'',
        params: {
            //_token  :   $('#upload_vanban').find('input[name="_token"]').first().val(),
            //atc     :   'upload_vanban' 
        },
        maxfilesize: 3000000,
        edit:false
    });
</script>

@endsection