<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clients
 * @package App\Models
 * @version April 13, 2018, 12:44 pm UTC
 *
 * @property string name
 * @property string age
 * @property string foto
 */
class Clients extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'age',
        'foto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'age' => 'string',
        'foto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
