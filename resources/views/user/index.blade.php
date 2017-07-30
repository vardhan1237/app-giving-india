@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Users
	</h1>

	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection

@section('content')

	<section class="content">

		<form class='col s3' method='get' action='{!!url("user")!!}/create'>
			<button class='btn btn-primary' type='submit'>Create New user</button>
		</form>
		<br>
		<br>
		<table id="data_table" class="table table-striped table-bordered table-hover" style='background:#fff'>
			<thead>
			<th>User</th>
			<th>Role</th>
			<th>Status</th>
			<th>Actions</th>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{!! ucfirst($user->user_name) !!}</td>
					<td>{!!ucfirst($user->role) !!}</td>
					<td>
						@if($user->is_blocked == 'no' )
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Blocked</span>
						@endif

					</td>
					<td>
						@if($user->is_blocked == 'no' )
							<a data-toggle="modal" data-target="#myModal" class='delete btn btn-primary btn-xs' data-link="/user/{!!$user->userID!!}/blockMsg"><i class='material-icons'>Block</i></a>
						@else
							<a data-toggle="modal" data-target="#myModal" class='delete btn btn-primary btn-xs' data-link="/user/{!!$user->userID!!}/activateMsg"><i class='material-icons'>Activate</i></a>
						@endif

						<a data-toggle="modal" data-target="#myModal" class='delete btn btn-primary btn-xs' data-link="/user/{!!$user->userID!!}/deleteMsg"><i class='material-icons'>Delete</i></a>

					</td>
				</tr>
			@endforeach
			</tbody>
		</table>


	</section>
@endsection