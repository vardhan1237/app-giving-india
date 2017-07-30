@extends('layouts.app')
@section('breadcrumb')
	<h1>
		All Updates @if(count($updates)>0) of {!! ucfirst($updates[0]->project_name) !!} @endif
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection


@section('content')

	<section class="content">


		<form class='col s3' method='get' action='{!!url("update")!!}/{!! $pid !!}/create'>
			<button class='btn btn-primary' type='submit'>Add New Update</button>
			<a href="{!!url("update/projects/update")!!}" class='btn btn-primary pull-right'>Project's Updates Home</a>
		</form>
		<br>
		<br>
		<table id="data_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style='background:#fff'>
			<thead>
			<th>Project</th>
			<th>Title</th>
			<th>Update detail</th>
			<th>Updated On</th>
			<th>Status</th>
			<th>Actions</th>
			</thead>
			<tbody>
			@foreach($updates as $update)
				<tr>
					<td>{!!$update->project_name!!}</td>
					<td>{!!$update->title!!}</td>
					<td>
						{!! $update->condent !!}}

					</td>
					<td>{!!date('d-m-Y', strtotime($update->date))!!}</td>
					<td>@if($update->deleted_at == '' )
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Inactive</span>
						@endif
					</td>

					<td>
						@if($update->deleted_at == '' )<a data-toggle="modal" data-target="#myModal" class='delete btn btn-danger btn-xs' data-link="/update/{!!$update->updateID!!}/deleteMsg"><i class='material-icons'>Delete</i></a>@endif
						<a href='#' class='viewEdit btn btn-primary btn-xs' data-link='/update/{!!$update->updateID!!}/edit'><i class='material-icons'>Edit</i></a>
						<a href='#' class='viewShow btn btn-warning btn-xs' data-link='/update/{!!$update->updateID!!}'><i class='material-icons'>Info</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>


	</section>
@endsection