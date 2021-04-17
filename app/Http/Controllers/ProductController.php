<?php

namespace App\Http\Controllers;

use App\Repositories\MeasurementsUnitsRepository;
use App\Repositories\ProductClassTypeRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $repository;
    /**
     * @var ProductClassTypeRepository
     */
    private $productClassType;
    /**
     * @var MeasurementsUnitsRepository
     */
    private $units;

    public function __construct(ProductRepository $repository, ProductClassTypeRepository $productClassType, MeasurementsUnitsRepository $units)
    {
        $this->repository = $repository;
        $this->productClassType = $productClassType;
        $this->units = $units;
    }

    public function index()
    {

    }

    public function create()
    {
        $edit = $list = false;

        $form = true;

        $types = $this->productClassType->all();

        $units = $this->units->orderBy('name')->all();

        $route = 'products.form';

        return view('index', compact('route', 'edit', 'form', 'types', 'list', 'units'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function update()
    {

    }
}
