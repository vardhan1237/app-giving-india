@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Rewards
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection

@section('content')

	<section class="content">

		<br>
		<form method='POST' action='{!! url("reward/get-rewards")!!}'>
			<input type='hidden' name='_token' value='{{Session::token()}}'>

			<table id="data_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style='background:#fff'>
				<thead>
				<th>Project</th>
				<th>Actions</th>
				</thead>
				@foreach($projects  as $project)
					<tr>
						<td>{!! ucfirst($project->project_name) !!}</td>
						<td><a href="{{URL::to('/')}}/reward/{{$project->projectID}}/get-rewards">View Rewards List</a></td>
					</tr>
				@endforeach
			</table>


			<button class='btn btn-primary' type='submit'>Submit</button>
		</form>
	</section>


@endsection