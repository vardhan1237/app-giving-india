<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use URL;

/**
 * Class CategoryController.
 *
 * @author  The scaffold-interface created at 2017-06-22 12:25:54pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CategoryController extends Controller
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
    Session::put("menuindex", 1);

    $categories = DB::table('categories')
      ->select('categories.*')
      ->get();

    return view('category.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return  \Illuminate\Http\Response
   */
  public function create()
  {
    Session::put("menuindex", 1);
    $categories = Category::all();
    return view('category.create',compact('categories'));
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
      'category.required' => 'The category name is required',
      'category.unique' => 'This category is already exists',

    ];
    $validation_rule = Validator::make($request->all(), [
      'category' => 'required|unique:categories,category'],
      $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {
      $category = new Category();
      if($request->parentID!=''){
        $category->parentID=$request->parentID;
      }
      $category->category = $request->category;
      $status = $category->save();
      if ($status) {
        Session::flash('status', 'The Category details updated Successfully');
      } else {
        Session::flash('status', 'OOPS! Something went wrong. Please try again');
      }
      return redirect('category');
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
      return URL::to('category/' . $id);
    }

    $category = Category::findOrfail($id);
    return view('category.show', compact('category'));
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
      return URL::to('category/' . $id . '/edit');
    }

    $categories = Category::all();
    $category = Category::withTrashed()->findOrfail($id);
    return view('category.edit', compact('category','categories'));
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
      'category.required' => 'The category name is required',
      'category.unique' => 'This category is already exists',
    ];
    $rules = [];
    if ((isset($input['old_val']) && $input['old_val'] != $input['category'])) {

      $rules['category'] = 'required|unique:categories,category';
    }
    $validation_rule = Validator::make($request->all(), $rules, $messages);

    if ($validation_rule->fails()) {
      return redirect()->back()->withInput()->withErrors($validation_rule->errors());
    } else {
      $category = Category::withTrashed()->findOrfail($id);

      $category->category = $request->category;
      $category->parentID=$request->parentID;
      $cate_status = $request->cate_status;
      if ($cate_status == 'active') {
        $category->deleted_at = NULL;
      } else {

        $category->deleted_at = Carbon::now();
      }

      $status = $category->save();
      if ($status) {
        Session::flash('status', 'The Category details updated Successfully');
      } else {
        Session::flash('status', 'OOPS! Something went wrong. Please try again');
      }
    }

    return redirect('category');
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
    $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/category/' . $id . '/delete');

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
    $category = Category::withTrashed()->findOrfail($id);
    $category->delete();
    return URL::to('category');
  }

  function get_subcategories(Request $request) {

    $input = $request->except('_token');

    $categoryID = $input['categoryID'];




    $categoryIDs = explode(",", $categoryID);
      $subcategory_data = DB::table('categories')
        ->whereIn('categories.parentID', $categoryIDs)
        ->whereNull('categories.deleted_at')
        ->select('categories.*')
        ->get();
    //$subcategory_data = json_decode($subcategory_data);
      return $subcategory_data;
    }



}
