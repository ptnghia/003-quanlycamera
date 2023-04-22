@extends('main')

@section('css')
<style>
</style>

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
                    <li class="breadcrumb-item active" aria-current="page">Danh sách nhận dạng</li>
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
                    <a href="{{route('hethongcam.themdoituongnhandang')}}" class="btn btn-primary px-2 me-2"><i class="bx bx-plus mr-1"></i>Thêm đối tượng</a>
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-filter-alt font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item font-13" href="javascript:;">
                                <span style="display: inline-block;width: 25px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-danger"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                </span>
                                Danh sách đen
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
                                    <i class="bx bx-face"></i>
                                </span>
                                Nhận diện khuôn mặt
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item font-13" href="javascript:;">
                                <span style="display: inline-block;width: 25px;">
                                    <i class="bx bx-barcode-reader"></i>
                                </span>
                                Nhận diện biển số xe
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
                            <th>Đối tượng</th>
                            <th>Loại nhận diện</th>
                            <th>Thời gian</th>
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
                                Nguyễn Trung Tín
                            </td>
                            <td>
                                Khuôn mặt
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td class=" text-center">
                                <span class="badge rounded-pill bg-danger px-2 py-1 font-12">
                                    <span >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-white"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    </span>
                                    Danh sách đen
                                </span>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{route('hethongcam.lichsunhandienkhuonmat')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Lịch sử
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                               Đối tượng 01
                            </td>
                            <td>
                                Khuôn mặt
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td class=" text-center">
                                <span class="badge rounded-pill bg-danger px-2 py-1 font-12">
                                    <span >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-white"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    </span>
                                    Danh sách đen
                                </span>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{route('hethongcam.lichsunhandienkhuonmat')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Lịch sử
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                            </td>
                            <td>
                               86A-0953.77
                            </td>
                            <td>
                                Biển số xe
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td class=" text-center">
                                <span class="badge rounded-pill bg-success px-2 py-1 font-12">
                                    Thông thường
                                </span>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{route('hethongcam.lichsunhandienbienso')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Lịch sử
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