<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Giving India </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="{{ asset('public/bootstrap/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css')}}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins			 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('public/dist/css/skins/_all-skins.min.css')}}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('public/plugins/iCheck/flat/blue.css')}}">

	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="">

	<header class="main-header">
		<!-- Logo -->
		<a href="{{url('/')}}" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>G</b>I</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Giving</b>India</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->


		</nav>
	</header>
	<div class="container">
		<br><br>
		<div class="col-md-6 col-lg-offset-3">
			<!-- Horizontal Form -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Login</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form class="form-horizontal" method="post" action="{!!url("login")!!}">
					<input type='hidden' name='_token' value='{{Session::token()}}'>
					<div class="box-body">


						<div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>

							<div class="col-md-6">
								<input id="user_name" type="user_name" class="form-control" name="user_name"
								       value="{{ old('user_name') }}" autocomplete="off">

								@if ($errors->has('user_name'))
									<span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="inputPassword3" class="col-sm-2 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password">

								@if ($errors->has('password'))
									<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

					</div>
					<div class="box-footer">
						<button type="button" onclick="reset()" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-info pull-right">Sign in</button>
					</div>
				</form>
				@if(Session::has('status'))
					<div class="alert alert-danger" col-md-offset-2 text-center">
						{{ Session::get('status') }}
					</div>
				@endif
			</div>
		</div>

	</div>

	<footer class="main-footer" style="margin-left: 0px; clear: both">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0.0
		</div>
		<strong>Copyright &copy; <?php echo date("Y"); ?> <a href="{{url('/')}}">Giving India</a>.</strong> All rights
		reserved.
	</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('public/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('public/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('public/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('public/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/app.min.js')}}"></script>


<script>
	function reset() {
		var form = $('form');
		// let the browser natively reset defaults
		form[0].reset();
	}
</script>
</body>
</html>

