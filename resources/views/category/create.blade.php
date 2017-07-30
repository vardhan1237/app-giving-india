@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Create Category
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection
@section('content')


	<section class="content">

		<form method='get' action='{!!url("category")!!}'>
			<button class='btn btn-primary'>All Categories</button>
		</form>
		<br>
		<form method='POST' action='{!!url("category")!!}'>
			<input type='hidden' name='_token' value='{{Session::token()}}'>
			<div class="form-group has-feedback {{ $errors->has('parentID') ? ' has-error' : '' }}">
			<select id="parentID" name="parentID" class="form-control" >
				<option value="">Select Parent Category</option>
				@foreach($categories  as $category)
					<option value="{{ $category->categoryID }}"
					        @if (old('parentID') == $category->categoryID) selected="selected" @endif>{{ ucfirst($category->category) }}</option>
				@endforeach
			</select>
			<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			@if ($errors->has('parentID'))
				<span class="help-block">
            <strong>{{ $errors->first('parentID') }}</strong>
          </span>
				@endif
				</div>
				<div class="form-group has-feedback {{ $errors->has('category') ? ' has-error' : '' }}">
					<label class="control-label" for="category">Category</label>
					<input id="category" name="category" type="text" class="form-control" value="{{old('category')}}" autocomplete="off">
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					@if ($errors->has('category'))
						<span class="help-block">
            <strong>{{ $errors->first('category') }}</strong>
					</span>
					@endif
				</div>
				<button class='btn btn-primary' type='submit'>Create</button>
		</form>
	</section>
@endsection