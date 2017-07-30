<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="_token" content="{{ csrf_token() }}">
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

	<!-- jvectormap -->
	<link rel="stylesheet" href="{{ asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('public/plugins/datepicker/datepicker3.css')}}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('public/plugins/daterangepicker/daterangepicker.css')}}">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
	<link rel="stylesheet" href="{{ asset('public/css/custom.css')}}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">
		<!-- Logo -->
		<a href="{!! url('/home') !!}" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>G</b>I</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Giving</b>India</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Messages: style can be found in dropdown.less-->
					<li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i>
							<span class="label label-success">4</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 4 messages</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li><!-- start message -->
										<a href="#">
											<div class="pull-left">
												{{--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
											</div>
											<h4>
												Support Team
												<small><i class="fa fa-clock-o"></i> 5 mins</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
									<!-- end message -->
									<li>
										<a href="#">
											<div class="pull-left">
												{{--<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">--}}
											</div>
											<h4>

												<small><i class="fa fa-clock-o"></i> 2 hours</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="pull-left">
												{{--<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">--}}
											</div>
											<h4>
												Developers
												<small><i class="fa fa-clock-o"></i> Today</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="pull-left">
												{{--<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">--}}
											</div>
											<h4>
												Sales Department
												<small><i class="fa fa-clock-o"></i> Yesterday</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="pull-left">
												{{--<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">--}}
											</div>
											<h4>
												Reviewers
												<small><i class="fa fa-clock-o"></i> 2 days</small>
											</h4>

										</a>
									</li>
								</ul>
							</li>
							<li class="footer"><a href="#">See All Messages</a></li>
						</ul>
					</li>
					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">10</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 10 notifications</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li>
										<a href="#">
											<i class="fa fa-users text-aqua"></i> 5 new members joined today
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
											page and may cause design problems
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-users text-red"></i> 5 new members joined
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-shopping-cart text-green"></i> 25 sales made
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-user text-red"></i> You changed your username
										</a>
									</li>
								</ul>
							</li>
							<li class="footer"><a href="#">View all</a></li>
						</ul>
					</li>
					<!-- Tasks: style can be found in dropdown.less -->
					<li class="dropdown tasks-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-flag-o"></i>
							<span class="label label-danger">9</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 9 tasks</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li><!-- Task item -->
										<a href="#">
											<h3>
												Design some buttons
												<small class="pull-right">20%</small>
											</h3>
											<div class="progress xs">
												<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">20% Complete</span>
												</div>
											</div>
										</a>
									</li>
									<!-- end task item -->
									<li><!-- Task item -->
										<a href="#">
											<h3>
												Create a nice theme
												<small class="pull-right">40%</small>
											</h3>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">40% Complete</span>
												</div>
											</div>
										</a>
									</li>
									<!-- end task item -->
									<li><!-- Task item -->
										<a href="#">
											<h3>
												Some task I need to do
												<small class="pull-right">60%</small>
											</h3>
											<div class="progress xs">
												<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">60% Complete</span>
												</div>
											</div>
										</a>
									</li>
									<!-- end task item -->
									<li><!-- Task item -->
										<a href="#">
											<h3>
												Make beautiful transitions
												<small class="pull-right">80%</small>
											</h3>
											<div class="progress xs">
												<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">80% Complete</span>
												</div>
											</div>
										</a>
									</li>
									<!-- end task item -->
								</ul>
							</li>
							<li class="footer">
								<a href="#">View all tasks</a>
							</li>
						</ul>
					</li>
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{url('public/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
							<span class="hidden-xs">{!! ucfirst(Session::get('user_name')) !!}</span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="{{url('public/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

								<p>
									Hello {!! ucfirst(Session::get('user_name')) !!}

								</p>
							</li>
							<!-- Menu Body -->
							<li class="user-body">

								<!-- /.row -->
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="#" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>


				</ul>
			</div>


		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="{{url('public/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>{!! ucfirst(Session::get('user_name')) !!}</p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>

			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<li class="active treeview">
					<a href="{{url('/home')}}">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>

            </span>
					</a>
					<ul class="treeview-menu">

						<li class="{{ Session::get("menuindex")==1 ? ' active' : '' }}">
							<a href="{{url('/user')}}"> <i class="fa fa-users" aria-hidden="true"></i> Users</a>
						</li>

						<li class="{{ Session::get("menuindex")==1 ? ' active' : '' }}">
							<a href="{{url('/category')}}"> <i class="fa fa-tags" aria-hidden="true"></i> Categories</a>
						</li>

						<li class="{{ Session::get("menuindex")==2 ? ' active' : '' }}">
							<a href="{{url('/project')}}"><i class="fa fa-list-alt"></i> Projects</a>

						</li>

					</ul>

				</li>

			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->


		<section class="content-header">


			@yield('breadcrumb')

		</section>


		<!-- Main content -->
		<section class="content">

			@yield('content')

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0.0
		</div>
		<strong>Copyright &copy; <?php echo date("Y"); ?> <a href="{{url('/')}}">Giving India</a>.</strong> All rights
		reserved.
	</footer>


</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class='AjaxisModal'>
	</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('public/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('public/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('public/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('public/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('public/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/app.js')}}"></script>

<script src="{{URL::asset('public/js/AjaxisBootstrap.js') }}"></script>
<script src="{{URL::asset('public/js/scaffold-interface-js/customA.js') }}"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('public/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/js/bootstrap-datetimepicker.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('public/css/bootstrap-datetimepicker.min.css')}}"/>

<link rel="stylesheet" href="{{ asset('public/css/jquery-te-1.4.0.css')}}"/>
<script type="text/javascript" src="{{ asset('public/js/jquery-te-1.4.0.min.js')}}"></script>


<script>
	var base_URL = "{{URL::to('/')}}";
	var baseURL = "{{URL::to('/')}}";

	$(document).ready(function () {

		$('.jqte-editor').jqte();
		/**********************************************
		 *  FOR DATA TABLES
		 ***********************************************
		 * */
		$('#data_table').DataTable({
			"paging": true,
			"ordering": true,
			"info": false,
			"pagingType": "full_numbers"
		});


		/**********************************************
		 *  FOR DATE PICKERS
		 ***********************************************
		 * */


		if ($("#old_date1").length) {

			$('#datetimepicker_date1').datetimepicker({
				defaultDate: new Date($("#old_date1").val() + "00:00:00").getTime() / 1000,
				minDate: new Date(),
				format: 'DD/MM/YYYY'
			});
		} else {

			$('#datetimepicker_date1').datetimepicker({
				minDate: new Date(),
				format: 'DD/MM/YYYY'
			});
		}


		if ($("#old_date_from") != '' && $("#old_date_from") != 'null' && $("#old_date_from") != null) {
			$('#datetimepicker_from').datetimepicker({
				defaultDate: new Date($("#old_date_from").val() + "00:00:00").getTime() / 1000,
				format: 'DD/MM/YYYY'
			});
		} else {
			$('#datetimepicker_from').datetimepicker({
				minDate: new Date(),
				format: 'DD/MM/YYYY'
			});
		}
		$('#datetimepicker_to').datetimepicker({
			useCurrent: false, //Important! See issue #1075
			format: 'DD/MM/YYYY'
		});
		$("#datetimepicker_from").on("dp.change", function (e) {
			$('#datetimepicker_to').data("DateTimePicker").minDate(e.date);
		});
		$("#datetimepicker_to").on("dp.change", function (e) {
			$('#datetimepicker_from').data("DateTimePicker").maxDate(e.date);
		});


		/**************************************************
		 * category and subcategory drop down functionality
		 *************************************************
		 */

		$("#categoryID").on("change", function () {

			$('#chapter_name').empty();
			var categoryID = '';
			$('#categoryID :selected').each(function (i, selected) {
				categoryID += $(selected).val() + ",";
			});
			categoryID = categoryID.replace(/,\s*$/, '');
			update_subcategory_dropdown(categoryID);

		});

		var old_category = $("#old_category").val();
		if (old_category && old_category != 'null') {
			var valArr = JSON.parse($("#old_subcategory").val());
			var i = 0, size = valArr.length,
					$options = $('#categoryID option');
			for (i; i < size; i++) {
				$options.filter('[value="' + valArr[i] + '"]').prop('selected', true);

			}
			$('#categoryID').trigger('change');
			$("#categoryID").trigger("chosen:updated");
		}


		/*****************************************************
		 *Deleting the status messages
		 *****************************************************
		 */

		if ($(".status_message").length) {
			setTimeout(function () {
				$(".status_message").hide();
			}, 2500);
		}


	});


	function update_subcategory_dropdown(categoryID) {

		$('#subcategoryID').empty();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});

		$.ajax({
			type: 'POST',
			url: base_URL + "/secure/get_avil_subcategories",
			data: {_token: $("#_token").val(), categoryID: categoryID},
			dataType: "json"
		}).done(function (resultData) {
			$.each(resultData, function (i, item) {
				$('#subcategoryID').append($('<option>', {
					value: item.categoryID,
					text: item.category
				}));
			});
		}).fail(function (error) {
			console.error(error);
		})
				.always(function () {

					if ($("#old_subcategory").val() != '' && $("#old_subcategory").val() != null && $("#old_subcategory").val() != 'null') {
						var valArr = JSON.parse($("#old_subcategory").val());
						var i = 0, size = valArr.length,
								$options = $('#subcategoryID option');
						for (i; i < size; i++) {
							$options.filter('[value="' + valArr[i] + '"]').prop('selected', true);
						}
					}
				})


	}

</script>

@yield('page-script')

</body>
</html>