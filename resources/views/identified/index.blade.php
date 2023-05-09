@extends('main')

@section('css')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">


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
                        <input id="custom-search-input" type="text" placeholder="Tìm kiếm" class=" form-control" />
                        <i class=" bx bx-search position-absolute top-50 end-0 px-2 translate-middle-y font-18" ></i>
                    </div>
                </div>
                <div class="dropdown ms-auto d-flex">
                    <a href="{{route('identified.create')}}" class="btn btn-primary px-2 me-2"><i class="bx bx-plus mr-1"></i>Thêm đối tượng</a>
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-filter-alt font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($types as $item)
                        <li>
                            <a class="dropdown-item font-13 filter_search" href="javascript:;" data="{{$item->name}}">
                                <span style="display: inline-block;width: 25px;">
                                    <i class="bx bx-barcode-reader"></i>
                                </span>
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @foreach ($cates as $item)
                        <li>
                            <a class="dropdown-item font-13 filter_search"  href="javascript:;" data="{{$item->name}}">
                                <span style="display: inline-block;width: 25px;">
                                    <i class="bx bx-barcode-reader"></i>
                                </span>
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped" id="datatable">
                    <thead class=" table-primary">
                        <tr>
                            <th style="width: 110px;">Hình ảnh</th>
                            <th>Đối tượng</th>
                            <th>Loại nhận diện</th>
                            <th>Thời gian</th>
                            <th class=" text-center">Phân loại</th>
                            <th style="width: 125px;" class=" text-center">Chi tiết</th>
                            <th class=" text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                        <tr>
                            <td class=" text-center">
                                @if ($item['image'] !='' )
                                <img src="{{asset($item['image'])}}" style="object-fit: cover" alt="" width="90px" height="70px" />
                                @endif
                            </td>
                            <td>
                                {{$item['data']->name}}
                            </td>
                            <td>
                                {{$item['data']->cate}}
                            </td>
                            <td>
                                {{$item['data']->created_at}}
                            </td>
                            <td class=" text-center">
                                {{$item['data']->type}}
                            </td>
                            <td class="text-center">
                                <a style="font-size: 11px;" class="btn btn-sm btn-info" href="{{route('identified.show', $item['data']->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    Xem lịch sử
                                </a>
                            </td>
                            <td class=" text-center">
                                <a class="btn btn-sm btn-warning px-2 me-1" href="{{route('identified.edit', $item['data']->id)}}">
                                    <i class="bx bx-edit-alt  me-0"></i>
                                </a>
                                <form method="POST" style="display: inline-block" class="" id="del_form_{{$item['data']->id}}" action="{{route('identified.destroy', $item['data']->id )}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-danger confirm_delete" data_id="{{$item['data']->id}}" href="">
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

<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
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
        $('.filter_search').click(function () { 
            var table = $('#datatable').DataTable();
            table.search($(this).attr('data')).draw();
        });
    });
</script>

@endsection