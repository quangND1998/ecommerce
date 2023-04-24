<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductCategory\Entities\Options;
use Modules\ProductCategory\Http\Requests\Options\OptionValueRequest;

class OptionValueController extends Controller
{
    protected $allowStoreField = [
        'name', 'visual'
    ];
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Options $option)
    {
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(OptionValueRequest $request, Options $option)
    {
        
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
