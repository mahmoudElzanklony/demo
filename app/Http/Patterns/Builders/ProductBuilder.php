<?php

namespace App\Http\Patterns\Builders;

use App\Models\product_properties;
use App\Models\product_wholesale;
use App\Models\products;
use Illuminate\Support\Facades\DB;

class ProductBuilder
{
    private $data;
    private $product;

    public $errors = [];
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function init_product()
    {
        DB::beginTransaction();
        $this->product = products::query()->updateOrCreate([
            'id'=>$this->data['id'] ?? null,
        ],[
            'name'=>$this->data['name'],
            'price'=>$this->data['price'],
            'description'=>$this->data['description'],
        ]);
        return $this;
    }

    public function save_properties()
    {
        foreach ($this->data['properties'] as $property) {
            product_properties::query()->updateOrCreate([
                'id'=>$property['id'] ?? null,
            ],[
                'product_id'=>$this->product->id,
                'name'=>$property['name'],
                'answer'=>$property['answer'],
            ]);
        }

        return $this;
    }
    public function save_wholesale()
    {
        foreach ($this->data['wholesale'] as $wholesale) {
            product_wholesale::query()->updateOrCreate([
                'id'=>$wholesale['id'] ?? null,
            ],[
                'product_id'=>$this->product->id,
                'quantity'=>$wholesale['quantity'],
                'price'=>$wholesale['price'],
            ]);
        }

        DB::commit();
        return $this->data;
    }
}
