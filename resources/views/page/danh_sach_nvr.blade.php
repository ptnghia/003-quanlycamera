@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách NVR</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống CCTV</li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách NVR</li>
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
                    <a href="{{route('hethongcctv.themmoinvr')}}" class="btn btn-primary px-2 me-2"><i class="bx bx-plus mr-1"></i>Thêm NVR</a>
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-filter-alt font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                    </ul>
                </div>
            </div>
            <hr>
            <div class=" table-responsive">
                <table class=" table table-bordered table-striped">
                    <thead class=" table-primary">
                       
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th> Tên thiết bị</th>
                            <th> Trạng thái</th>
                            <th> Địa chỉ IP</th>
                            
                            <th> Số Serial</th>
                            <th> Khu vực</th>
                            <th> Phiên bản</th>
                            <th> Số Camera</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($data as $items)
                            <td class=" text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $items->name }}
                            </td>
                            <td class="text-center" id="status">
                                
                                    @if($items->status == 1)
                                    <span class="badge rounded-pill bg-success px-2 py-1 font-12">  Đang hoạt động </span>
                                    @else
                                    <span class="badge rounded-pill bg-danger px-2 py-1 font-12">  Ngừng hoạt động </span>
                                    @endif
                                
                            </td>
                            <td>
                                {{ $items->IP }}
                            </td>
                           
                            <td>
                                {{ $items->serial }}
                            </td>
                            <td>
                               {{$items->area_name}}
                            </td>
                            <td>
                                {{ $items->version }}</th>
                            </td>
                            <td>
                                {{ $items->camera_quantity}}</th>
                            </td>
                            <td class=" text-center">
                                <a method="GET" class="btn btn-sm btn-warning  float-lg-start" href="{{route('nvr.edit', $items->id )}}">
                                    <i class="bx bx-edit-alt  me-0"></i>
                                </a>
                        
                            <form method="POST" class="" action="{{route('nvr.destroy', $items->id )}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ms-3 " href="">
                                    <i class="bx bx-trash-alt me-0"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
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