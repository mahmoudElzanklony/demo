<?php

namespace App\Http\Controllers;

use App\contracts\AppointmentInterface;
use App\contracts\ProductInterface;
use App\Http\Requests\AppointMentFormRequest;
use App\Http\Requests\ProductFormRequest;
use App\Traits\DefaultControllerResourceFunctionsTrait;
use Illuminate\Http\Request;

class AppointmentsControllerResourceApi extends Controller
{
    use DefaultControllerResourceFunctionsTrait;

    private $form_request = AppointMentFormRequest::class;
    public function __construct(private AppointmentInterface $repository)
    {
        $this->middleware('auth:sanctum')->except(['index', 'show','get_info']);
    }

    public function get_info()
    {
        return $this->repository->get_info();
    }
}
