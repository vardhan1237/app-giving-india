@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Edit Update
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection

@section('content')

	<section class="content">

		<form method='get' action='{!!url("update")!!}'>
			<button class='btn btn-danger'>update Index</button>
		</form>
		<br>
		<form method='POST' action='{!! url("update")!!}/{!!$update->updateID!!}/update'>
			<input type='hidden' name='_token' value='{{Session::token()}}'>
			<div class="form-group">
				<input id="projects_projectID" name="projects_projectID" type="hidden" class="form-control" value="{!!$update->projects_projectID!!}">
			</div>


			<div class="form-group has-feedback {{ $errors->has('title') ? ' has-error' : '' }}">
				<label class="control-label" for="title">Title</label>
				<input type="text" id="title" name="title" class="form-control " value="{{old('title',$update->title)}}" autocomplete="off">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('title'))
					<span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('condent') ? ' has-error' : '' }}">
				<label class="control-label" for="condent">Update Information</label>
				<textarea rows="10" id="condent" name="condent" class="form-control jqte-editor">{{old('condent',$update->condent)}}</textarea>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('condent'))
					<span class="help-block">
            <strong>{{ $errors->first('condent') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('date') ? ' has-error' : '' }}">
				<label class="control-label" for="date">Date Of Progress</label>
				<input id="datetimepicker_date1" name="date" type="text" class="form-control" value="{{old('date', date('d/m/Y', strtotime($update->date)))}}" autocomplete="off">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('date'))
					<span class="help-block">
            <strong>{{ $errors->first('date') }}</strong>
					</span>
				@endif
			</div>

			<button class='btn btn-primary' type='submit'>Update</button>
		</form>
	</section>
@endsection