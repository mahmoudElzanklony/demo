<?php

namespace App\Http\Controllers;


use App\Facades\PaymentManagerFacade;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index(){
         return PaymentManagerFacade::getPayment('cache')->execute();

    }
}
