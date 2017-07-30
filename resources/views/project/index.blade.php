@extends('layouts.app')
@section('breadcrumb')
	<h1>
		All Projects
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection

@section('content')

	<section class="content">

		<br>
		<br>
		<table id="data_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style='background:#fff'>
			<thead>
			<th>Owner</th>
			<th>Project Name</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Target Amount</th>
			<th>Category</th>
			<th>Status</th>
			<th>Actions</th>
			</thead>
			<tbody>
			@foreach($projects as $project)
				<tr>
					<td>{!!$project->user_name!!}</td>
					<td>{!!$project->project_name!!}</td>
					<td>{!!date('d-m-Y', strtotime($project->start_date))!!}</td>
					<td>{!! date('d-m-Y', strtotime($project->end_date)) !!}</td>
					<td>{!!$project->target_amount!!}</td>
					<td>
						<?php
						$temp = '';
						$pro_cat_list = explode(",", $project->categoryID);

						if (count($pro_cat_list) > 0) {
							echo "<ul>";
							foreach ($pro_cat_list as $cid) {
								foreach ($category_list as $cat) {
									if ($cat->categoryID == $cid) {
										echo "<li>" . $cat->category . "</li>";
									}
								}
								unset($cat);
							}
							unset($cid);
						}
						echo "</ul>";

						?>

						<?php


						?>
					</td>

					<td>
						<?php
						$class="";
						if($project->status == 'deleted' ){
						$class='label label-danger';
						}
						if($project->status == 'active' ){
						$class='label label-success';
						}
						if($project->status == 'draft' ||$project->status == 'inactive' ){
						$class='label label-warning';
						}
						?>
						<span class="{{$class}}">{!! ucfirst($project->status) !!}</span>
					</td>
					<td>
						@if($project->status == 'active' )
							<a data-toggle="modal" data-target="#myModal" class='delete btn btn-primary btn-xs' data-link="/project/{!!$project->projectID!!}/blockMsg"><i class='material-icons'>Block</i></a>
						@endif
						@if($project->status == 'inactive' || $project->status == 'draft' )

							<a data-toggle="modal" data-target="#myModal" class='delete btn btn-primary btn-xs' data-link="/project/{!!$project->projectID!!}/activateMsg"><i class='material-icons'>Activate</i></a>
						@endif
						@if($project->deleted_at == '' )<a data-toggle="modal" data-target="#myModal" class='delete btn btn-danger btn-xs' data-link="/project/{!!$project->projectID!!}/deleteMsg"><i class='material-icons'>Delete</i></a>@endif
						<a href='#' class='viewShow btn btn-warning btn-xs' data-link='/project/{!!$project->projectID!!}'><i class='material-icons'>Info</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>


	</section>



@endsection