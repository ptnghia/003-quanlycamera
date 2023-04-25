@extends('main')

@section('css')
    <style>
        .lk-tree-menu {
            padding: 10px;
            list-style: none;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .lk-tree-menu input {
            position: absolute;
            clip: rect(0, 0, 0, 0);
        }

        .lk-tree-menu input~ul {
            display: none;
            padding: 0px;
            animation: slideDown 0.5s ease-out;
        }

        .lk-tree-menu input:checked~ul {
            display: block;
        }

        .lk-tree-menu input:checked~label.tree_label:before {
            content: "–";
        }

        .lk-tree-menu input:checked~label.tree_label:after {
            border-radius: 0 0.3em 0 0;
            border-top: 1px solid #606060;
            border-right: 1px solid #606060;
            border-bottom: 0;
            border-left: 0;
            bottom: 0;
            top: 0.5em;
            height: auto;
            margin: 5px 0px 0px 1px;
        }

        .lk-tree-menu>li:last-child:before {
            display: none;
        }

        .lk-tree-menu li {
            line-height: 1.2;
            position: relative;
            padding: 0 0 1em 1em;
            list-style: none;
        }

        .lk-tree-menu li:last-child:before {
            height: 1em;
            bottom: auto;
        }

        .lk-tree-menu li:before {
            position: absolute;
            top: 0;
            bottom: 0;
            left: -0.5em;
            display: block;
            width: 0;
            border-left: 1px solid #606060;
            content: "";
        }

        .lk-tree-menu li:last-child {
            padding-bottom: 0;
        }

        .lk-tree-menu li ul li {
            padding: 0.5em 0 0 1em;
        }

        .lk-tree-menu label {
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -ms-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
            border-radius: 3px;
        }

        .lk-tree-menu label.tree_label {
            cursor: pointer;
            margin: 0px;
            width: 100%;
            padding: 5px;
        }

        .lk-tree-menu label:hover {
            color: white;
            background: #179ac9;
        }

        .lk-tree-menu label.tree_label:before {
            background: #179ac9;
            color: #fff;
            position: relative;
            z-index: 1;
            float: left;
            margin: 0 1em 0 -2.3em;
            width: 1em;
            height: 1em;
            border-radius: 1em;
            content: "+";
            text-align: center;
            line-height: 0.9em;
        }

        .lk-tree-menu label.tree_label:after {
            border-bottom: 0;
        }

        .lk-tree-menu .tree_label {
            position: relative;
            display: inline-block;
            background: #fff;
        }

        .lk-tree-menu .tree_label:after {
            position: absolute;
            top: 0.5em;
            left: -1.5em;
            display: block;
            height: 0.5em;
            width: 1em;
            border-bottom: 1px solid #606060;
            border-left: 1px solid #606060;
            border-radius: 0 0 0 0.3em;
            content: "";
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Bản đồ số</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Quản trị hệ thống</li>
                        <li class="breadcrumb-item active" aria-current="page">Bản đồ số</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Danh sách CCTV</h6>
                            </div>
                            <div class="dropdown ms-auto d-flex">
                                <a href="{{ route('thembandoso') }}" class="btn btn-primary px-2 me-2"><i
                                        class="bx bx-plus mr-1"></i>Thêm mới</a>
                            </div>
                        </div>
                        <hr>
                        <ul class="lk-tree-menu">
                            <li>
                                <input type="checkbox" checked="checked" id="smCB-1" />
                                <label class="tree_label" for="smCB-1"><b>TẤT CẢ</b></label>
                                <ul>
                                 
                                                <input type="checkbox" checked="checked" id="smCB-2" />
                                                <label class="tree_label" for="smCB-2"><b>Hàm Thuận Bắc</b></label>
                                                <ul>
                                                    @foreach ($data as $items)
                                                        <li>
                                                            <span class="tree_label"><i class="bx bx-cctv"></i>
                                                                {{ $items->name }} ({{ $items->cameraname }}) </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                     
                                      
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card radius-10">
                    <div class="card-body">
                        <div id="marker-map" class="gmaps"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- google maps api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async
        defer></script>
    <script>
        // google map scripts
        var map;

        function initMap() {

            var customIcon = {
                url: 'https://cdn-icons-png.flaticon.com/512/9088/9088666.png', // URL of the image file
                scaledSize: new google.maps.Size(50, 50), // Size of the image file
                origin: new google.maps.Point(0, 0), // Position of the top-left corner of the image file
                anchor: new google.maps.Point(25,
                    50) // Position of the point on the image file that corresponds to the marker's position
            };
            var locations = [{
                    lat: 11.185786,
                    lng: 108.565337,
                    title: 'Cây xăng Lê Sinh',
                    icon: customIcon
                },
                {
                    lat: 11.191461,
                    lng: 108.577068,
                    title: 'Petrolimex - Cửa hàng 112',
                    icon: customIcon
                },
                {
                    lat: 11.192939,
                    lng: 108.589882,
                    title: 'Trường mẫu giáo hòa minh',
                    icon: customIcon
                },

            ];
            var map = new google.maps.Map(document.getElementById('marker-map'), {
                zoom: 14,
                center: {
                    lat: 11.1904154,
                    lng: 108.5684944
                }
            });
            for (var i = 0; i < locations.length; i++) {
                var location = locations[i];
                var marker = new google.maps.Marker({
                    position: location,
                    title: location.title,
                    map: map,
                    icon: location.icon // Set the icon property to the custom icon object
                });
            }

        }
        // routes map
        // style map
    </script>
@endsection
