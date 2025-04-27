<?php

namespace App\Http\Filters;

class NameFilter
{
    public function handle($request, \Closure $next)
    {
        if(request()->filled('name')){
            return $next($request)->where('name','LIKE','%'.request()->input('name').'%');
        }
        return $next($request);

    }
}
