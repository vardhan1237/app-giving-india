<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
  public function __construct()
  {
    $this->middleware('is_admin', ['except' => []]);

  }

  public function get_projects($view, Request $request)
  {

    $projects = DB::table('projects')
      ->select('projects.*')
      ->get();
    return view($view . '.projects', compact('projects'));

  }
}
