<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RevisionHistory extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $table = 'revision_history';
  protected $primaryKey = 'id';
}
