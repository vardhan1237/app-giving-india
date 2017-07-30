@extends('layouts.app')
@section('breadcrumb')
	<h1>
		Edit Reward
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
@endsection
@section('content')

	<section class="content">

		<form method='get' action='#'>
			<a href="{!!url("reward/".$reward->projects_projectID."/get-rewards") !!}" class='btn btn-primary'>Show All Rewards of {!! ucfirst($project->project_name) !!}</a>
			<a href="{!!url("reward/projects/reward")!!}" class='btn btn-primary pull-right'>Rewards Home</a>
		</form>
		<br>
		<hr>
		<form method='POST' action='{!! url("reward")!!}/{!!$reward->
        rewardID!!}/update'>
			<input type='hidden' name='_token' value='{{Session::token()}}'>
			<div class="form-group">
				<input id="projects_projectID" name="projects_projectID" type="hidden" class="form-control" value="{!!$reward->
            projects_projectID!!}">
			</div>


			<div class="form-group has-feedback {{ $errors->has('description') ? ' has-error' : '' }}">
				<label class="control-label" for="description">Description</label>
				<textarea rows="10" id="description" name="description" class="form-control jqte-editor">{{old('description',$reward->description)}}</textarea>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('description'))
					<span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('reward_items') ? ' has-error' : '' }}">
				<label class="control-label" for="reward_items">Reward Item</label>
				<textarea rows="10" id="reward_items" name="reward_items" class="form-control jqte-editor">{{old('reward_items',$reward->reward_items)}}</textarea>
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
						        @if (  in_array($country->countryID, old('shipping_to',explode(',',$reward->shipping_to))) ) selected="selected" @endif>{{ ucfirst($country->country) }}</option>
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
				<input type="number" id="reward_cost" name="reward_cost" class="form-control " value="{{old('reward_cost',$reward->reward_cost)}}">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('reward_cost'))
					<span class="help-block">
            <strong>{{ $errors->first('reward_cost') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback {{ $errors->has('estimated_delivery') ? ' has-error' : '' }}">
				<label class="control-label" for="estimated_delivery">Estimated Delivery</label>
				<input id="datetimepicker_date1" name="estimated_delivery" type="text" class="form-control" value="{{old('estimated_delivery',date('d/m/Y', strtotime($reward->estimated_delivery)))}}" autocomplete="off">
				@if(!old('estimated_delivery'))
					<input type="hidden" id="old_date1" value="{!! date('d/m/Y', strtotime($reward->estimated_delivery)) !!}">
				@endif
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				@if ($errors->has('estimated_delivery'))
					<span class="help-block">
            <strong>{{ $errors->first('estimated_delivery') }}</strong>
					</span>
				@endif
			</div>


			<div class="form-group has-feedback">
				<label for="category">Status</label><br>
				<input type="radio" name="rwd_status" value="active" <?php if (old('rwd_status') == 'active' || $reward->deleted_at == '') {
					echo "checked";
				} ?> > Active<br>
				<input type="radio" name="rwd_status" value="inactive" <?php if (old('rwd_status') == 'inactive' || $reward->deleted_at != '') {
					echo "checked";
				} ?> > Inactive<br>

			</div>

			<button class='btn btn-primary' type='submit'>Update</button>
		</form>
	</section>
@endsection