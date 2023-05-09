@extends('main')

@section('css')
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách người dùng</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;">
                        <i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị chung</li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm mới người dùng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row justify-content-center">
        <div class="col-lg-7 col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5 pt-3">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Thêm người dùng</h5>
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
                    <form class="row g-3" method="POST" action="{{route('thanh-vien.update',$dataId->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="inputLastName1" class="form-label">Họ tên</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror"  value="{{ old('name') ?? $dataId->name }}"  name="name" id="inputLastName1"  placeholder="Nhập họ tên">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Số định danh (Tên đăng nhập)</label>
                            <input type="text" class="form-control  @error('code') is-invalid @enderror"  value="{{ old('username')  ?? $dataId->username }}"  name="username"  placeholder="Nhập số định danh" >
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') ?? $dataId->email }}"  name="email"  placeholder="Nhập email" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12">
                            <label for="inputLastName2" class="form-label">Điện thoại</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') ?? $dataId->phone }}"  name="phone" placeholder="Nhập số điện thoại">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"  value=""  name="password" placeholder="Nhập mật khẩu" value="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="inputLastName2" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control @error('confirm-password') is-invalid @enderror"  value=""  name="confirm-password" placeholder="Nhập lại mật khẩu" value="">
                            @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ghi chú</label>
                            <textarea class=" form-control" rows="4" name="note" placeholder="Nhập ghi chú...">{{ old('note') ?? $dataId->note  }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Phân quyền</label>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control multiple-select2','multiple')) !!}
                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary" href="{{route('thanh-vien.index')}}"><i class="bx bx-arrow-back me-1 font-13"></i>Quay lại</a>
                            <button type="submit" class="btn btn-primary px-3"><i class="bx bx-save me-1"></i>Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-12">
            <div class="card border-top border-0 border-4 border-primary">
                
                <div class="card-body p-3 pt-3">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 font-weight-bold" style="font-size: 16px">Nhóm người dùng</h5>
                    </div>
                    <hr>
                    <div class="table-responsive">  
                        <table class="table table-striped table-bordered">
                            <tr class="bg-blue text-center">
                                <th width="50px">STT</th>
                                <th>Tên nhóm</th>
                                <th width="150px">tác vụ</th>
                            </tr>
                            @foreach ($role as $key => $role)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">{{ $role->name }}</td>
                                <td class="text-center">
                                    @can('role-edit')
                                        <a class="btn btn-sm btn-warning" href="{{ route('roles.edit',$role->id) }}">Sửa</a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Xóa', ['class' => 'btn btn-sm btn-danger delete_confirm']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @if(auth()->user()->hasRole('Super-Admin'))
                    <a href="{{route('roles.create')}}" class="btn btn-primary px-3">Thêm nhóm mới</a>
                    @endif
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