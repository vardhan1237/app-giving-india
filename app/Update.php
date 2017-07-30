<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Project;
/**
 * Class Update.
 *
 * @author  The scaffold-interface created at 2017-07-06 05:59:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Update extends Model
{

  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $table = 'updates';
  protected $primaryKey = 'updateID';

  public $fillable = [
    'projects_projectID',
    'title',
    'condent',
    'date'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'updateID' => 'integer',
    'projects_projectID' => 'integer',
    'title' => 'string',
    'condent' => 'string',
    'date' => 'date'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [

  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
  public function project()
  {
    return $this->belongsTo(Project::class);
  }

}
