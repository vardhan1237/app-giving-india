<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use SoftDeletes;

  public $timestamps = false;
  protected $table = 'roles';
  protected $primaryKey = 'roleID';

}
