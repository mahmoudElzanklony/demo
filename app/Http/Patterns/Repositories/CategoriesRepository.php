<?php

namespace App\Http\Patterns\Repositories;

use App\contracts\CategoriesInterface;
use App\Http\Filters\DescriptionFilter;
use App\Http\Filters\NameFilter;
use App\Http\Requests\CategoriesFormRequest;
use App\Models\categories;
use App\Models\products;
use App\Services\Messages;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class CategoriesRepository implements CategoriesInterface
{
    public function index()
    {
        $data = Categories::query()->with('user')->orderBy('id','DESC');
        return app(Pipeline::class)->send($data)->through([
            NameFilter::class,
            DescriptionFilter::class,
        ])->thenReturn()->get();
    }

    public function create($data)
    {
        return categories::query()->create($data);
    }
    public function update($data, $id)
    {
        $data['id'] = $id;
        return categories::query()->where('id',$id)->findOrFailWithErr('Category Not Found')->update($data);
    }
}
