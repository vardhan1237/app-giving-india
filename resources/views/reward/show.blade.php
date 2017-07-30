@extends('layouts.app')
@section('breadcrumb')
    <h1>
        Show Reward
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
@endsection
@section('content')

<section class="content">

    <br>
    <form method = 'get' action = '{!!url("reward")!!}'>
        <button class = 'btn btn-primary'>reward Index</button>
    </form>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>projects_projectID : </i></b>
                </td>
                <td>{!!$reward->projects_projectID!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>description : </i></b>
                </td>
                <td>{!!$reward->description!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>reward_items : </i></b>
                </td>
                <td>{!!$reward->reward_items!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>shipping_to : </i></b>
                </td>
                <td>{!!$reward->shipping_to!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>reward_cost : </i></b>
                </td>
                <td>{!!$reward->reward_cost!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>estimated_delivery : </i></b>
                </td>
                <td>{!!$reward->estimated_delivery!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection