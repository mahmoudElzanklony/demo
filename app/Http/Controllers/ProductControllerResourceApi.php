<?php

namespace App\Http\Controllers;

use App\contracts\ProductInterface;
use App\Http\Filters\DescriptionFilter;
use App\Http\Filters\NameFilter;
use App\Http\Requests\ProductFormRequest;
use App\Models\products;
use App\Services\Messages;
use App\Traits\DefaultControllerResourceFunctionsTrait;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ProductControllerResourceApi extends Controller
{
    use DefaultControllerResourceFunctionsTrait;

    private $form_request = ProductFormRequest::class;
    public function __construct(private ProductInterface $repository)
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }






}
