<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalseRequest;
use App\Http\Requests\UpdateSalseRequest;
use App\Imports\ImportSale;
use App\Models\Sale;
use App\SaleService\MoneyDiscount;
use App\SaleService\PercentDiscount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use Modules\ProductCategory\Entities\Product;

class SaleController extends Controller
{

    protected $allowStoreFields = [
        'name', 'type',  'start_date', 'unit', 'end_date', 'discount',

    ];
    protected $percent, $money;

    public function __construct(PercentDiscount $percent, MoneyDiscount $money)
    {

        $this->percent = $percent;
        $this->money = $money;
    }
    public function index(Request $request)
    {

        $state = $request->state;
        $sales  = Sale::withCount('sale_items')->state($request->only('state'))->where(function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->term . '%');
        })->paginate(10)->appends(['name' => $request->term, 'page' => $request->page, 'state' => $request->state]);
        $total = $sales->total();
        return Inertia::render("Sales/Index", compact('sales', 'state', 'total'));
    }


    public function create()
    {


        return Inertia::render("Sales/AddSale");
    }

    public function store(StoreSalseRequest $request)
    {


        $sale = Sale::create([
            'name' => $request->name,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),
            'unit' => $request->unit,
            'type' => $request->type,
            'discount' => $request->discount
        ]);
        return redirect()->route('sales.detail', $sale->id)->with('success', 'Tạo chương trình thành công');
    }

    public function detailSale(Request $request, Sale $sale)
    {
        $sale = $sale->load('sale_items.product');
        return Inertia::render("Sales/Detail", compact('sale'));
    }

    public function update(UpdateSalseRequest $request, Sale $sale)
    {

        $sale->update([
            'name' => $request->name,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),
            'unit' => $request->unit,
            'type' => $request->type,
            'discount' => $request->discount
        ]);

        if ($sale->type == 'all') {

            foreach ($sale->sale_items as $item) {
                $product = Product::find($item->product_id);
                if ($sale->unit == "%") {
                    $this->percent::updateItem($item, $product, $sale->discount);
                } else {
                    $this->money::updateItem($item, $product, $sale->discount);
                }
            }
        }
        return back()->with('success', 'Cập nhật chương trình sale thành công');
    }


    public function delete(Sale $sale)
    {
        $sale->delete();
        return back()->with('success', 'Xóa chương trình sale thành công');
    }




    public function importSale(Request $request, Sale $sale)
    {

        $request->validate([
            'file_sale' => 'required|mimes:xlsx,csv,xls'
        ]);
        Excel::import(new ImportSale($sale), request()->file('file_sale'));
        File::deleteDirectory('/storage/framework/laravel-excel/*');
        return redirect()->back()->with('success', 'Đang xử lý');
    }

    public function changeState(Request $request)
    {

        $sale = Sale::findOrFail($request->id);
        $sale->update(['state' => $request->state]);
        return back()->with('success', 'Cập nhật thành công');
    }
}
