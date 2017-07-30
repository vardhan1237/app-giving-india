<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reward.
 *
 * @author  The scaffold-interface created at 2017-06-29 11:04:40am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Reward extends Model
{

  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $table = 'rewards';
  protected $primaryKey = 'rewardID';


  public $fillable = [
    'projects_projectID',
    'description',
    'reward_items',
    'shipping_to',
    'reward_cost',
    'estimated_delivery'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'rewardID' => 'integer',
    'projects_projectID' => 'integer',
    'description' => 'string',
    'reward_items' => 'string',
    'shipping_to' => 'string',
    'reward_cost' => 'float',
    'estimated_delivery' => 'date'
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
