@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách sự kiện</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống Camera AI</li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách sự kiện</li>
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
                    <div class="form-check-danger form-check form-switch" style="padding-top: 7px;font-size: 13px;padding-left: 0;margin-right: 10px;">
                        <label class="form-check-label" for="flexSwitchCheckCheckedDanger" style="float: left;margin-right: 39px;">Cập nhật dữ liệu tự động</label>
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDanger" checked>
                    </div>
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-filter-alt font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item font-13" href="javascript:;">
                                <span style="display: inline-block;width: 25px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-danger"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                </span>
                                Cảnh báo
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item font-13" href="javascript:;">
                                <span style="display: inline-block;width: 25px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu text-info"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                </span>
                                Thông thường
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item font-13" href="javascript:;">
                                <span style="display: inline-block;width: 25px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw text-primary"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
                                </span>
                                Cập nhật dữ liệu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 110px;">Hình ảnh</th>
                            <th>Sự kiện</th>
                            <th>Thời gian</th>
                            <th>Camera</th>
                            <th>Khu vực</th>
                            <th>Phân loại</th>
                            <th style="width: 125px;">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                                Giải tán đám đông
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td>
                                <i class=" bx bx-cctv me-1"></i> 203-GT
                            </td>
                            <td>
                                UBND Bình Thuận
                            </td>
                            <td class=" text-center">
                                <span class="badge rounded-pill bg-success px-2 py-1 font-12">Thông thường</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Modal_damdong">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Chi tiết</button>
                            </td>
                        </tr>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                                Tụ tập đám đông
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td>
                                <i class=" bx bx-cctv me-1"></i> 203-GT
                            </td>
                            <td>
                                UBND Bình Thuận
                            </td>
                            <td class=" text-center">
                                <span class="badge rounded-pill bg-danger px-2 py-1 font-12">
                                    <span >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-white"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    </span>
                                    Cảnh báo
                                </span>
                            </td>
                            <td>
                                <button type="button"  class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Modal_damdong">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Chi tiết</button>
                            </td>
                        </tr>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                                Tụ tập đám đông
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td>
                                <i class=" bx bx-cctv me-1"></i> 203-GT
                            </td>
                            <td>
                                UBND Bình Thuận
                            </td>
                            <td class=" text-center">
                                <span class="badge rounded-pill bg-success px-2 py-1 font-12">Thông thường</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Modal_damdong">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Chi tiết</button>
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

<div class="modal fade" id="Modal_damdong" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nhận diện đám đông</h5>
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
                                        <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Sự kiện</span>
                                    <div class="text">
                                        Tụ tập đám đông
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Thời gian</span>
                                    <div class="text">
                                       12-09-2022 22:01:03 
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Camera</span>
                                    <div class="text">
                                        20-GT
                                    </div>
                                </div>
                                <div class="mb-4 box-text">
                                    <span class="title">Vị trí</span>
                                    <div class="text">
                                        UBND Tỉnh Bình Thuận
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <p><b>Ảnh toàn cảnh</b></p>
                                <img src="{{asset('assets/images/gallery/16.png')}}" class="card-img-top" alt="...">
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

</script>

@endsection