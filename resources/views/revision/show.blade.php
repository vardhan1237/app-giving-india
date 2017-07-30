@extends('layouts.app')
@section('breadcrumb')
	<h1>
		{{--{{ucfirst( $project_exist['project_name'])}}--}}
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection
@section('content')

	<div class="container">

		<div class="row">

			<div class="col-md-11">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="{{URL('public/img/la.jpg')}}" class="img-responsive">
						</div>

						<div class="item">
							<img src="{{URL('public/img/chicago.jpg')}}" class="img-responsive">
						</div>

						<div class="item">
							<img src="{{URL('public/img/ny.jpg')}}" class="img-responsive">
						</div>
						<div class="item embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/JGwWNGJdvx8" frameborder="0" allowfullscreen></iframe>
						</div>


					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-11">

				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#general" data-toggle="tab">General</a>
					</li>
					<li><a href="#description" data-toggle="tab">Description</a>
					</li>
					<li>
						<a href="#riskandcall" data-toggle="tab">Risks & Challenges</a>
					</li>

					<li>
						<a href="#rewards" data-toggle="tab">Rewards</a>
					</li>

					<li>
						<a href="#updates" data-toggle="tab">Updates</a>
					</li>


				</ul>
				<?php
				$t_heads = array('Project Name', 'Start Date', 'End Date', 'Target Amount', 'Short Description');
				$fields = array('project_name', 'start_date', 'end_date', 'target_amount', 'short_description');
				$_revised = (array)json_decode($project_revised['project_data']);
				$_rewards = json_decode($project_revised['rewards']);
				$_updates = json_decode($project_revised['updates']);

				?>
				<div class="tab-content ">
					<div class="tab-pane active" id="general">
						<div class="row">
							<div class="col-md-11">
								<br>
								<table class="table table-striped table-responsive table-bordered">
									<thead>
									<tr>
										<th>#</th>
										<th>Existing</th>
										<th>Revised</th>
									</tr>
									</thead>
									@for($ii=0;$ii<5;$ii++)
										<tr>

											<td class="col-md-1"><label>{!! $t_heads[$ii] !!} </label></td>
											<td class="col-md-6">{!! $project_exist[$fields[$ii]] !!}</td>
											<td class="col-md-6" style="font-family:'Source Sans Pro, Helvetica Neue, Helvetica, Arial, sans-serif'">{!! $_revised[$fields[$ii]] !!}</td>

										</tr>
									@endfor

								</table>
							</div>
						</div>


					</div>

					<div class="tab-pane" id="description">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6" style="border-right:1px solid blanchedalmond ">
									<h2>Existing Description</h2>
									<hr>
									{!! $project_exist['description'] !!}
								</div>
								<div class="col-md-6">
									<h2>Revised Description</h2>
									<hr>
									{!! $project_revised['description'] !!}
								</div>

							</div>
						</div>
					</div>
					<div class="tab-pane" id="riskandcall">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6" style="border-right:1px solid blanchedalmond ">
									<h2>Existing Risks&challenges</h2>
									<hr>
									{!! $project_exist['risks_challenges'] !!}
								</div>
								<div class="col-md-6">
									<h2>Revised Risks&challenges</h2>
									<hr>
									{!! $project_revised['risks_challenges'] !!}
								</div>

							</div>
						</div>
					</div>

					<div class="tab-pane" id="rewards">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6" style="border-right:1px solid blanchedalmond ">
									@if(count($project_exist['rewards'])>0)
										<h3>Existing Rewards List</h3>
										<ul class="list-group">
											@foreach($project_exist['rewards'] as $reward)
												<li class="list-group-item">{!! $reward['description'] !!}</li>
											@endforeach
										</ul>
									@else
										<h5>No Rewards Found!!!</h5>
									@endif

								</div>
								<div class="col-md-6">

									@if(count($_rewards)>0)
										<h3>Revised Rewards List</h3>
										<ul class="list-group">
											@foreach($_rewards as $_reward)
												<li class="list-group-item">{!! $_reward->description !!}</li>
											@endforeach
										</ul>
									@else
										<h5>No Rewards Found!!!</h5>
									@endif
								</div>


							</div>
						</div>
					</div>

					<div class="tab-pane" id="updates">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6">
									@if(count($project_exist['updates'])>0)
										<h3>Existing Updates</h3>
										<ul class="list-group">
											@foreach($project_exist['updates'] as $update)
												<li class="list-group-item">{!! $update['condent'] !!}</li>
											@endforeach
										</ul>
									@else
										<h5 align="center">No Updates Found!!!</h5>
									@endif

								</div>
								<div class="col-md-6">

									@if(count($_updates)>0)
										<h3>Revised Updates</h3>
										<ul class="list-group">
											@foreach($_updates as $update)
												<li class="list-group-item">{!! $update->condent !!}</li>
											@endforeach
										</ul>
									@else
										<h5 align="center">No Updates Found!!!</h5>
									@endif
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<hr>

	<style>
		.carousel-inner {
			width: 100%;
			max-height: 400px !important;
		}
	</style>


@endsection