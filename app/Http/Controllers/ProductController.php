<?php

namespace App\Http\Controllers;

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

    public function __construct(ProductRepository $repository, ProductClassTypeRepository $productClassType)
    {
        $this->repository = $repository;
        $this->productClassType = $productClassType;
    }

    public function index()
    {

    }

    public function create()
    {
        $edit = $list = false;

        $form = true;

        $types = $this->productClassType->all();

        $route = 'products.form';

        return view('index', compact('route', 'edit', 'form', 'types', 'list'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function update()
    {

    }
}
