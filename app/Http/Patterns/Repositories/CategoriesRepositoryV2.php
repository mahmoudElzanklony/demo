<?php

namespace App\Http\Patterns\Repositories;

use App\contracts\CategoriesInterface;
use App\Http\Filters\DescriptionFilter;
use App\Http\Filters\NameFilter;
use App\Models\categories;
use Illuminate\Pipeline\Pipeline;

class CategoriesRepositoryV2 implements CategoriesInterface
{
    public function index()
    {
        $data = Categories::query()->select('id','user_id','name')->with('user')->orderBy('id','DESC');
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
