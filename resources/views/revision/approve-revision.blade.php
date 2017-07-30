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
			<div class="col-md-10">
				<form method='POST' action='{!!url("revision/approve-project")!!}' enctype="multipart/form-data">
					<input type='hidden' name='_token' value='{{Session::token()}}'>
					<input type="hidden" name="pid" value="{{$project_revised['projects_projectID']}}">
					<input type="hidden" name="row_id" value="{{$project_revised['id']}}">
					<div class="form-group has-feedback {{ $errors->has('revision_note') ? ' has-error' : '' }}">
						<label class="control-label" for="revision_note">Revision Note</label>
						<textarea rows="10" id="revision_note" name="revision_note" class="form-control" style="resize: none;">{{old('revision_note')}}</textarea>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						@if ($errors->has('revision_note'))
							<span class="help-block">
            <strong>{{ $errors->first('revision_note') }}</strong>
					</span>
						@endif
					</div>
					<button class='btn btn-primary' type='submit'>Approve</button>
				</form>


			</div>
		</div>
	</div>
@endsection