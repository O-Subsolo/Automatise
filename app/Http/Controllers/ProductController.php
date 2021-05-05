<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\MeasurementsUnitsRepository;
use App\Repositories\ProductClassTypeRepository;
use App\Repositories\ProductRepository;
use App\Traits\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    /**
     * @var CategoryRepository
     */
    private $categories;

    public function __construct(ProductRepository $repository, ProductClassTypeRepository $productClassType, MeasurementsUnitsRepository $units,
                                CategoryRepository $categories)
    {
        $this->repository = $repository;
        $this->productClassType = $productClassType;
        $this->units = $units;
        $this->categories = $categories;
    }

    public function index()
    {
        $list = true;

        $form = false;

        $route = 'products.index';

        $scripts[] = '../../js/product.js';

        $categories = $this->categories->findByField('class', 'product');

        foreach ($categories as $category) {
            $category->name = ucfirst($category->name);
        }

        $products = $this->repository->findByField('status', 1);

        foreach ($products as $product) {
            $product->photo = str_replace('public', 'storage', $product->photo);

            $product->quantity = str_replace('.', ',', $product->quantity);

            if($product->unit == 4)
                $product->quantity = (integer) $product->quantity;

            $product->price = str_replace('.', ',', $product->price);

            $product->category_name = $product->category_id == "" ? "Sem Categoria" :
                ucfirst($this->categories->findByField('id', $product->category_id)->first()->name);
        }

        return view('index', compact('list', 'form', 'route', 'scripts', 'categories', 'products'));
    }

    public function create()
    {
        $edit = $list = false;

        $form = true;

        $types = $this->productClassType->all();

        $units = $this->units->orderBy('name')->all();

        $route = 'products.form';

        $scripts[] = '../../js/product.js';

        $categories = $this->categories->findByField('class', 'product');

        foreach ($categories as $category)
        {
            $category->name = ucfirst($category->name);
        }

        return view('index', compact('route', 'edit', 'form', 'types',
            'list', 'units', 'scripts', 'categories'));
    }


    public function edit($id)
    {
        $edit = $form = true;

        $list = false;

        $types = $this->productClassType->all();

        $units = $this->units->orderBy('name')->all();

        $route = 'products.form';

        $scripts[] = '../../js/product.js';

        $categories = $this->categories->findByField('class', 'product');

        foreach ($categories as $category)
        {
            $category->name = ucfirst($category->name);
        }

        $product = $this->repository->findByField('id', $id)->first();


        if($product) {
            $product->photo = str_replace('public', 'storage', $product->photo);

            $product->stock_min = str_replace('.', ',', $product->stock_min);
            $product->stock_max = str_replace('.', ',', $product->stock_max);
            $product->quantity = str_replace('.', ',', $product->quantity);
            $product->price = str_replace('.', ',', $product->price);
            $product->sale_price = str_replace('.', ',', $product->sale_price);
            $product->icms = str_replace('.', ',', $product->icms);
            $product->ipi = str_replace('.', ',', $product->ipi);
            $product->pis = str_replace('.', ',', $product->pis);
            $product->shipping_value = str_replace('.', ',', $product->shipping_value);
            $product->shipping_tax = str_replace('.', ',', $product->shipping_tax);
            $product->commission_value = str_replace('.', ',', $product->commission_value);
            $product->commission_tax = str_replace('.', ',', $product->commission_tax);

            return view('index', compact('product', 'route', 'edit', 'form', 'types',
                'list', 'units', 'scripts', 'categories'));
        }

        abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->all(); //dd($request->all());

        $data['photo'] = $request->file('photo') ? $request->file('photo')->store('public/images') : null;

        //$data['photo'] = Storage::putFile('images', $request->file('photo'));

        if($data['internal_code'] == "")
        {
            $code = $this->random_string(10);

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

        if($request->file('photo'))
            $data['photo'] = $request->file('photo')->store('public/images');

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

    public function delete($id)
    {
        $product = $this->repository->findByField('id', $id)->first();

        if($product)
        {
            try {
                $x['status'] = 0;

                $this->repository->update($x, $id);

                DB::commit();

                return json_encode(['status' => true, 'msg' => 'O produto ' . $product->name . ' foi excluído com sucesso']);

            }catch (\Exception $e)
            {
                DB::rollBack();

                return json_encode(['status' => false, 'msg' => $e->getMessage()]);
            }
        }
        else
            return json_encode(['status' => false, 'msg' => 'Este produto não existe']);

    }
}
