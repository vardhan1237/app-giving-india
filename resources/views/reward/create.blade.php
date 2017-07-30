@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Create Reward for {!! ucfirst($project->project_name) !!}
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection
@section('content')

	<section class="content">

		<form method='get' action='#'>
			<a href="{!!url("reward/".$id."/get-rewards") !!}" class='btn btn-primary'>Show All Rewards of {!! ucfirst($project->project_name) !!}</a>
			<a href="{!!url("reward/projects/reward")!!}" class='btn btn-primary pull-right'>Rewards Home</a>
		</form>
		<br>
		<form method='POST' action='{!!url("reward")!!}'>
			<input type='hidden' name='_token' value='{{Session::token()}}'>
			<div class="form-group">

				<input id="projects_projectID" name="projects_projectID" type="hidden" class="form-control" value="{!! $id !!}">
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

			<div class="form-group has-feedback {{ $errors->has('reward_items') ? ' has-error' : '' }}">
				<label class="control-label" for="reward_items">Reward Item</label>
				<textarea rows="10" id="reward_items" name="reward_items" class="form-control jqte-editor">{{old('reward_items')}}</textarea>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('reward_items'))
					<span class="help-block">
            <strong>{{ $errors->first('reward_items') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('shipping_to') ? ' has-error' : '' }}">
				<label class="control-label" for="reward_items">Ships To</label>
				<select id="shipping_to" name="shipping_to[]" class="form-control" multiple style="height: 150px">
					@foreach($countries  as $country)
						<option value="{{ $country->countryID }}"
						        @if ( is_array(old('shipping_to')) && in_array($country->countryID, old('shipping_to')) ) selected="selected" @endif>{{ ucfirst($country->country) }}</option>
					@endforeach
				</select>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('shipping_to'))
					<span class="help-block">
            <strong>{{ $errors->first('shipping_to') }}</strong>
          </span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('reward_cost') ? ' has-error' : '' }}">
				<label class="control-label" for="reward_cost">Reward Cost</label>
				<input type="number" id="reward_cost" name="reward_cost" class="form-control " value="{{old('reward_cost')}}">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('reward_cost'))
					<span class="help-block">
            <strong>{{ $errors->first('reward_cost') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('estimated_delivery') ? ' has-error' : '' }}">
				<label class="control-label" for="estimated_delivery">Estimated Delivery</label>
				<input id="datetimepicker_date1" name="estimated_delivery" type="text" class="form-control" value="{{old('estimated_delivery')}}" autocomplete="off">

				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('estimated_delivery'))
					<span class="help-block">
            <strong>{{ $errors->first('estimated_delivery') }}</strong>
					</span>
				@endif
			</div>


			<button class='btn btn-primary' type='submit'>Create</button>
		</form>
	</section>
@endsection