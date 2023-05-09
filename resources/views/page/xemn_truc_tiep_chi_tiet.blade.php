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
    <video style="height: 70vh;width: 100%;" id="videoPlayer" class=" radius-10" controls></video>

    <div class="mt-3 d-flex justify-content-between">
        <div><i class="bx bx-cctv"></i> Camera <b>{{$camera->name}}</b></div>
        <div><i class="bx bx-map"></i> Khu vực <b>{{$camera->name_area}}</b></div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script>
    var videoPlayer = document.getElementById('videoPlayer');
    var hls = new Hls();
    hls.loadSource('{{$camera->link}}');
    hls.attachMedia(videoPlayer);
    hls.on(Hls.Events.MANIFEST_PARSED, function() {
      videoPlayer.play();
    });
</script>

@endsection