@extends('layouts.app')
@section('breadcrumb')
	<h1>
		{{ucfirst($project['project_name'])}}
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

					<li>
						<a href="#cont" data-toggle="tab">Contributions</a>
					</li>
				</ul>

				<div class="tab-content ">
					<div class="tab-pane active" id="general">
						<div class="row">
							<div class="col-md-8">
								<table class="table ">
									<tr>
										<td><label> Project Name</label></td>
										<td>{{$project['project_name']}}</td>
									</tr>

									<tr>
										<td><label>Start Date</label></td>
										<td>{{$project['start_date']}}</td>
									</tr>


									<tr>
										<td><label> End Date</label></td>
										<td>{{$project['end_date']}}</td>
									</tr>


									<tr>
										<td><label>Target Amount</label></td>
										<td>{{$project['target_amount']}}</td>
									</tr>

									<tr>
										<td><label>Short Description</label></td>
										<td>{!! $project['short_description'] !!}</td>
									</tr>

								</table>
							</div>
						</div>


					</div>
					<div class="tab-pane" id="description">
						<div class="row">
							<div class="col-md-8">
								{!! $project['description'] !!}
							</div>
						</div>
					</div>
					<div class="tab-pane" id="riskandcall">
						<div class="row">
							<div class="col-md-8">
								{!! $project['risks_challenges'] !!}
							</div>
						</div>
					</div>
					<div class="tab-pane" id="rewards">
						<div class="row">
							<div class="col-md-8">
								@if(count($project['rewards'])>0)
									<h3>Rewards List</h3>
									<ul class="list-group">
										@foreach($project['rewards'] as $reward)
											<li class="list-group-item">{!! $reward['description'] !!}</li>
										@endforeach
									</ul>
								@else
									<h5>No Rewards Found!!!</h5>
								@endif

							</div>
						</div>
					</div>
					<div class="tab-pane" id="updates">
						<div class="row">
							<div class="col-md-8">
								@if(count($project['updates'])>0)
									<h3>Updates</h3>
									<ul class="list-group">
										@foreach($project['updates'] as $update)
											<li class="list-group-item">{!! $update['condent'] !!}</li>
										@endforeach
									</ul>
								@else
									<h5 align="center">No Updates Found!!!</h5>
								@endif
							</div>
						</div>
					</div>
					<div class="tab-pane" id="cont">
						<div class="row">
							<div class="col-md-6">
								@if(count($project['contributions'])>0)


									<h3>Contributions</h3>
									<table class="table">
										<tr>
											<th>
												Contributor
											</th>
											<th>
												Contribution
											</th>

										</tr>
										@foreach($project['contributions'] as $contribution)
											<tr>
												<td>{{ucfirst( $contribution['user']['user_name'])}}</td>
												<td>{{$contribution['amount']}}</td>

											</tr>
										@endforeach
									</table>

								@else
									<h5 align="center">No contributions Made!!!</h5>
								@endif
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