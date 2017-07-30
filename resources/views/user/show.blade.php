@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Show User
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection
@section('content')

	<section class="content">

		<br>
		<form method='get' action='{!!url("user")!!}'>
			<button class='btn btn-primary'>user Index</button>
		</form>
		<br>
		<table class='table table-bordered'>
			<thead>
			<th>Key</th>
			<th>Value</th>
			</thead>
			<tbody>
			<tr>
				<td>
					<b><i>user_name : </i></b>
				</td>
				<td>{!!$user->user_name!!}</td>
			</tr>
			<tr>
				<td>
					<b><i>roles_roleID : </i></b>
				</td>
				<td>{!!$user->roles_roleID!!}</td>
			</tr>
			<tr>
				<td>
					<b><i>password : </i></b>
				</td>
				<td>{!!$user->password!!}</td>
			</tr>
			</tbody>
		</table>
	</section>
@endsection