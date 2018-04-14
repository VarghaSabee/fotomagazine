<?php

namespace App\Repositories;

use App\Models\Orders;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrdersRepository
 * @package App\Repositories
 * @version April 14, 2018, 7:33 am UTC
 *
 * @method Orders findWithoutFail($id, $columns = ['*'])
 * @method Orders find($id, $columns = ['*'])
 * @method Orders first($columns = ['*'])
*/
class OrdersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'u_id',
        'price',
        'services',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Orders::class;
    }
}
