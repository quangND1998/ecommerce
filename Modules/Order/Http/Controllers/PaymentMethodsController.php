<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Order\Entities\PaymentMethod;
use Modules\Order\Entities\PaymentAccount;
use App\Http\Controllers\Traits\FileUploadTrait;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Storage;
use Modules\Order\Http\Requests\PaymentMethodStoreRequest;
use Modules\Order\Http\Requests\PaymentMethodUpdateRequest;

class PaymentMethodsController extends Controller
{
    use FileUploadTrait;
    function __construct()
    {
        $this->middleware('permission:users-manager', ['only' => ['store', 'update', 'delete']]);
    }
    public function index()
    {

        $payments = PaymentMethod::get();
        return Inertia::render("Payment/PaymentManagement", compact('payments'));
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
    public function store(PaymentMethodStoreRequest $request)
    {
        $middlepath = 'payment';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        PaymentMethod::create([
            "name" => $request->name,
            "active" => $request->active,
            "thumb" => $this->upload($request->file('thumb'), time(), $middlepath)
        ]);
        return back()->with('success', "Tạo thành công");
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(PaymentMethod $payment)
    {
        $payments = PaymentMethod::get();
        $payment_info = PaymentAccount::where('payment_method_id', $payment->id)->first();

        return Inertia::render('Payment/PaymentInfor', compact('payments', 'payment', 'payment_info'));
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
    public function update(PaymentMethodUpdateRequest $request, PaymentMethod $payment)
    {
        $middlepath = 'payment';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }

        $payment->update([
            "name" => $request->name,
            "active" => $request->active,
            "thumb" => $request->file('thumb') ? $this->updateImage($request->file('thumb'), time(), $middlepath, $payment->thumb) : $payment->thumb
        ]);

        return back()->with('success', "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(PaymentMethod $payment)
    {
        $this->deleteImage($payment->thumb);

        $payment->delete();
        return back()->with('success', "Cập nhật thành công");
    }



    public function priority(Request $request)
    {
        $data = $request->data;
        for ($i = 0; $i < count($data); $i++) {
            PaymentMethod::findOrFail($data[$i]['id'])->update(['priority' => $i]);
        }
        return redirect()->back()->with('success', 'Sort  successfully');
    }
}
