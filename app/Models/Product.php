<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo', 'name', 'maker_code', 'internal_code', 'status', 'active', 'brand', 'unit',
        'gtin', 'ncm', 'stock_location', 'stock_min', 'stock_max', 'quantity',
        'class_type_id', 'description', 'price', 'icms', 'ipi', 'pis', 'shipping_value',
        'shipping_tax', 'commission_value', 'commission_tax', 'variation_1', 'variation_2',
        'sale_price', 'category_id'
    ];

}
