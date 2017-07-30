<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Faqs
 * @package App\Models
 * @version July 13, 2017, 8:17 am UTC
 */
class Faqs extends Model
{
    use SoftDeletes;

    public $table = 'faqs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'projects_projectID',
        'question',
        'answer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'faqID' => 'integer',
        'projects_projectID' => 'integer',
        'question' => 'string',
        'answer' => 'string'
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
