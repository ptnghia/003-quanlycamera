@extends('main')

@section('css')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách Camera</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống CCTV</li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách Camera</li>
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
                <div class="dropdown ms-auto d-flex">
                    <a href="{{route('camera.create')}}" class="btn btn-primary px-2 me-2"><i class="bx bx-plus mr-1"></i>Thêm Camera</a>
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-filter-alt font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                        
                    </ul>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped" id="datatable">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th>Tên thiết bị</th>
                            <th>NVR</th>
                            <th>IP</th>
                            <th>Khu vực</th>
                            <th class=" text-center">Trang thái</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $item)
                        <tr>
                            <td class=" text-center">
                                {{$key+1}}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                               {{$item->nvr_name}}
                            </td>
                            <td>
                                {{$item->ip}}
                            </td>
                            
                            <td>
                                {{$item->name_area}}
                            </td>
                            <td class="text-center">
                                @if($item->status==1)
                                <span class="badge rounded-pill bg-success px-2 py-1 font-12">
                                    Đang hoạt động
                                </span>
                                @else
                                <span class="badge rounded-pill bg-warning px-2 py-1 font-12">
                                    Ngừng hoạt động
                                </span>
                                @endif
                            </td>
                            <td class=" text-center">
                                <a class="btn btn-sm btn-info px-2 me-1" href="">
                                    <i class="bx bx-cctv me-0"></i>
                                </a>
                                <a class="btn btn-sm btn-warning px-2 me-1" href="{{route('camera.edit', $item->id)}}">
                                    <i class="bx bx-edit-alt  me-0"></i>
                                </a>
                                <form method="POST" style="display: inline-block" class="" id="del_form_{{$item->id}}" action="{{route('camera.destroy', $item->id )}}">
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
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
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