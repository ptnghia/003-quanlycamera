<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    @yield('css')
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<script src="http://42.115.114.5:3001/socket.io/socket.io.js"></script>
	<title>Ứng dụng camera</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('assets/images/logo2.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Camera AI</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('index')}}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Trang chủ</div>
					</a>
				</li>
                <li class="menu-label">QUẢN TRỊ HỆ THỐNG</li>
				@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('bando-menu'))
                <li>
					<a href="{{route('bandoso')}}">
						<div class="parent-icon"><i class='bx bx-map-alt'></i>
						</div>
						<div class="menu-title">Bản đồ số</div>
					</a>
				</li>
				@endif
				@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('identified-show') or Auth::user()->can('identified-menu') or Auth::user()->can('video-menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-camera-movie"></i>
						</div>
						<div class="menu-title">Hệ thống Camera AI</div>
					</a>
					<ul>
						@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('identified-show'))
						<li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Danh sách sự kiện</a>
							<ul>
								<li> <a href="{{route('identified.all')}}"><i class="bx bx-right-arrow-alt"></i>Tất cả sự kiện</a></li>
								@foreach ($nhandien as $item)
								<li> <a href="{{route('identified.all_cate',$item->id)}}"><i class="bx bx-right-arrow-alt"></i>{{$item->name}}</a></li>
								@endforeach
							</ul>
						</li>
						@endif
						@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('identified-menu'))
                        <li> <a href="{{route('identified.index')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách nhận dạng</a></li>
						@endif
						@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('video-menu'))
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Phân tích video</a>
							<ul>
								<li> <a  href="{{route('video.index')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách video</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</li>
				@endif
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cctv'></i>
						</div>
						<div class="menu-title">Hệ thống CCTV</div>
					</a>
					<ul>
						@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('nvr-menu'))
						<li> <a href="{{route('nvr.index')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách NVR</a>
						</li>
						@endif
						@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('camera-menu'))
						<li> <a href="{{route('camera.index')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách Camera</a>
						</li>
						@endif
						@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('xemtructiep-menu'))
						<li> <a href="{{route('xemtructiep.all')}}"><i class="bx bx-right-arrow-alt"></i>Xemn trực tiếp</a>
						</li>
						@endif
					</ul>
				</li>
				@if(Auth::user()->can('datacam-view') and !auth()->user()->hasRole('Super-Admin'))
                <li>
					<a href="{{route('track')}}">
						<div class="parent-icon"><i class='bx bx-cctv'></i>
						</div>
						<div class="menu-title">Giám sát camera</div>
					</a>
				</li>
				@endif
				<li class="menu-label">QUẢN TRỊ CHUNG</li>
                <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">Người dùng</div>
					</a>
					<ul>
						<li> <a href="thong-ke-nguoi-dung.html"><i class="bx bx-right-arrow-alt"></i>Thống kê người dùng</a>
						</li>
						@if(auth()->user()->hasRole('Super-Admin') or Auth::user()->can('user-menu'))
						<li> <a href="{{route('thanh-vien.index')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách người dùng</a>
						</li>
						@endif
						<li> <a href="{{route('profile.index')}}"><i class="bx bx-right-arrow-alt"></i>Quản lý tài khoản</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Thông báo</p>
											<p class="msg-header-clear ms-auto">Đánh dấu tất cả đã đọc</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">Xem tất cả thông báo</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset(Auth::user()->avata!=''? Auth::user()->avata : 'uploads/images/user.png')}}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{Auth::user()->name}}</p>
								<p class="designattion mb-0">Quản trị hệ thống</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{route('profile.index')}}"><i class="bx bx-user"></i><span>Thông tin thành viên</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<i class='bx bx-log-out-circle'></i><span>Đăng xuất</span>
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
            @yield('content')
			
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}"></script>
    @yield('js')
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>
	<script>
		$('.confirm_delete').click(function () { 
			var id = $(this).attr('data_id');
			swal({
				title: "Xác nhận xóa dữ liệu?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$('#del_form_'+id).submit();
				} else {
				}
			});
		});
		@if(Session::has('alert-type'))
		swal({
			title: "{{ Session::get('message', 'info') }}",
			icon: "{{ Session::get('alert-type', 'info') }}",
			button: false,
            timer: 2000
		});
		@endif
	</script>
	
</body>

</html>