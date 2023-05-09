@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Thêm video cần phân tích</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống Camera AI</li>
                    <li class="breadcrumb-item" aria-current="page">Phân tích video</li>
                    <li class="breadcrumb-item active" aria-current="page">Sửa video</li>
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
                        <div><i class="bx bx-video-plus me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Sửa thông tin video</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{route('video.update', $data->id)}}" id="upload_video"> 
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="inputLastName1" class="form-label">Tên video</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') ?? $data->name }}" name="name" id="name" placeholder="Nhập tên video">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputtime" class="form-label">Ghi chú</label>
                            <textarea class=" form-control @error('note') is-invalid @enderror"  name="note" rows="3" placeholder="Nhập ghi chú...">{{ old('note')  ?? $data->note }}</textarea>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Bấm chọn hoặc kéo thả file video vào ô bên dưới</label>
                            <input id="OurFile" type="file" name="OurFile" accept="video/mp4" >
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary" href="{{route('video.index')}}"><i class="bx bx-arrow-back me-1 font-13"></i>Quay lại</a>
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
        url:'{{route('ajax')}}',
        params: {
            _token  :   $('#upload_video').find('input[name="_token"]').first().val(),
            atc     :   'upload_video' 
        },
        maxfilesize: 3000000,
        edit:false
    });
</script>

@endsection