@extends('layouts.app')
@section('breadcrumb')
    <h1>
        Edit User
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
@endsection
@section('content')

<section class="content">

    <form method = 'get' action = '{!!url("user")!!}'>
        <button class = 'btn btn-danger'>user Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("user")!!}/{!!$user->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="user_name">user_name</label>
            <input id="user_name" name = "user_name" type="text" class="form-control" value="{!!$user->
            user_name!!}"> 
        </div>
        <div class="form-group">
            <label for="roles_roleID">roles_roleID</label>
            <input id="roles_roleID" name = "roles_roleID" type="text" class="form-control" value="{!!$user->
            roles_roleID!!}"> 
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input id="password" name = "password" type="text" class="form-control" value="{!!$user->
            password!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection