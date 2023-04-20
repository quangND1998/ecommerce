<?php

namespace Modules\Order\Http\Controllers;

use App\Contracts\OrderContract;
use App\Exports\ExportOrder;
use Carbon\Carbon;
use Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Modules\Order\Entities\CustomerOrder;
use Modules\Order\Entities\Order;
use Modules\ProductCategory\Entities\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Modules\Order\Entities\OrderItem;
use Modules\Order\Entities\ShippingFee;
use Modules\Order\Http\Requests\OrderStoreRequest;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Order\Http\Requests\UpdateOrderRequest;
use Modules\Order\Entities\PaymentMethod;

class OrderController extends Controller
{

    protected $allowStoreCustomer = [
        "name", "email",    "phone_number", "address",    "city",    "district", "wards",    "country"

    ];



    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {

        $this->orderRepository = $orderRepository;

        // $this->middleware('permission:users-manager', ['only' => ['pending', 'packing', 'shipping', 'completed', 'refund', 'decline']]);
        $this->middleware('permission:order-pending', ['only' => ['pending', 'create']]);
        $this->middleware('permission:order-packing', ['only' => ['packing', 'create']]);
        $this->middleware('permission:order-shipping', ['only' => ['shipping', 'create']]);
        $this->middleware('permission:order-completed', ['only' => ['completed', 'create']]);
        $this->middleware('permission:order-refund', ['only' => ['refund', 'create']]);
        $this->middleware('permission:order-decline', ['only' => ['decline', 'create']]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function pending(Request $request)
    {
        // $order = Order::find(1);
        // return $order;
        // return $this->Fee($order);
        $payment_status = $request->payment_status;
        $from = Carbon::parse($request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->to)->format('Y-m-d H:i:s');
        $status = 'pending';
        $orders = $this->orderRepository->getOrder($request, $status);
        $statusGroup = $this->orderRepository->groupByOrderStatus();

        return Inertia::render('Order/OrderWait', compact('orders', 'payment_status', 'status', 'from', 'to', 'statusGroup'));
    }


    public function packing(Request $request)
    {

        $payment_status = $request->payment_status;
        $from = Carbon::parse($request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->to)->format('Y-m-d H:i:s');
        $status = 'packing';
        $orders = $this->orderRepository->getOrder($request, $status);
        $statusGroup = $this->orderRepository->groupByOrderStatus();


        return Inertia::render('Order/OrderWait', compact('orders', 'payment_status', 'status', 'from', 'to', 'statusGroup'));
    }


    public function shipping(Request $request)
    {

        $payment_status = $request->payment_status;
        $from = Carbon::parse($request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->to)->format('Y-m-d H:i:s');
        $status = 'shipping';
        $orders = $this->orderRepository->getOrder($request, $status);
        $statusGroup = $this->orderRepository->groupByOrderStatus();


        return Inertia::render('Order/OrderWait', compact('orders', 'payment_status', 'status', 'from', 'to', 'statusGroup'));
    }

    public function completed(Request $request)
    {

        $payment_status = $request->payment_status;
        $from = Carbon::parse($request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->to)->format('Y-m-d H:i:s');
        $status = 'completed';
        $orders = $this->orderRepository->getOrder($request, $status);

        $statusGroup = $this->orderRepository->groupByOrderStatus();


        return Inertia::render('Order/OrderWait', compact('orders', 'payment_status', 'status', 'from', 'to', 'statusGroup'));
    }

    public function refund(Request $request)
    {

        $payment_status = $request->payment_status;
        $from = Carbon::parse($request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->to)->format('Y-m-d H:i:s');
        $status = 'refund';


        $orders = $this->orderRepository->getOrder($request, $status);

        $statusGroup = $this->orderRepository->groupByOrderStatus();


        return Inertia::render('Order/OrderWait', compact('orders', 'payment_status', 'status', 'from', 'to', 'statusGroup'));
    }




    public function decline(Request $request)
    {

        $payment_status = $request->payment_status;
        $from = Carbon::parse($request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->to)->format('Y-m-d H:i:s');
        $status = 'decline';
        $orders = $this->orderRepository->getOrder($request, $status);
        $statusGroup = $this->orderRepository->groupByOrderStatus();


        return Inertia::render('Order/OrderWait', compact('orders', 'payment_status', 'status', 'from', 'to', 'statusGroup'));
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {

        $products = Product::select('id', 'name', 'slug', 'SKU', 'status', 'active', 'auto_sold', 'price', 'cost', 'outstanding', 'category_id')->with(['first_image'])->where(function ($query) use ($request) {
            $query->where('SKU', 'LIKE', '%' . $request->term . '%');
        })->where('status', 1)->get();

        $response = Cache::rememberForever('provinces', function () {
            return Http::get('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json')->json();
        });

        $payments = PaymentMethod::with('payment_info')->where('active', 1)->get();

        $provinces = $response;
        $cart = Cart::getContent();
        $total_price = Cart::getSubTotal();
        // return Inertia::render('Order/AddNewOrder', compact('products'));
        return Inertia::render('Order/AddNewOrder', compact('products', 'provinces', 'cart', 'total_price', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only($this->allowStoreCustomer);
        $customer = CustomerOrder::create($data);

        if ($customer) {
            $this->orderRepository->storeOrderDetails($request->all(), $customer);
        }
    }


    public function createOrder(OrderStoreRequest $request)
    {
        // OrderStoreRequest

        if (Cart::isEmpty() || Cart::getTotalQuantity() == 0) {
            return  back()->with('warning', 'Giỏ hàng trống hoặc có số lượng bằng 0');
        }
        $data = $request->only($this->allowStoreCustomer);
        $customer = CustomerOrder::where('phone_number', $request->phone_number)->first();
        if (!$customer) {
            $customer = CustomerOrder::create($data);
            $customer->save();
        }
        $customer->update($data);

        if ($customer) {
            $order = Order::create([
                'order_number'      =>  'ORD-' . strtoupper(uniqid()),
                'customer_id'           => $customer->id,
                'status'            =>  'pending',
                'payment_status'    =>  0,
                'payment_method' => $request->payment_method,
                // 'specific_address' => $request->specific_address,
                'address' => $request->address,
                'city' => $request->city,
                'district' => $request->district,
                'wards' => $request->wards,
                'phone_number'        =>  $request->phone_number,
                'notes'         =>  $request->notes,
                'grand_total' => Cart::getSubTotal(),
                'item_count' => Cart::getTotalQuantity()

            ]);


            // $fee = $this->Fee($order);
            // if (Str::slug($order->city) == Str::slug('Thành phố Hà Nội')) {

            // }


            if ($order) {

                $items = Cart::getContent();

                foreach ($items as $item) {
                    // A better way will be to bring the product id with the cart items
                    // you can explore the package documentation to send product id with the cart
                    // $product = Product::where('name', $item->name)->first();
                    if ($item->quantity > 0) {
                        $orderItem = new OrderItem([
                            'product_id' => $item->id,
                            'quantity'      =>  $item->quantity,
                            'price'         =>  $item->price,
                            'total_price' => $item->getPriceSum(),
                        ]);
                        $order->orderItems()->save($orderItem);
                    }
                }
            }
        }
        Cart::clear();
        return redirect()->route('orders.pending')->with('success', "Tạo đơn hàng thành công");
    }
    public function addProductCart(Request $request)
    {

        $quantities = $request->quantities;
        if (count($quantities) > 0) {
            foreach ($quantities as $quantity) {

                $product = Product::find($quantity['product_id']);

                if ($product && $quantity['quantity'] > 0) {

                    Cart::add(array(
                        'id' => $product->id, // inique row ID
                        'name' => $product->name,
                        'price' => $product->cost,
                        'quantity' =>  $quantity['quantity'],
                        'attributes' => array([
                            'image' => $product->first_image ? $product->first_image->image : null
                        ]),
                        // 'conditions' => $saleCondition
                    ));
                }
            }
        } else {
            return back()->with('warning', "You must choose in checkbox !!!.");
        }
    }


    public function deleteMultipleItem(Request $request)
    {
        foreach ($request->ids as $id) {
            $item = Cart::get($id);

            if ($item) {
                Cart::remove($item->id);
            }
        }

        return back()->with('success', 'Delete item successfully');
    }


    public function  updateCart(Request $request)
    {

        Cart::update($request->product_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity_cart
            ),
        ));

        $respone = [
            'total_price' => Cart::getSubTotal(),
            'item' => Cart::get($request->product_id)
        ];
        return response()->json($respone, 200);
    }
    public function removeItem(Request $request)
    {
        Cart::remove($request->product_id);
        return back()->with('success', 'Delete item successfully');
    }



    public function removeCart()
    {

        Cart::clear();
        return back()->with('success', 'Delete card successfully');
    }




    public function Fee($order)
    {
        dd(Str::slug($order->city) == Str::slug("Thành phố Hà Nội"));
        $shipping = ShippingFee::where('start_price', '<=', $order->grand_total)->where('end_price', '>=', $order->grand_total)->first();
        // return $shipping;
        // if ($shipping && Str::slug($order->city) ==Str::slug("Thành phố Hà Nội") {
        //     $fee = ($order->grand_total * $shipping->fee) / 100;

        //     return $fee;
        // } else {
        //     return 0;
        // }
    }


    public function updateOrder(UpdateOrderRequest $request)
    {
        $order = Order::find($request->order_id);
        if ($order->payment_status == 1) {
            return Response::json('Đơn hàng đã thanh toán không được sửa', 404);
        }
        if ($order) {
            $fee = $order->grand_total - ($order->grand_total * $request->discount) / 100 + $request->shipping_fee;
            $order->shipping_fee = $request->shipping_fee;
            $order->discount = $request->discount;
            $order->last_price =  $fee;
            $order->save();
            return response()->json($order->load('customer', 'orderItems.product'), 200);
        } else {
            return response()->json('Not found', 404);
        }
    }

    public function orderCancel(Request $request, Order $order)
    {
        $request->validate([
            'reason' => 'required',

        ], [
            'reason.required' => 'Điền lý do hủy đơn'
        ]);
        $order->update([
            'status' => 'decline',
            'reason' => $request->reason
        ]);

        return back()->with('success', 'Hủy đơn thành công');
    }

    public function orderRefund(Request $request, Order $order)
    {
        $request->validate([
            'reason' => 'required',
            'grand_total' => 'required',
            'shipping_fee' => 'required|numeric|gte:0|lt:grand_total'
        ], [
            'reason.required' => 'Điền lý do hủy đơn'
        ]);

        $order->update([
            'status' => 'refund',
            'shipping_fee' => $request->shipping_fee ? $request->shipping_fee : 0,
            'reason' => $request->reason,
            'last_price' => $order->grand_total - ($order->grand_total * $order->discount) / 100 + $request->shipping_fee
        ]);

        return back()->with('success', 'Hủy đơn thành công');
    }

    public function orderChangeStatus(Request $request, Order $order)
    {

        $order->update([
            'status' => $request->status,
        ]);
        if ($order->status == 'completed') {
            $orderItems = $order->orderItems()->get();
            foreach ($orderItems as $item) {
                $product = Product::find($item->product_id);
                $product->update([
                    'quantity_sold_auto' => $product->quantity_sold_auto + $item->quantity
                ]);
            }
        }
        return back()->with('success', `Đơn hàng đã được chuyển sang trạng thái:$request->status`);
    }

    public function orderChangePayment(Request $request)
    {

        $order = Order::findOrFail($request->id);
        $order->update(['payment_status' => $request->payment_status]);
        return back()->with('success', 'Chuyển trạng thái thanh toán thành công');
    }

    public function export(Request $request)
    {
        return Excel::download(new ExportOrder, 'order.xlsx');
    }
}
