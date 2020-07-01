<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class type_document
 * @package App\Models
 * @version July 1, 2020, 9:53 am UTC
 *
 * @property string $name
 * @property string $obs
 */
class type_document extends Model
{

    public $table = 'type_documents';
    



    public $fillable = [
        'name',
        'obs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'obs' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255|unique:posts'
    ];

    
}
