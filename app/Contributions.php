<?php

namespace App;


use App\Project;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contributions
 * @package App\Models
 * @version July 13, 2017, 8:15 am UTC
 */
class Contributions extends Model
{
  use SoftDeletes;

  public $table = 'contributions';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';


  protected $dates = ['deleted_at'];


  public $fillable = [
    'projects_projectID',
    'users_userID',
    'amount',
    'date',
    'payment_referenceID'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'contributionID' => 'integer',
    'projects_projectID' => 'integer',
    'users_userID' => 'integer',
    'amount' => 'float',
    'payment_referenceID' => 'string'
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

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
  public function user()
  {
    return $this->belongsTo(User::class,"users_userID");
  }
}
