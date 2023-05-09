@extends('main')

@section('css')

<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">

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
                        <input id="custom-search-input" type="text" placeholder="Tìm kiếm" class=" form-control" />
                        <i class=" bx bx-search position-absolute top-50 end-0 px-2 translate-middle-y font-18" ></i>
                    </div>
                </div>
                <div class="ms-auto d-flex">
                    <a href="{{route('video.create')}}" class="btn btn-primary px-2 me-2"><i class="bx bx-video-plus mr-1"></i>Upload video</a>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped" id="datatable">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th>Tên Video</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            <th style="width: 125px;">Chi tiết</th>
                            <th style="width: 120px;" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $item)
                        <tr>
                            <td class=" text-center">
                                {{$key+1}}
                            </td>
                            <td class=" text-start">
                                <a data-fancybox data-src="{{asset($item->url)}}" href="">{{$item->name}}</a>
                            </td>
                            <td class="text-start">
                                {{$item->note}}
                            </td>
                            <td>
                                {{$item->created_at}}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="{{route('video.show', $item->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Xem kết quả
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning px-2 me-1" href="{{route('video.edit', $item->id)}}">
                                    <i class="bx bx-edit-alt  me-0"></i>
                                </a>
                                <form method="POST" style="display: inline-block" class="" id="del_form_{{$item->id}}" action="{{route('video.destroy', $item->id )}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-danger confirm_delete" data_id="{{$item->id}}" href="">
                                        <i class="bx bx-trash-alt me-0"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet"   href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
Fancybox.bind("[data-fancybox]", {});
$(document).ready(function() {
    var table = $('#datatable').DataTable({
        "lengthChange": false,
        //"bFilter": false,
    });

    $('#custom-search-input').keyup(function() {
        var table = $('#datatable').DataTable();
        table.search($(this).val()).draw();
    });
});
</script>

@endsection