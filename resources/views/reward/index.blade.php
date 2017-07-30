@extends('layouts.app')
@section('breadcrumb')
	<h1>
		All Rewards @if(count($rewards)>0) of {!! ucfirst($rewards[0]->project_name) !!} @endif
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection

@section('content')

	<section class="content">

		<form class='col s3' method='get' action='{!!url("reward")!!}/{!! $pid !!}/create'>
			<button class='btn btn-primary' type='submit'>Add New reward</button>
			<a href="{!!url("reward/projects/reward")!!}" class='btn btn-primary pull-right'>Rewards Home</a>
		</form>
		<br>
		<br>
		<table id="data_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style='background:#fff'>
			<thead>
			<th>Project</th>
			<th>Description</th>
			<th>Rewards</th>
			<th>Reward Cost</th>
			<th>Status</th>
			<th>Actions</th>
			</thead>
			<tbody>
			@foreach($rewards as $reward)
				<tr>
					<td>{!!$reward->project_name!!}</td>
					<td>{!!$reward->description!!}</td>
					<td>{!!$reward->reward_items!!}</td>
					<td>{!!$reward->reward_cost!!}</td>
					<td>@if($reward->deleted_at == '' )
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Inactive</span>
						@endif</td>
					<td>
						@if($reward->deleted_at == '' )<a data-toggle="modal" data-target="#myModal" class='delete btn btn-danger btn-xs' data-link="/reward/{!!$reward->rewardID!!}/deleteMsg"><i class='material-icons'>Delete</i></a>@endif
						<a href='#' class='viewEdit btn btn-primary btn-xs' data-link='/reward/{!!$reward->rewardID!!}/edit'><i class='material-icons'>Edit</i></a>
						<a href='#' class='viewShow btn btn-warning btn-xs' data-link='/reward/{!!$reward->rewardID!!}'><i class='material-icons'>Info</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>


	</section>
@endsection