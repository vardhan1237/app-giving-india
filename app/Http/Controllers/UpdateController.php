<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Update;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use URL;

/**
 * Class UpdateController.
 *
 * @author  The scaffold-interface created at 2017-07-06 05:59:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class UpdateController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function get_updates($pid)
  {

    $updates = DB::table('updates')
      ->join('projects', 'projects.projectID', '=', 'updates.projects_projectID')
      ->where('projects.projectID', '=', $pid)
      ->whereNull('projects.deleted_at')
      ->select('projects.*', 'updates.*')
      ->get();

    return view('update.index', compact('updates', 'pid'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function create($id)
  {


    if ($id != '' && is_numeric($id)) {

      $project = DB::table('projects')->where('projectID', '=', $id)->get();
      $project = json_decode($project);
      $project = $project[0];
      return view('update.create', compact('id', 'project'));
    } else {
      return redirect('update/projects/update');
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
      'title.required' => 'The tile of the update is required',
      'condent.required' => 'The update\'s details is required',
      'date.required' => 'The date of the update is required'


    ];
    $validation_rule = Validator::make($request->all(), [
      'title' => 'required',
      'condent' => 'required',
      'date' => 'required'
    ],
      $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {
      $update = new Update();


      $update->projects_projectID = $request->projects_projectID;


      $update->title = $request->title;


      $update->condent = $request->condent;

      $_date = DateTime::createFromFormat('d/m/Y', $request->date);
      $update->date = $_date->format('Y-m-d');

      $status = $update->save();
    }
    if ($status) {
      Session::flash('status', 'The New Project Updated Added Successfully');
    } else {
      Session::flash('status', 'OOPS! Something went wrong. Please try again');
    }
    return redirect('update/' . $request->projects_projectID . '/get-updates');


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
    $title = 'Show - update';

    if ($request->ajax()) {
      return URL::to('update/' . $id);
    }

    $update = Update::findOrfail($id);
    return view('update.show', compact('title', 'update'));
  }

  /**
   * Show the form for editing the specified resource.
   * @param    \Illuminate\Http\Request $request
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function edit($id, Request $request)
  {
    $title = 'Edit - update';
    if ($request->ajax()) {
      return URL::to('update/' . $id . '/edit');
    }

    $update = Update::withTrashed()->findOrfail($id);
    $project = DB::table('projects')->where('projectID', '=', $update->projects_projectID)->get();
    $project = json_decode($project);
    $project = $project[0];
    return view('update.edit', compact('project', 'update'));
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
      'title.required' => 'The tile of the update is required',
      'condent.required' => 'The update\'s details is required',
      'date.required' => 'The date of the update is required'


    ];
    $validation_rule = Validator::make($request->all(), [
      'title' => 'required',
      'condent' => 'required',
      'date' => 'required'
    ],
      $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {
      $update = Update::withTrashed()->findOrfail($id);

      $update->projects_projectID = $request->projects_projectID;

      $update->title = $request->title;

      $update->condent = $request->condent;

      $_date = DateTime::createFromFormat('d/m/Y', $request->date);
      $update->date = $_date->format('Y-m-d');


      $status = $update->save();
    }
    if ($status) {
      Session::flash('status', 'The New Project Updated Added Successfully');
    } else {
      Session::flash('status', 'OOPS! Something went wrong. Please try again');
    }
    return redirect('update/' . $request->projects_projectID . '/get-updates');

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
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/update/' . $id . '/delete');

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
    $update = Update::findOrfail($id);
    $update->delete();
    return URL::to('update');
  }
}
