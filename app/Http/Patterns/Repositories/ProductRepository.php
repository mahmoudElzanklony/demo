<?php

namespace App\Http\Patterns\Repositories;

use App\contracts\ProductInterface;
use App\Http\Filters\DescriptionFilter;
use App\Http\Filters\NameFilter;
use App\Http\Requests\ProductFormRequest;
use App\Models\products;
use App\Services\Messages;
use Illuminate\Pipeline\Pipeline;

class ProductRepository implements ProductInterface
{
    public function index()
    {
        $data = products::query()->with('user')->orderBy('id','DESC');
        return app(Pipeline::class)->send($data)->through([
            NameFilter::class,
            DescriptionFilter::class,
        ])->thenReturn()->get();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function create($data)
    {
        return products::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return  products::query()->where('id',$id)->findOrFailWithErr('Product Not Found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($data, $id)
    {
        $data['id'] = $id;
        return products::query()->where('id',$id)->findOrFailWithErr('Product Not Found')->update($data);
    }
}
