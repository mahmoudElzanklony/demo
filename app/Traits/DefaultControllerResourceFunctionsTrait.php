<?php

namespace App\Traits;

use App\Http\Requests\CategoriesFormRequest;
use App\Services\Messages;
use Illuminate\Http\Request;

trait DefaultControllerResourceFunctionsTrait
{
    public function index()
    {
        return $this->repository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $data = request()->validate(app($this->form_request)->rules());
        $result = $this->repository->create($data);
        return Messages::success('Created Successfully',$result);
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
        $data = request()->validate(app($this->form_request)->rules());
        $result = $this->repository->update($data,$id);
        return Messages::success('Updated successfully',$result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
