<?php

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use App\Revision;
use App\RevisionHistory;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class RevisionController extends Controller
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
      ->join('revisions', 'revisions.projects_projectID', '=', 'projects.projectID')
      ->whereNull('users.deleted_at')
      ->whereNull('projects.deleted_at')
      ->where('projects.status', '!=', 'deleted')
      ->select('projects.*', 'users.user_name', "revisions.*")
      ->get();
    $projects = json_decode($projects);
    $category_list = json_decode($category_list);
    return view('revision.index', compact('projects', 'category_list'));
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
      return URL::to('revision/' . $id);
    }
    $project_exist = Project::with("user", "contributions", "faqs", "rewards", "updates", "contributions.user")
      ->where('projects.projectID', '=', $id)
      ->get()->toArray();
    $project_exist = $project_exist[0];

    $project_revised = Revision::where("projects_projectID", $id)->get()->toArray();
    $project_revised = $project_revised[0];

    return view('revision.show', compact('project_revised', 'project_exist'));
  }

  public function approveRevision($pid, Request $request)
  {
    $project_revised = Revision::where("projects_projectID", $pid)->get()->toArray();
    if (count($project_revised) > 0) {
      $project_revised = $project_revised[0];      
      return view('revision.approve-revision', compact('project_revised'));
    }

  }

  public function confirmApproval(Request $request)
  {
    $status = false;
    $input = $request->except('_token');
    $messages = [
      'revision_note.required' => 'The Revision Note is required'

    ];
    $validation_rule = Validator::make($request->all(), [
      'revision_note' => 'required'
    ],
      $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {

      $res_his = new RevisionHistory();


      $res_his->projects_projectID = $request->pid;


      $res_his->revision_note = $request->revision_note;


      $date = DateTime::createFromFormat('d/m/Y', date('d/m/Y'));
      $res_his->revision_on = $date->format('Y-m-d');

      $status = $res_his->save();

      if ($status) {

        Session::flash('status', 'The Project updated Successfully');
      } else {
        Session::flash('status', 'OOPS! Something went wrong. Please try again');
      }
      return redirect('revision');
    }
  }


}
