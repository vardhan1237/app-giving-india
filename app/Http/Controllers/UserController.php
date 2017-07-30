<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\DB;
use URL;

/**
 * Class UserController.
 *
 * @author  The scaffold-interface created at 2017-07-11 06:22:51am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function index()
  {

    $role_list = Role::all();
    $users = DB::table('users')
      ->join('roles', 'users.roles_roleID', '=', 'roles.roleID')
      ->whereNull('users.deleted_at')
      ->select('roles.*', 'users.*')
      ->get();
    return view('user.index', compact('users', 'role_list'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function create()
  {
    $title = 'Create - user';

    return view('user.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param    \Illuminate\Http\Request $request
   * @return  \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $user = new User();


    $user->user_name = $request->user_name;


    $user->roles_roleID = $request->roles_roleID;


    $user->password = $request->password;


    $user->save();

    return redirect('user');
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
    $title = 'Show - user';

    if ($request->ajax()) {
      return URL::to('user/' . $id);
    }

    $user = User::findOrfail($id);
    return view('user.show', compact('title', 'user'));
  }

  /**
   * Show the form for editing the specified resource.
   * @param    \Illuminate\Http\Request $request
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function edit($id, Request $request)
  {
    $title = 'Edit - user';
    if ($request->ajax()) {
      return URL::to('user/' . $id . '/edit');
    }


    $user = User::findOrfail($id);
    return view('user.edit', compact('title', 'user'));
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
    $user = User::findOrfail($id);

    $user->user_name = $request->user_name;

    $user->roles_roleID = $request->roles_roleID;

    $user->password = $request->password;


    $user->save();

    return redirect('user');
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
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/user/' . $id . '/delete');

    if ($request->ajax()) {
      return $msg;
    }
  }

  public function BlockMsg($id, Request $request){
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to block this user?', '/user/' . $id . '/block');
    if ($request->ajax()) {
      return $msg;
    }
  }

  public function ActivateMsg($id, Request $request){
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to activate this user?', '/user/' . $id . '/activate');
    if ($request->ajax()) {
      return $msg;
    }
  }




  public function block($id)
  {
    $user = User::findOrfail($id);
    $user->is_blocked = 'yes';
    $user->save();
    return URL::to('user');
  }

  public function activate($id)
  {
    $user = User::findOrfail($id);
    $user->is_blocked = 'no';
    $user->save();
    return URL::to('user');
  }



  /**
   * Remove the specified resource from storage.
   *
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrfail($id);
    $user->delete();
    return URL::to('user');
  }
}
