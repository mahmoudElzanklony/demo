<?php

namespace App\Http\Controllers;

use App\Http\Filters\DescriptionFilter;
use App\Http\Filters\NameFilter;
use App\Http\Requests\ProductFormRequest;
use App\Models\products;
use App\Services\Messages;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ProductControllerResourceApi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
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
    public function store(ProductFormRequest $request)
    {
        $data = $request->validated();
        products::query()->create($data);
        return Messages::success('Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  products::query()->where('id',$id)->findOrFailWithErr('Product Not Found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, string $id)
    {
        $data = $request->validated();
        $product = products::query()->where('id',$id)->findOrFailWithErr('Product Not Found')->update($data);
        return Messages::success('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
