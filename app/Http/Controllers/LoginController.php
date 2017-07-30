<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('is_admin', ['except' => ['do_login', 'logout'

    ]]);
    /*$temp = Role::all();
    foreach ($temp as $role) {
      $this->all_roles[$role->roleID] = $role->role;
    }
    unset($role);
    Session::put('allRoles', $this->all_roles);*/

    //$this->constant = Config::get('constants.DEFAULT_DATA');
  }


  public function do_login(Request $request)
  {
    $user_name = $password = '';

    $v = Validator::make($request->all(), [
      'user_name' => 'required',
      'password' => 'required',
    ]);


    if ($v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    } else {
      $valid_user = $user = false;
      $user_name = $request->input('user_name');
      $password = $request->input('password');
      $user = User::where('email', '=', $user_name)->first();

      if ($user) {

        $valid_user = Hash::check($password, $user->password);
      }

      if ($valid_user) {
        Session::put('user_name', ucfirst($user->user_name));
        Session::put('role_id', $user->roles_roleID);
        Session::put('user_id', $user->userID);
        return redirect('home');
      } else {
        Session::flash('status', 'Invalid credentials');
        return redirect()->back()->withInput();
      }
    }
  }

  public function logout() {

    Session::forget('user_name');
    Session::forget('user_id');
    return redirect('/');
  }
}
