<?php

namespace App\Http\Controllers;

use App\Repositories\MeasurementsUnitsRepository;
use App\Repositories\ProductClassTypeRepository;
use App\Repositories\ProductRepository;
use App\Traits\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use Config;

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
        $list = true;

        $form = false;
    }

    public function create()
    {
        $edit = $list = false;

        $form = true;

        $types = $this->productClassType->all();

        $units = $this->units->orderBy('name')->all();

        $route = 'products.form';

        $scripts[] = '../../js/product.js';

        return view('index', compact('route', 'edit', 'form', 'types',
            'list', 'units', 'scripts'));
    }


    public function edit($id)
    {
        $edit = $form = true;

        $list = false;

        $types = $this->productClassType->all();

        $units = $this->units->orderBy('name')->all();

        $route = 'products.form';

        $scripts[] = '../../js/product.js';

        $product = $this->repository->findByField('id', $id)->first();

        $product->stock_min = str_replace('.', ',', $product->stock_min);
        $product->stock_max = str_replace('.', ',', $product->stock_max);
        $product->quantity = str_replace('.', ',', $product->quantity);
        $product->price = str_replace('.', ',', $product->price);
        $product->icms = str_replace('.', ',', $product->icms);
        $product->ipi = str_replace('.', ',', $product->ipi);
        $product->pis = str_replace('.', ',', $product->pis);
        $product->shipping_value = str_replace('.', ',', $product->shipping_value);
        $product->shipping_tax = str_replace('.', ',', $product->shipping_tax);
        $product->commission_value = str_replace('.', ',', $product->commission_value);
        $product->commission_tax = str_replace('.', ',', $product->commission_tax);

        if($product)
            return view('index', compact('product', 'route', 'edit', 'form', 'types',
               'list', 'units', 'scripts'));

        abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if($data['internal_code'] == "")
        {
            $code = $this->random_string(6);

            if($this->repository->findByField('internal_code', $code)->first())
                $this->store($request);

            $data['internal_code'] = $code;

            $array_keys = array_keys($data);

            $i = 1;

            while ($i < count($array_keys))
            {
                $key = $array_keys[$i];

                /* Todas os campos decimais devem ser convertidas para o tipo
                   apropriado antes de serem persistidas no banco
                */
                if(DB::getSchemaBuilder()->getColumnType('products', $key) == "decimal")
                    if($data[$key] != "") {
                        $data[$key] = str_replace(',', '.', $data[$key]);
                        $data[$key] = floatval($data[$key]);
                    }

                $i++;
            }

        }

        try {
            $this->repository->create($data);

            $request->session()->flash('success.msg', 'O Produto foi cadastrado com sucesso');

            DB::commit();

        }catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('product.create');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $array_keys = array_keys($data);

        $i = 2;

        while ($i < count($array_keys))
        {
            $key = $array_keys[$i];

            /* Todas os campos decimais devem ser convertidas para o tipo
               apropriado antes de serem persistidas no banco
            */
            if(DB::getSchemaBuilder()->getColumnType('products', $key) == "decimal")
                if($data[$key] != "") {
                    $data[$key] = str_replace(',', '.', $data[$key]);
                    $data[$key] = floatval($data[$key]);
                }

            $i++;
        }

        try {
            $this->repository->update($data, $id);

            $request->session()->flash('success.msg', 'O Produto foi alterado com sucesso');

            DB::commit();

        }catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('product.create');
    }
}
