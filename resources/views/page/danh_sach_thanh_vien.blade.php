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
                            <th style="width: 20px;">STT</th>
                            <th>Họ tên</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            
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
                            <td class="text-center">
                                {{ $items->username }}
                            </td>
                            <td>
                                {{ $items->email }}
                            </td>
                            <td>
                                {{ $items->created_at }}
                            </td>
                            
                            <td class="p-4">
                                
                                  
                                    <a method="GET" class="btn btn-sm btn-warning  float-lg-start" href="{{route('thanhvien.edit', $items->id )}}">
                                        <i class="bx bx-edit-alt  me-0"></i>
                                    </a>
                            
                                <form method="POST" class="" action="{{route('thanhvien.destroy', $items->id )}}">
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