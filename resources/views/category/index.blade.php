@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Categories List

	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection


@section('content')

	@if(Session::has('status'))
		<div class="alert alert-warning col-md-offset-2 text-center status_message">
			{{ Session::get('status') }}

		</div>
		<br>
	@endif

	<section class="content">

		<form class='col s3' method='get' action='{!!url("category")!!}/create'>
			<button class='btn btn-primary' type='submit'>Create New category</button>
		</form>
		<br>
		<br>

		<table id="data_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style='background:#fff'>
			<thead>
			<th>Category</th>
			<th>Status</th>
			<th>Actions</th>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{!!ucfirst($category->category)!!}</td>
					<td>

						@if($category->deleted_at == '' )
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Inactive</span>
						@endif
					</td>
					<td>
						@if($category->deleted_at == '' )<a data-toggle="modal" data-target="#myModal" class='delete btn btn-danger btn-xs' data-link="/category/{!!$category->categoryID!!}/deleteMsg"><i class='material-icons'>Delete</i></a>@endif
						<a href='#' class='viewEdit btn btn-primary btn-xs' data-link='/category/{!!$category->categoryID!!}/edit'><i class='material-icons'>Edit</i></a>
						{{--<a href='#' class='viewShow btn btn-warning btn-xs' data-link='/category/{!!$category->categoryID!!}'><i class='material-icons'>Info</i></a>--}}
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>


	</section>
@endsection