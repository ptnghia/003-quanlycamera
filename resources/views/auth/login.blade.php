<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<title>Đăng nhập - Camera AI</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="assets/images/logo.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
							
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class=" text-uppercase font-18"><b>Đăng nhập hệ thống</b></h3>
										<p>Nhập thông tin của bạn</a>
										</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST" action="{{ route('login') }}">
											@csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Tài khoản</label>
												<input type="text" class="form-control @error('username') is-invalid @enderror" id="inputEmailAddress" name="username" placeholder="Nhập tên tài khoản" value="{{ old('username') }}" required autocomplete="username" autofocus>
												@error('username')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Mật khẩu</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0 @error('password') is-invalid @enderror" id="inputChoosePassword" name="password" required autocomplete="current-password" placeholder="Nhập mật khẩu"> 
													<a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
													@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
													<label class="form-check-label" for="flexSwitchCheckChecked">Ghi nhớ đăng nhập</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="#">Quên mật khẩu?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Đăng nhập</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!--img src="http://42.115.114.5:3001/camlhp554/general_camlhp554_1_18-03-2023_21-57-15.png" width="50%" alt="" />
						<img src="http://42.115.114.5:3001/camlhp554/crop_camlhp554_2_18-03-2023_21-57-25.png" width="50%" alt="" /-->
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>
</body>

</html>