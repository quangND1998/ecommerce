<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\PaymentMethod;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;
use Modules\Order\Entities\PaymentAccount;
use Modules\Order\Http\Requests\StorePaymentInforRequest;

class PaymentInforController extends Controller
{
    use FileUploadTrait;
    function __construct()
    {
        $this->middleware('permission:users-manager', ['only' => ['store', 'update', 'delete']]);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StorePaymentInforRequest $request, PaymentMethod $payment){
        $middlepath = 'payment';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        PaymentAccount::create([
            "description" => $request->description,
            "active" => $request->active,
            "qr_code" => $this->upload($request->file('qr_code'), time(), $middlepath),
            'payment_method_id' => $payment->id
        ]);
        return back()->with('success', "Tạo thành công");
    }


    public function update(Request $request, PaymentAccount $payment)
    {

        $middlepath = 'payment';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        $payment->update([
            "description" => $request->description,
            "active" => $request->active,
            "qr_code" => $request->file('qr_code') ? $this->updateImage($request->file('qr_code'), time(), $middlepath, $payment->qr_code) : $payment->qr_code
        ]);

        return back()->with('success', "Cập nhật thành công");
    }
}
