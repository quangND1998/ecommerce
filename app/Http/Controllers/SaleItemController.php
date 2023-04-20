<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Modules\ProductCategory\Entities\Product;
use Inertia\Inertia;

use App\SaleService\MoneyDiscount;
use App\SaleService\PercentDiscount;
use Modules\Order\Entities\OrderItem;

class SaleItemController extends Controller
{

    protected $percent, $money;

    public function __construct(PercentDiscount $percent, MoneyDiscount $money)
    {

        $this->percent = $percent;
        $this->money = $money;
    }
    public function deleteItems(Request $request)
    {
        $ids = $request->ids;
        if ($ids == null) {
            return back()->with('warning', "You must choose in checkbox !!!.");
        }

        $sale_times = SaleItem::whereIn('id',  $ids)->get();
        if ($sale_times->count() > 0) {
            foreach ($sale_times as $item) {
                $item->delete();
            }

            return back()->with('success', "Delete changed successfully.");
        }
        return back()->with('warning', "Not found product");
    }


    public function addProducts(Request $request, Sale $sale)
    {
        $sortBy = $request->sortBy ? $request->sortBy : 'id';
        $sort_Direction = $request->sortDirection ?  $request->sortDirection : 'asc';
        $status = $request->status;
        $products = Product::select('id', 'name',  'SKU', 'status', 'price', 'cost')->with(['first_image'])->where(function ($query) use ($request) {
            $query->where('SKU', 'LIKE', '%' . $request->term . '%');
        })->orderBy($sortBy, $sort_Direction)->paginate(15)->appends(['name' => $request->term, 'sortBy' => $request->sortBy, 'sortDirection' => $request->sort_Direction, 'status' => $request->status]);;
        return Inertia::render("Sales/AddProducts", compact('products', 'sortBy', 'sort_Direction', 'status', 'sale'));
    }


    public function saveItems(Request $request, Sale $sale)
    {

        $ids = $request->ids;
        if ($ids == null) {
            return back()->with('warning', "You must choose in checkbox !!!.");
        }
        $products = Product::whereIn('id',  $ids)->get();

        if ($products->count() > 0) {
            foreach ($products as $product) {

                $item = $sale->sale_items()->where('product_id', $product->id)->first();

                if ($item) {
                    if ($sale->type == 'all') {
                        if ($sale->unit == "%") {
                            $this->percent::updateItem($item, $product, $sale->discount);
                        } else {
                            $this->money::updateItem($item, $product, $sale->discount);
                        }
                    } else {
                        if ($sale->unit == "%") {
                            $this->percent::updateItem($item, $product, $item->discount);
                        } else {
                            $this->money::updateItem($item, $product, $item->discount);
                        }
                    }
                } else {

                    if ($sale->type == 'all') {
                        if ($sale->unit == "%") {
                            $this->percent::createItem($sale, $product, $sale->discount);
                        } else {
                            $this->money::createItem($sale, $product, $sale->discount);
                        }
                    } else {

                        if ($sale->unit == "%") {
                            $this->percent::createItem($sale, $product, 0);
                        } else {
                            $this->money::createItem($sale, $product, 0);
                        }
                    }
                }
            }

            return back()->with('success', "Delete changed successfully.");
        }

        return back()->with('warning', "Not found product");
    }


    public function updateDiscount(Request $request)
    {
        $this->validate($request, [
            'unit' => 'required',
            'discount' => 'required|numeric|gt:0',
            'item_sale_id' => 'required'
        ]);

        $item = SaleItem::find($request->item_sale_id);
   
        if ($item) {
            $product = Product::find($item->product_id);
            $sale = Sale::find($item->sale_id);
            if ($product && $sale) {
                if ($sale->unit == "%") {
                    PercentDiscount::updateItem($item, $product, $request->discount);
                } else {
                    MoneyDiscount::updateItem($item, $product, $request->discount);
                }
                return response()->json($item->load('product'), 200);
            } else {
                return response()->json('Not found', 404);
            }
        } else {
            return response()->json('Not found', 404);
        }
    }
}
