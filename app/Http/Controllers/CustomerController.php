<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Order\Entities\CustomerOrder;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users-manager', ['only' => ['index']]);
    }
    public function index(Request $request)
    {

        $customers = CustomerOrder::where(function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->term . '%');
            $query->orWhere('phone_number', 'LIKE', '%' . $request->term . '%');
            $query->orWhere('city', 'LIKE', '%' . $request->term . '%');
            $query->orWhere('address', 'LIKE', '%' . $request->term . '%');
        })->paginate(15)->appends(['name' => $request->term, 'page' => $request->page]);
        return Inertia::render('Customer/Index', compact('customers'));
    }

    public function export()
    {
        return Excel::download(new CustomerExport, 'khachhang.xlsx');
    }
}
