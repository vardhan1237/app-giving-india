@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Create Project
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection

@section('content')

	<section class="content">

		<form method='get' action='{!!url("project")!!}'>
			<button class='btn btn-primary'>All Projects</button>
		</form>
		<br>
		<form method='POST' action='{!!url("project")!!}' enctype="multipart/form-data">
			<input type='hidden' name='_token' value='{{Session::token()}}'>

			<div class="form-group has-feedback {{ $errors->has('users_userID') ? ' has-error' : '' }}">
				<select id="users_userID" name="users_userID" class="form-control">
					<option value="">Select A Owner</option>
					@foreach($user_list  as $user)
						<option value="{{ $user->userID }}"
						        @if (old('users_userID') == $user->userID) selected="selected" @endif>{{ ucfirst($user->user_name) }}</option>
					@endforeach
				</select>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('users_userID'))
					<span class="help-block">
                        <strong>{{ $errors->first('users_userID') }}</strong>
                    </span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('project_name') ? ' has-error' : '' }}">
				<label class="control-label" for="project_name">Project Name</label>
				<input id="project_name" name="project_name" type="text" class="form-control" value="{{old('project_name')}}" autocomplete="off">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('project_name'))
					<span class="help-block">
            <strong>{{ $errors->first('project_name') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('caption') ? ' has-error' : '' }}">
				<label class="control-label" for="caption">Caption</label>
				<input id="caption" name="caption" type="text" class="form-control" value="{{old('caption')}}" autocomplete="off">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('caption'))
					<span class="help-block">
            <strong>{{ $errors->first('caption') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('start_date') ? ' has-error' : '' }}">
				<label class="control-label" for="start_date">Start Date</label>
				<input id="datetimepicker_from" name="start_date" type="text" class="form-control" value="{{old('start_date')}}" autocomplete="off">


				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('start_date'))
					<span class="help-block">
            <strong>{{ $errors->first('start_date') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('end_date') ? ' has-error' : '' }}">
				<label class="control-label" for="end_date">End Date</label>
				<input id="datetimepicker_to" name="end_date" type="text" class="form-control" value="{{old('end_date')}}" autocomplete="off">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('end_date'))
					<span class="help-block">
            <strong>{{ $errors->first('end_date') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('target_amount') ? ' has-error' : '' }}">
				<label class="control-label" for="target_amount">Target Amount</label>
				<input id="target_amount" name="target_amount" type="number" class="form-control" value="{{old('target_amount')}}" autocomplete="off">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('target_amount'))
					<span class="help-block">
            <strong>{{ $errors->first('target_amount') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('categoryID') ? ' has-error' : '' }}">
				<select id="categoryID" name="categoryID[]" class="form-control" multiple>
					@foreach($categories  as $category)
						<option value="{{ $category->categoryID }}"
						        @if (old('categoryID')==$category->categoryID) selected="selected" @endif>{{ ucfirst($category->category) }}</option>
					@endforeach
				</select>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('categoryID'))
					<span class="help-block">
            <strong>{{ $errors->first('categoryID') }}</strong>
          </span>
				@endif
			</div>

			{{--<div class="form-group has-feedback {{ $errors->has('subcategoryID') ? ' has-error' : '' }}">
				<label for="subject">Subcategory</label>
				<select id="subcategoryID" name="subcategoryID[]" class="form-control" multiple>
					<option value="">Select A Subcategory</option>
				</select>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('subcategoryID'))
					<span class="help-block">
              <strong>{{ $errors->first('subcategoryID') }}</strong>
          </span>
				@endif
			</div>
--}}
			<div class="form-group has-feedback {{ $errors->has('primary_image') ? ' has-error' : '' }}">
				<label for="primary_image">Primary Picture</label>
				<input id="primary_image" name="primary_image" type="file" class="form-control" autocomplete="off">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('primary_image'))
					<span class="help-block">
              <strong>{{ $errors->first('primary_image') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('short_description') ? ' has-error' : '' }}">
				<label class="control-label" for="short_description">Short Description</label>
				<textarea rows="10" id="short_description" name="short_description" class="form-control jqte-editor">{{old('short_description')}}</textarea>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('short_description'))
					<span class="help-block">
            <strong>{{ $errors->first('short_description') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('description') ? ' has-error' : '' }}">
				<label class="control-label" for="description">Description</label>
				<textarea rows="10" id="description" name="description" class="form-control jqte-editor">{{old('description')}}</textarea>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('description'))
					<span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback {{ $errors->has('risks_challenges') ? ' has-error' : '' }}">
				<label class="control-label" for="risks_challenges">Risks & Challenges</label>
				<textarea rows="10" id="risks_challenges" name="risks_challenges" class="form-control jqte-editor">{{old('risks_challenges')}}</textarea>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('risks_challenges'))
					<span class="help-block">
            <strong>{{ $errors->first('risks_challenges') }}</strong>
					</span>
				@endif
			</div>

			<button class='btn btn-primary' type='submit'>Create</button>

			<input type="hidden" id="old_category" value='<?php echo json_encode(old('categoryID')); ?>'>
			<input type="hidden" id="old_subcategory" value='<?php echo json_encode(old('subcategoryID')); ?>'>
		</form>
	</section>

@endsection


