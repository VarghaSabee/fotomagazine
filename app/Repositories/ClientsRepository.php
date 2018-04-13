<?php

namespace App\Repositories;

use App\Models\Clients;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version April 13, 2018, 12:44 pm UTC
 *
 * @method Clients findWithoutFail($id, $columns = ['*'])
 * @method Clients find($id, $columns = ['*'])
 * @method Clients first($columns = ['*'])
*/
class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'age',
        'foto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Clients::class;
    }
}
