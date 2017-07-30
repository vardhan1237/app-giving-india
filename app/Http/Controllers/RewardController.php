<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reward;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use URL;

/**
 * Class RewardController.
 *
 * @author  The scaffold-interface created at 2017-06-29 11:04:40am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RewardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function get_rewards($pid, Request $request)
  {

    $rewards = DB::table('rewards')
      ->join('projects', 'projects.projectID', '=', 'rewards.projects_projectID')
      ->where('projects.projectID', '=', $pid)
      ->whereNull('projects.deleted_at')
      ->select('projects.*', 'rewards.*')
      ->get();
    return view('reward.index', compact('rewards', 'title', 'pid'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function create($id)
  {
    $countries = array();
    if ($id != '' && is_numeric($id)) {
      $countries = DB::table('countries')->get();
      $project = DB::table('projects')->where('projectID', '=', $id)->get();
      $project = json_decode($project);
      $project = $project[0];
      return view('reward.create', compact('id', 'countries', 'project'));
    } else {
      return redirect('reward/projects/reward');
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param    \Illuminate\Http\Request $request
   * @return  \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $status = false;
    $input = $request->except('_token');
    $messages = [
      'description.required' => 'The reward  description is required',
      'reward_items.required' => 'The reward item is required',
      'shipping_to.required' => 'The country to ship is required',
      'reward_cost.required' => 'The reward cost is required',
      'estimated_delivery.required' => 'The estimated delivery date is required',


    ];
    $validation_rule = Validator::make($request->all(), [
      'description' => 'required',
      'reward_items' => 'required',
      'shipping_to' => 'required',
      'reward_cost' => 'required',
      'estimated_delivery' => 'required',
    ],
      $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {
      $reward = new Reward();


      $reward->projects_projectID = $request->projects_projectID;


      $reward->description = $request->description;


      $reward->reward_items = $request->reward_items;

      $a = (string)implode(",", $request->shipping_to);
      $reward->shipping_to = $a;


      $reward->reward_cost = $request->reward_cost;

      $_date = DateTime::createFromFormat('d/m/Y', $request->estimated_delivery);
      $reward->estimated_delivery = $_date->format('Y-m-d');

      $status = $reward->save();
    }
    if ($status) {
      Session::flash('status', 'The new Reward created Successfully');
    } else {
      Session::flash('status', 'OOPS! Something went wrong. Please try again');
    }
    return redirect('reward/' . $request->projects_projectID . '/get-rewards');
  }

  /**
   * Display the specified resource.
   *
   * @param    \Illuminate\Http\Request $request
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function show($id, Request $request)
  {


    if ($request->ajax()) {
      return URL::to('reward/' . $id);
    }

    return view('reward.show', compact('reward'));
  }

  /**
   * Show the form for editing the specified resource.
   * @param    \Illuminate\Http\Request $request
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function edit($id, Request $request)
  {

    if ($request->ajax()) {
      return URL::to('reward/' . $id . '/edit');
    }
    $countries = DB::table('countries')->get();

    $reward = Reward::withTrashed()->findOrfail($id);
    $reward = json_decode($reward);
    
    $project = DB::table('projects')->where('projectID', '=', $reward->projects_projectID)->get();
    $project = json_decode($project);
    $project = $project[0];
    return view('reward.edit', compact('project', 'reward', 'countries'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param    \Illuminate\Http\Request $request
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function update($id, Request $request)
  {
    $status = false;
    $input = $request->except('_token');
    $messages = [
      'description.required' => 'The reward  description is required',
      'reward_items.required' => 'This reward item is required',
      'shipping_to.required' => 'The country to ship is required',
      'reward_cost.required' => 'The reward cost is required',
      'estimated_delivery.required' => 'The estimated delivery date is required',


    ];
    $validation_rule = Validator::make($request->all(), [
      'description' => 'required',
      'reward_items' => 'required',
      'shipping_to' => 'required',
      'reward_cost' => 'required',
      'estimated_delivery' => 'required',
    ],
      $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {
      $reward = Reward::withTrashed()->findOrfail($id);

      $reward->projects_projectID = $request->projects_projectID;

      $reward->description = $request->description;

      $reward->reward_items = $request->reward_items;

      $a = (string)implode(",", $request->shipping_to);
      $reward->shipping_to = $a;


      $reward->reward_cost = $request->reward_cost;

      $_date = DateTime::createFromFormat('d/m/Y', $request->estimated_delivery);
      $reward->estimated_delivery = $_date->format('Y-m-d');


      $rwd_status = $request->rwd_status;
      if ($rwd_status == 'active') {
        $reward->deleted_at = NULL;
      } else {
        $reward->deleted_at = Carbon::now();
      }

      $status = $reward->save();
    }
    if ($status) {
      Session::flash('status', 'The Reward details updated Successfully');
    } else {
      Session::flash('status', 'OOPS! Something went wrong. Please try again');
    }

    return redirect('reward/' . $request->projects_projectID . '/get-rewards');
  }

  /**
   * Delete confirmation message by Ajaxis.
   *
   * @link      https://github.com/amranidev/ajaxis
   * @param    \Illuminate\Http\Request $request
   * @return  String
   */
  public function DeleteMsg($id, Request $request)
  {
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/reward/' . $id . '/delete');

    if ($request->ajax()) {
      return $msg;
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $reward = Reward::findOrfail($id);
    $reward->delete();
    return URL::to('reward');
  }
}
