<?php

namespace App\Http\Controllers;

use App\contracts\PaymentInterface;
use Illuminate\Http\Request;

class CheckoutControllerInvokable extends Controller
{
    public function __construct(private PaymentInterface $payment){}
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return $this->payment->pay(request()->all());
    }
}
