@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Show Update
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection

@section('content')

	<section class="content">
		<h1>
			Show update
		</h1>
		<br>
		<form method='get' action='{!!url("update")!!}'>
			<button class='btn btn-primary'>update Index</button>
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
					<b><i>projects_projectID : </i></b>
				</td>
				<td>{!!$update->projects_projectID!!}</td>
			</tr>
			<tr>
				<td>
					<b><i>title : </i></b>
				</td>
				<td>{!!$update->title!!}</td>
			</tr>
			<tr>
				<td>
					<b><i>condent : </i></b>
				</td>
				<td>{!!$update->condent!!}</td>
			</tr>
			<tr>
				<td>
					<b><i>date : </i></b>
				</td>
				<td>{!!$update->date!!}</td>
			</tr>
			</tbody>
		</table>
	</section>
@endsection