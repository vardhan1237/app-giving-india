@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Edit Category
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection
@section('content')

	<section class="content">
		<h1>
			Edit category
		</h1>
		<form method='get' action='{!!url("category")!!}'>
			<button class='btn btn-primary'>Show All Categories </button>
		</form>
		<br>
		<form method='POST' action='{!! url("category")!!}/{!!$category->
        categoryID!!}/update'>
			<input type='hidden' name='_token' value='{{Session::token()}}'>
			<div class="form-group has-feedback {{ $errors->has('parentID') ? ' has-error' : '' }}">
				<select id="parentID" name="parentID" class="form-control">
					<option value="">Select Parent Category</option>
					@foreach($categories  as $categ)
						@if($category->categoryID!=$categ->categoryID)
						<option value="{{ $categ->categoryID }}"
						        @if (old('parentID',$category->parentID) == $categ->categoryID) selected="selected" @endif>{{ ucfirst($categ->category) }}</option>
						@endif
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
				<label for="category">Category</label>
				<input id="category" name="category" type="text" class="form-control" value="{{old('category',$category->category)}}" autocomplete="off">
				<input id="old_val" name="old_val" type="hidden" class="form-control" value="{{$category->category}}" autocomplete="off">

				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('category'))
					<span class="help-block">
            <strong>{{ $errors->first('category') }}</strong>
					</span>
				@endif
			</div>
			<div class="form-group has-feedback">
				<label for="category">Status</label><br>
				<input type="radio" name="cate_status" value="active" <?php if (old('cate_status') == 'active' || $category->deleted_at == '') {
					echo "checked";
				} ?> > Active<br>
				<input type="radio" name="cate_status" value="inactive" <?php if (old('cate_status') == 'inactive' || $category->deleted_at != '') {
					echo "checked";
				} ?> > Inactive<br>

			</div>
			<button class='btn btn-primary' type='submit'>Update</button>
		</form>
	</section>
@endsection