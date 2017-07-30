<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revision extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $table = 'revisions';
  protected $primaryKey = 'id';
  

}
