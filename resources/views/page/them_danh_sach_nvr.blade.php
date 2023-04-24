@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Thêm danh sách NVR</div>
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
                    <form class="row g-3"method="POST" action="{{route('nvr.store')}}">
                        @csrf
                        @method('POST')
                        <div class="col-md-8 col-12">
                            <label for="inputLastName1" class="form-label">Tên thiết bị</label>
                            <input type="text" class="form-control" name="name" id="inputLastName1" placeholder="Nhập tên đối tượng cần giám sát">
                        </div>
                        <div class="col-md-4 col-12">
                            <label for="inputLastName2" class="form-label">Trạng thái</label>
                            <select class="form-select" name="status">
                                <option value="1">Đang hoạt động</option>
                                <option value="2">Ngừng hoạt động</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label" >IP</label>
                            <input type="text" class="form-control" name="IP" placeholder="Nhập địa chỉ IP" value="">
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label" >Link</label>
                            <input type="text" class="form-control" name="link" placeholder="Nhập địa chỉ IP" value="">
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <label class="form-label" name="serial">Serial</label>
                            <input type="text" class="form-control" name="serial" placeholder="Nhập Serial" value="">
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label" name="area">Khu Vực</label>
                            <input type="text" class="form-control" name="area_id" placeholder="Nhập khu vực" value="1">
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label" name="version">Phiên bản</label>
                            <input type="number" class="form-control" name="version" placeholder="Nhập phiên bản" value="">
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label" name="camera_quantity">Số camera</label>
                            <input type="number" class="form-control" name="camera_quantity" placeholder="Nhập số camera" value="">
                        </div>
                        <input type="hidden" class="form-control" placeholder="Nhập khu vực" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="col-12">
                            <label class="form-label" name="note">Ghi chú</label>
                            <textarea class=" form-control" rows="4" name="note" placeholder="Nhập ghi chú..."></textarea>
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