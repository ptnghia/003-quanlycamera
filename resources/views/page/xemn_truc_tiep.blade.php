@extends('main')

@section('css')
<style>
</style>

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Xem trực tiếp</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                    <li class="breadcrumb-item" aria-current="page">Hệ thống CCTV</li>
                    <li class="breadcrumb-item active" aria-current="page">Xem trực tiếp</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card radius-10">
        <div class="card-body">
            <div class="row g-3 mb-3">
                @foreach ($list_cameras as $item)
                <div class="col-lg-4 col-sm-6 position-relative">
                    <video width="100%" id="videoPlayer{{$item->id}}" class=" radius-10" controls></video>
                    <div class=" d-flex justify-content-between position-absolute top-0 left-0" style="left: 8px;right: 8px;background-color: #ffffffb0;padding: 7px;color: #070707;border-radius: 8px 8px 0 0;font-weight: 500;">
                        <div>
                            <i class="bx bx-cctv"></i> {{$item->name_area}} ({{$item->name}})
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script>
    @foreach ($list_cameras as $item)
    var videoPlayer{{$item->id}} = document.getElementById('videoPlayer{{$item->id}}');
    var hls = new Hls();
    hls.loadSource('{{$item->link}}');
    hls.attachMedia(videoPlayer{{$item->id}});
    hls.on(Hls.Events.MANIFEST_PARSED, function() {
      //videoPlayer{{$item->id}}.play();
    });
    @endforeach
</script>

@endsection