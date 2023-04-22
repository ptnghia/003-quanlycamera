@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Phân tích video</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống Camera AI</li>
                    <li class="breadcrumb-item active" aria-current="page">Phân tích video</li>
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
                <div class="ms-auto d-flex">
                    <a href="{{route('hethongcam.themvideophantich')}}" class="btn btn-primary px-2 me-2"><i class="bx bx-video-plus mr-1"></i>Upload video</a>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th>Tên Video</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            <th style="width: 125px;">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=" text-center">
                                1
                            </td>
                            <td class=" text-start">
                                CAM207_H264_2022_11H30.MP4
                            </td>
                            <td class="text-start">
                                207-gt
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{route('hethongcam.ketquaphantichvideo')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Xem kết quả
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                1
                            </td>
                            <td class="text-start">
                                CAM207_H264_2022_11H30.MP4
                            </td>
                            <td class="text-start">
                                207-gt
                            </td>
                            <td>
                                12-09-2022 22:01:03
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{route('hethongcam.ketquaphantichvideo')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Xem kết quả
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