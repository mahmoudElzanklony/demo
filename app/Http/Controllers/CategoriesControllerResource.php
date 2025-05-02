<?php

namespace App\Http\Controllers;

use App\contracts\CategoriesInterface;
use App\Http\Patterns\Repositories\CategoriesRepository;
use App\Http\Requests\CategoriesFormRequest;
use App\Models\categories;
use App\Models\products;
use App\Services\Messages;
use App\Traits\DefaultControllerResourceFunctionsTrait;
use Illuminate\Http\Request;

class CategoriesControllerResource extends Controller
{
    use DefaultControllerResourceFunctionsTrait;
    private $form_request = CategoriesFormRequest::class;
    public function __construct(private CategoriesInterface $repository)
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

}
