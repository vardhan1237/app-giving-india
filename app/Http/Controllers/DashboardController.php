<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('is_admin', ['except' => []]);

  }
    public function index(){
      
      return view('dashboard');
    }
}
