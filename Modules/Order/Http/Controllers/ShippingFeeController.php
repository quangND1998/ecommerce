<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Order\Entities\ShippingFee;
use Modules\Order\Http\Requests\ShippingFee\StoreRequest;
use Modules\Order\Http\Requests\ShippingFee\StoreShippingFeeRequest;
use Modules\Order\Http\Requests\ShippingFee\UpdateRequest;
use Modules\Order\Http\Requests\ShippingFee\UpdateShippingFeeRequest;

class ShippingFeeController extends Controller
{
    protected $allowStoreField = [
        'name', 'fee', 'start_price', 'end_price'

    ];
    function __construct()
    {
        $this->middleware('permission:users-manager', ['only' => ['index', 'store', 'update', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        
        return Inertia::render('ShippingFee/Index', ['shipping_fees' => ShippingFee::get()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreShippingFeeRequest $request)
    {
        $data = $request->only($this->allowStoreField);
        ShippingFee::create($data);
        return back()->with('success', 'Tạo mới thành công');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateShippingFeeRequest $request, ShippingFee $shipping)
    {
        $data = $request->only($this->allowStoreField);
        $shipping->update($data);
        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(ShippingFee $shipping)
    {

        $shipping->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
