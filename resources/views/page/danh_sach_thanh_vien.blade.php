@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách người dùng</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị chung</li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
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
                        <input type="text" placeholder="Tìm kiếm" class=" form-control" />
                        <i class=" bx bx-search position-absolute top-50 end-0 px-2 translate-middle-y font-18" ></i>
                    </div>
                </div>
                <div class="dropdown ms-auto d-flex">
                    <a href="{{route('thanhvien.themmoithanhvien')}}" class="btn btn-primary px-2 me-2"><i class="bx bx-plus mr-1"></i>Thêm mới</a>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 150px;">Ảnh đại diện</th>
                            <th>Họ tên</th>
                            <th>Số định danh</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                                Người dùng 01
                            </td>
                            <td class="text-center">
                                01
                            </td>
                            <td>
                                nguoidung01@gmail.com
                            </td>
                            <td>
                               02325252555
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-success px-2 py-1 font-12">
                                    Hoạt động
                                </span>
                            </td>
                            <td class=" text-center">
                                <a class="btn btn-sm btn-warning px-2 me-1" href="">
                                    <i class="bx bx-edit-alt  me-0"></i>
                                </a>
                                <a class="btn btn-sm btn-danger px-2" href="">
                                    <i class="bx bx-trash-alt me-0"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" d-flex flex-row-reverse">
                <ul class="pagination pagination-sm">
                    <li class="page-item disabled"><a class="page-link" href="javascript:;" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:;">1</a>
                    </li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:;">2 <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:;">3</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:;">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>

</script>

@endsection