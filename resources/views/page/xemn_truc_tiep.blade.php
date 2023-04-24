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
                <div class="col-lg-4 col-sm-6">
                    <video width="100%" height="300" id="videoPlayer" class=" radius-10" controls></video>
                </div>
                <div class="col-lg-4 col-sm-6">
                    
                    <video width="100%" height="300" controls class=" radius-10">
                        <source src="rtsp://admin:Admin123456@hoaphu.zapto.org:555/Streaming/channels/101" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <video width="100%" height="300" controls class=" radius-10">
                        <source src="movie.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <video width="100%" height="300" controls class=" radius-10">
                        <source src="movie.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <video width="100%" height="300" controls class=" radius-10">
                        <source src="movie.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <video width="100%" height="300" controls class=" radius-10">
                        <source src="movie.mp4" type="video/mp4">
                    </video>
                </div>
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
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script>
    var videoPlayer = document.getElementById('videoPlayer');
    var hls = new Hls();
    hls.loadSource('http://42.115.114.5:8083/stream/27aec28e-6181-4753-9acd-0456a75f0289/channel/0/hls/live/index.m3u8');
    hls.attachMedia(videoPlayer);
    hls.on(Hls.Events.MANIFEST_PARSED, function() {
      videoPlayer.play();
    });
</script>

@endsection