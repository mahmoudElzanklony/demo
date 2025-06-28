<?php

namespace App\Http\Controllers;

use App\contracts\MoneyInterface;
use App\contracts\OrderInterface;
use App\Http\Requests\OrderFormRequest;
use Illuminate\Http\Request;

class OrdersControllerResource extends Controller
{
    public function __construct(private OrderInterface $repository)
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderFormRequest $request)
    {
        return $this->repository->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
