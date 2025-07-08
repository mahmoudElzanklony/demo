<?php

namespace App\Http\Patterns\Repositories;

use App\contracts\CategoriesInterface;
use App\Http\Filters\DescriptionFilter;
use App\Http\Filters\NameFilter;
use App\Http\Requests\CategoriesFormRequest;
use App\Models\categories;
use App\Models\products;
use App\Services\Messages;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class CategoriesRepository implements CategoriesInterface
{
    public function index()
    {

        $lock = Cache::lock('update_category', 10);

        if ($lock->get()) {
            Log::debug('✅ Lock acquired at ' . now());
            dd('stop');
            sleep(10);
            $lock->release();
            Log::debug('✅ Lock released at ' . now());
            return 'Lock held and released';
        } else {
            Log::debug('❌ Lock already held at ' . now());
            return response()->json(['message' => '🚫 Lock already held'], 429);
        }

        $lock = Cache::lock('update_category', 10);
        sleep(3);

        if (! $lock->get()) {
            logger('❌ Lock already held at ' . now());
            abort(429, '🚫 This category is in process now');
        }

        try {
            logger('✅ Lock acquired at ' . now());
            $obj = categories::query()->first();
            sleep(10);
        } finally {
            $lock->release();
            logger('✅ Lock released at ' . now());
        }

        return $obj;
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
        return DB::transaction(function () use ($data , $id) {
            /*$obj =  categories::query()
                ->where('id',$id)
                ->lockForUpdate()
                ->findOrFailWithErr('Category Not Found')->update($data);*/
            $lock = Cache::lock('update_category',10);
            if($lock->get()){
                $obj =  categories::query()
                    ->where('id',$id)
                    ->findOrFailWithErr('Category Not Found')->update($data);
                sleep(10);
                $lock->release();
            }else{
                abort(Messages::error('This category is in process now'));
            }

            return $obj;
        });
    }
}
