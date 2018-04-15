<?php

namespace App\Repositories;

use App\Models\Users;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version April 15, 2018, 10:32 am UTC
 *
 * @method Users findWithoutFail($id, $columns = ['*'])
 * @method Users find($id, $columns = ['*'])
 * @method Users first($columns = ['*'])
*/
class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token',
        'telephone',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }
}
