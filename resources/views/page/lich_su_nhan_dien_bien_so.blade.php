@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Lịch sử nhận diện</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống Camera AI</li>
                    <li class="breadcrumb-item" aria-current="page">Danh sách nhận dạng</li>
                    <li class="breadcrumb-item active" aria-current="page">Lịch sử nhận dạng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card radius-10">
        <div class="card-body">
            <p><b><i class="bx bx-barcode-reader me-2 font-18" style="position: relative;top: 3px;"></i>Biển số xe</b></p>
            <div class="row g-3">
                <div class="col-lg-6 col-12">
                    <div class="box-text">
                        <span class="title">Biển kiểm soát</span>
                        <div class="text">
                            86A-095.77
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="box-text">
                        <span class="title">Mô tả</span>
                        <div class="text">
                            Xe của Luân
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 110px;">Hình ảnh</th>
                            <th>Thời gian</th>
                            <th>Camera</th>
                            <th>Vị trí</th>
                            <th style="width: 125px;">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
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
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Modal_bienso">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Chi tiết
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class=" text-center">
                                <img src="{{asset('assets/images/gallery/05.png')}}" style="object-fit: cover" alt="" width="90px" height="70px" />
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
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Modal_bienso">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Chi tiết
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" d-flex justify-content-between">
                <a class="btn btn-sm btn-primary" href=""><i class="bx bx-arrow-back me-1 font-13"></i>Quay lại</a>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link font-13" href="javascript:;" tabindex="-1" aria-disabled="true">Trang trước</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:;">1</a>
                    </li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:;">2 <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:;">3</a>
                    </li>
                    <li class="page-item"><a class="page-link font-13" href="javascript:;">Trang sau</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal_bienso" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nhận diện biển số xe</h5>
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
                                    <span class="title">Biển kiểm soát</span>
                                    <div class="text">
                                        86A-1559*
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