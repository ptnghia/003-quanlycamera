@extends('main')

@section('css')
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Camera</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống CCTV</li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm mới Camera</li>
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
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Thêm Camera</h5>
                    </div>
                    <hr>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="row g-3" method="POST" action="{{route('camera.store')}}"> 
                        @csrf
                        <div class="col-md-4 col-12">
                            <label class="form-label">Tên camera</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}"  name="name" placeholder="Nhập tên camera">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-4">
                            <label class="form-label">NVR</label>
                            <select class="form-select select2" name="nvr_id">
                            @foreach ($nvrs as $item)
                                <option  {{old('nvr_id ')== $item->id ?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">IP</label>
                            <input type="text" class="form-control @error('ip') is-invalid @enderror"  value="{{ old('ip') }}"  name="ip" placeholder="Nhập địa chỉ IP" value="">
                            @error('ip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 col-12">
                            <label class="form-label">Link xem trực tiếp</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror"  value="{{ old('link') }}"  name="link"  placeholder="Nhập link xem trực tiếp">
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Vị trí đặt camera</label>
                            <input type="text" class="form-control @error('name_area') is-invalid @enderror"  value="{{ old('name_area') }}"  name="name_area"  placeholder="Nhập vị trí đặt camera">
                            @error('name_area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Tọa độ</label>
                            <input type="text" class="form-control @error('speed') is-invalid @enderror"  value="{{ old('speed') }}"  name="speed"  placeholder="Nhập tọa độ địa điểm">
                            @error('speed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4  col-12">
                            <label class="form-label ">Trạng thái</label>
                            <select class="form-select select2" name="status">
                                <option {{old('status ')== '1' ?'selected':''}} value="1">Đang hoạt động</option>
                                <option {{old('status ')== '0'?'selected':''}} value="0">Dừng hoạt động</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ghi chú</label>
                            <textarea class=" form-control" rows="4" name="note" placeholder="Nhập ghi chú...">{{ old('note') }}</textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary" href="{{route('camera.index')}}"><i class="bx bx-arrow-back me-1 font-13"></i>Quay lại</a>
                            <button type="submit" class="btn btn-primary px-3"><i class="bx bx-save me-1"></i> Thêm mới</button>
                        </div>
                    </form>
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
@endsection