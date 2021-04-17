<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\measurements_unitsRepository;
use App\Models\MeasurementsUnits;
use App\Validators\MeasurementsUnitsValidator;

/**
 * Class MeasurementsUnitsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MeasurementsUnitsRepositoryEloquent extends BaseRepository implements MeasurementsUnitsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MeasurementsUnits::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
