<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;
    /**
     * @var ProductRepository
     */
    private $product;

    public function __construct(CategoryRepository $repository, ProductRepository $product)
    {
        $this->repository = $repository;
        $this->product = $product;
    }

    public function category_exists($name, $class)
    {
        $name = strtolower($name);

        $cat = $this->repository->findWhere([
            'name' => $name,
            'class' => $class,
            'status' => 1
        ])->first();


        if($cat)
            return json_encode(['status' => true]);

        return json_encode(['status' => false]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $data['name'] = strtolower($data['name']);

            $id = $this->repository->create($data)->id;

            DB::commit();

            return json_encode(['status' => true, 'id' => $id]);
        }catch (\Exception $e)
        {
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $cat = $this->repository->findByField('id', $id)->first();

        if($cat)
        {

        }
    }
}
