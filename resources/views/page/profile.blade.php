@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Quản lý tài khoản</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị chung</li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý tài khoản</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row justify-content-center">
        <!--div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                        <div class="mt-3">
                            <h4>John Doe</h4>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone text-primary"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Điên thoại</h6>
                            <span class="text-secondary">https://codervent.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i style="position: relative;top: 5px;color: #179ac9;" class="bx bx-envelope font-24 me-1"></i> Email</h6>
                            <span class="text-secondary">codervent</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div-->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center mb-4">
                        <form method="POST" class="position-relative" onsubmit="return false"  action="{{ route('ajax')}}" enctype="multipart/form-data" id="avata-form">
                            @csrf
                            <img id="output" src="{{asset(Auth::user()->avata!=''? Auth::user()->avata : 'uploads/images/user.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <span class=" position-absolute btn-avatar">
                                <input type="file" onchange="loadFile(event)" accept="image/*" name="file" id="avata" />
                                <span class="text load_avatar"><i class="bx bx-image-add"></i></span>
                            </span>
                        </form>
                    </div>
                    <form class="row g-3 mt-5" method="POST" action="{{ route('profile.update')}}" >
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3 text-end">
                                <label class="mb-0">Họ tên</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{old('ten') ?? Auth::user()->name}}" name="name" placeholder="Nhập họ và tên">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 text-end">
                            <div class="col-sm-3">
                                <label class="mb-0">Email</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email') ?? Auth::user()->email}}" placeholder="Nhập email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 text-end">
                            <div class="col-sm-3">
                                <label class="mb-0">Tên đăng nhập</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" value="{{old('username') ?? Auth::user()->username}}" placeholder="Nhập tên đăng nhập">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 text-end">
                            <div class="col-sm-3">
                                <label class="mb-0">Mật khẩu</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password" placeholder="Nhập mật khẩu mới">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3 text-end">
                                <label class="mb-0">Nhập lại mật khẩu</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror " name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-primary px-4"><i class="fadeIn animated bx bx-save"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
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
<script>
    var loadFile = function(event) {
        $('.load_avatar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>');
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);

        var formData = new FormData();
        formData.append('file', $('#avata')[0].files[0]);
        formData.append('_token', '{{csrf_token()}}');
        formData.append('atc', 'upload_avata'); 
        $.ajax({
            url: $("#avata-form").attr('action'), // URL của route trong Laravel để xử lý file
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                //alert(data);
                if(data==='1'){
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        icon: 'bx bx-check-circle',
                        delayIndicator: false,
                        sound: 'sound2', 
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Cập nhật thành công'
                    });
                }else{
                    Lobibox.notify('error', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-x-circle',
                        sound: 'sound1',  
                        msg: 'Đã xảy ra lỗi'
                    });
                }
                $('.load_avatar').html('<i class="bx bx-image-add"></i>');
            }
        });
        
    };
    @if (session('success'))
    Lobibox.notify('success', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'bx bx-check-circle',
        delayIndicator: false,
        sound: 'sound2', 
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: '{{session('success')}}'
    });
    @endif
    @if (session('errors'))
    Lobibox.notify('error', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        icon: 'bx bx-x-circle',
        sound: 'sound2',  
        msg: '{{session('errors')}}'
    });
    @endif
</script>

@endsection