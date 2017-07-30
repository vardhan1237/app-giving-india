<?php

namespace App\Http\Controllers;

use App\Category;

use App\User;
use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;


/**
 * Class ProjectController.
 *
 * @author  The scaffold-interface created at 2017-06-26 10:22:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ProjectController extends Controller
{
  public function __construct()
  {
    $this->middleware('is_admin', ['except' => []]);

  }

  /**
   * Display a listing of the resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function index()
  {
    $category_list = Category::all();

    $projects = DB::table('projects')
      ->join('users', 'users.userID', '=', 'projects.users_userID')
      ->whereNull('users.deleted_at')
      ->whereNull('projects.deleted_at')
      ->where('projects.status', '!=', 'deleted')
      ->select('projects.*', 'users.user_name')
      ->get();
    $projects = json_decode($projects);
    $category_list = json_decode($category_list);

    //echo '<pre>';print_r(json_decode($category_list)); exit;
    return view('project.index', compact('projects', 'category_list'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function create()
  {

    $user_list = User::where('roles_roleID', 3)->get();
    $categories = Category::all();
    return view('project.create', compact('user_list', 'categories'));

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
      'users_userID.required' => 'The Owner name is required',
      'project_name.required' => 'This project name is required',
      'caption.required' => 'The caption for the project is required',
      'start_date.required' => 'The start date is required',
      'end_date.required' => 'The end date is required',
      'target_amount.required' => 'The target amount is required',
      'categoryID.required' => 'The category is required',
      'primary_image.required' => 'The primary image is required',
      'short_description.required' => 'The short description is required',
      'risks_challenges.required' => 'The risks & challenges is required',

    ];
    $validation_rule = Validator::make($request->all(), [
      'users_userID' => 'required',
      'project_name' => 'required',
      'caption' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'target_amount' => 'required',
      'categoryID' => 'required',
      'primary_image' => 'required',
      'short_description' => 'required',
      'description' => 'required',
      'risks_challenges' => 'required',
    ],
      $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {

      $project = new Project();


      $project->users_userID = $request->users_userID;


      $project->project_name = $request->project_name;


      $project->caption = $request->caption;


      $date = DateTime::createFromFormat('d/m/Y', $request->start_date);
      $project->start_date = $date->format('Y-m-d');


      $_date = DateTime::createFromFormat('d/m/Y', $request->end_date);
      $project->end_date = $_date->format('Y-m-d');


      $project->target_amount = $request->target_amount;


      $a = (string)implode(",", $request->categoryID);
      $project->categoryID = $a;

      if ($request->subcategoryID) {
        $b = (string)implode(",", $request->subcategoryID);
        $project->subcategoryID = $b;
      }
      $project->primary_image = $request->primary_image;


      $project->short_description = $request->short_description;


      $project->description = $request->description;


      $project->risks_challenges = $request->risks_challenges;


      $status = $project->save();

      if ($status) {

        if ($request->hasFile('primary_image')) {
          $file = Input::file('primary_image');
          $filename = $file->getClientOriginalName();
          $destinationPath = public_path() . "/project/images/" . $project->projectID . '/';
          $file->move($destinationPath, $filename);
          $_project = Project::findOrfail($project->projectID);
          $_project->primary_image = "/project/images/" . $project->projectID . '/' . $filename;
          $_project->save();
        }


        Session::flash('status', 'The Project created Successfully');
      } else {
        Session::flash('status', 'OOPS! Something went wrong. Please try again');
      }
      return redirect('project');
    }
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
      return URL::to('project/' . $id);
    }

    $project = Project::with("user", "contributions", "faqs", "rewards", "updates", "contributions.user")
      ->where('projects.projectID', '=', $id)
      ->get()->toArray();
    $project = $project[0];

    //echo "<pre>"; print_r(($project)); exit;
    return view('project.show', compact('project'));
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
      return URL::to('project/' . $id . '/edit');
    }

    $user_list = User::where('roles_roleID', 3)->get();
    $categories = Category::all();
    $project = Project::withTrashed()->findOrfail($id);
    return view('project.edit', compact('categories', 'project', 'user_list'));
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
      'users_userID.required' => 'The Owner name is required',
      'project_name.required' => 'This project name is already exists',
      'caption.required' => 'The caption for the project is required',
      'start_date.required' => 'The start date is required',
      'end_date.required' => 'The end date is required',
      'target_amount.required' => 'The target amount is required',
      'categoryID.required' => 'The category is required',
      'new_image.required' => 'The primary image is required',
      'short_description.required' => 'The short description is required',
      'risks_challenges.required' => 'The risks & challenges is required',

    ];

    $rules = [
      'users_userID' => 'required',
      'project_name' => 'required',
      'caption' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'target_amount' => 'required',
      'categoryID' => 'required',
      'short_description' => 'required',
      'description' => 'required',
      'risks_challenges' => 'required',

    ];
    if (!(isset($input['is_new_image']) && $input['is_new_image'] == 'no')) {

      $rules['new_image'] = 'required';
    }

    $validation_rule = Validator::make($request->all(), $rules, $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {
      $project = Project::withTrashed()->findOrfail($id);

      $project->users_userID = $request->users_userID;

      $project->project_name = $request->project_name;

      $project->caption = $request->caption;


      $date = DateTime::createFromFormat('d/m/Y', $request->start_date);
      $project->start_date = $date->format('Y-m-d');


      $_date = DateTime::createFromFormat('d/m/Y', $request->end_date);
      $project->end_date = $_date->format('Y-m-d');


      $project->target_amount = $request->target_amount;


      $a = (string)implode(",", $request->categoryID);
      $project->categoryID = $a;


      if ($request->subcategoryID) {
        $b = (string)implode(",", $request->subcategoryID);
        $project->subcategoryID = $b;
      }


      $project->target_amount = $request->target_amount;


      $project->primary_image = $request->primary_image;

      $project->short_description = $request->short_description;

      $project->description = $request->description;

      $project->risks_challenges = $request->risks_challenges;


      $pro_status = $request->pro_status;
      if ($pro_status == 'active') {
        $project->deleted_at = NULL;
      } else {
        $project->deleted_at = Carbon::now();
      }

      $status = $project->save();
      if ($status) {
        /**
         * Handle the deleteing the old image
         **/
        if ($request->hasFile('new_image')) {
          $file = Input::file('new_image');
          $filename = $file->getClientOriginalName();
          $destinationPath = public_path() . "/project/images/" . $id . '/';
          $file->move($destinationPath, $filename);
          $_project = Project::withTrashed()->findOrfail($id);
          /*$temp=json_decode($_project);
          unlink($temp->primary_image);*/
          $_project->primary_image = "/project/images/" . $id . '/' . $filename;
          $_project->save();
        }


        Session::flash('status', 'The Project details updated Successfully');
      } else {
        Session::flash('status', 'OOPS! Something went wrong. Please try again');
      }
      return redirect('project');
    }


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
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/project/' . $id . '/delete');

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
    $project = Project::findOrfail($id);
    $project->status = "deleted";
    $project->save();
    $project->delete();
    return URL::to('project');
  }


  public function BlockMsg($id, Request $request)
  {
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to block this project?', '/project/' . $id . '/block');
    if ($request->ajax()) {
      return $msg;
    }
  }

  public function ActivateMsg($id, Request $request)
  {
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to activate this project?', '/project/' . $id . '/activate');
    if ($request->ajax()) {
      return $msg;
    }
  }


  public function block($id)
  {
    $project = Project::findOrfail($id);
    $project->status = 'inactive';
    $project->save();
    return URL::to('project');
  }

  public function activate($id)
  {
    $project = Project::findOrfail($id);
    $project->status = 'active';
    $project->save();
    return URL::to('project');
  }

}
