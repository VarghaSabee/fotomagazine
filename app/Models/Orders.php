<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Orders
 * @package App\Models
 * @version April 14, 2018, 7:33 am UTC
 *
 * @property integer u_id
 * @property integer price
 * @property string services
 * @property boolean status
 */
class Orders extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'u_id',
        'price',
        'services',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'u_id' => 'integer',
        'price' => 'integer',
        'services' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
