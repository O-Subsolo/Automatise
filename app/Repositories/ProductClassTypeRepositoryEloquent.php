<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Product_Class_TypeRepository;
use App\Models\ProductClassType;
use App\Validators\ProductClassTypeValidator;

/**
 * Class ProductClassTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductClassTypeRepositoryEloquent extends BaseRepository implements ProductClassTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductClassType::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
