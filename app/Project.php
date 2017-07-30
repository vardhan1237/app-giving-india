<?php

namespace App;


use App\Contributions;
use App\Reward;
use App\Update;
use App\User;
use App\Faqs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project.
 *
 * @author  The scaffold-interface created at 2017-06-26 10:22:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Project extends Model
{

  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $table = 'projects';
  protected $primaryKey = 'projectID';


  public $fillable = [
    'users_userID',
    'project_name',
    'caption',
    'start_date',
    'end_date',
    'target_amount',
    'categoryID',
    'subcategoryID',
    'primary_image',
    'short_description',
    'description',
    'risks_challenges',
    'status'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'projectID' => 'integer',
    'users_userID' => 'integer',
    'project_name' => 'string',
    'caption' => 'string',
    'target_amount' => 'float',
    'categoryID' => 'string',
    'subcategoryID' => 'string',
    'primary_image' => 'string',
    'short_description' => 'string',
    'description' => 'string',
    'risks_challenges' => 'string',
    'status' => 'string'
  ];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
  public function user()
  {
    return $this->belongsTo(User::class,"users_userID");
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   **/
  public function contributions()
  {
    return $this->hasMany(Contributions::class,"projects_projectID");
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   **/
  public function faqs()
  {
    return $this->hasMany(Faqs::class,"projects_projectID");
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   **/
  /*public function galleries()
  {
    return $this->hasMany(\App\Models\Gallery::class);
  }*/

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   **/
  public function rewards()
  {
    return $this->hasMany(Reward::class,"projects_projectID");
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   **/
  public function updates()
  {
    return $this->hasMany(Update::class,"projects_projectID");
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   **/
  /*public function videos()
  {
    return $this->hasMany(\App\Models\Video::class);
  }*/

}
