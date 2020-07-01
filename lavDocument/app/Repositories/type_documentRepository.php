<?php

namespace App\Repositories;

use App\Models\type_document;
use App\Repositories\BaseRepository;

/**
 * Class type_documentRepository
 * @package App\Repositories
 * @version July 1, 2020, 9:53 am UTC
*/

class type_documentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'obs'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return type_document::class;
    }
}
