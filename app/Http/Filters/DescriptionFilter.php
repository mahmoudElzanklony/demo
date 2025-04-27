<?php

namespace App\Http\Filters;

class DescriptionFilter
{
    public function handle($request, \Closure $next)
    {
        if(request()->filled('description')){
            return $next($request)->where('description','LIKE','%'.request()->input('description').'%');
        }
        return $next($request);

    }
}
