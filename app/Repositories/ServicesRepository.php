<?php

namespace App\Repositories;

use App\Models\Services;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServicesRepository
 * @package App\Repositories
 * @version April 14, 2018, 9:27 am UTC
 *
 * @method Services findWithoutFail($id, $columns = ['*'])
 * @method Services find($id, $columns = ['*'])
 * @method Services first($columns = ['*'])
*/
class ServicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'format',
        'price',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Services::class;
    }
}
