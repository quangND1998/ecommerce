<?php

namespace Modules\Order\Repositories;

use App\BaseRepository;
use App\Contracts\OrderContract;
use Modules\Order\Entities\Order;
use Cart;
use Illuminate\Support\Facades\DB;
use Modules\Order\Entities\OrderItem;
use Modules\ProductCategory\Entities\Product;

class OrderRepository extends BaseRepository implements OrderContract
{
    protected function model()
    {
        return new Order();
    }

    public function storeOrderDetails($params, $customer)
    {
        $order = Order::create([
            'order_number'      =>  'ORD-' . strtoupper(uniqid()),
            'customer_id'           => $customer->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getSubTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'first_name'        =>  $params['first_name'],
            'last_name'         =>  $params['last_name'],
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'country'           =>  $params['country'],
            'post_code'         =>  $params['post_code'],
            'phone_number'      =>  $params['phone_number'],
            'notes'             =>  $params['notes']
        ]);

        if ($order) {

            $items = Cart::getContent();

            foreach ($items as $item) {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);

                $order->items()->save($orderItem);
            }
        }

        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model()->all($columns, $order, $sort);
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }


    public function getOrder($request, $status)
    {
        return Order::whereHas(
            'customer',
            function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->customer . '%');
                $q->orwhere('phone_number', 'LIKE', '%' . $request->customer . '%');
            }
        )->whereHas(
            'orderItems.product',
            function ($q) use ($request) {
                $q->where('SKU', 'LIKE', '%' . $request->SKU . '%');
            }
        )->with(['customer', 'orderItems.product', 'payment'])->where('status', $status)->date($request->only('from', 'to'))->filter($request->only('payment_status'))->where(function ($query) use ($request) {
            $query->where('order_number', 'LIKE', '%' . $request->term . '%');
        })->paginate(10)->appends(['name' => $request->term, 'customer' => $request->customer, 'SKU' => $request->SKU,  'payment_status' => $request->payment_status, 'from' => $request->from, 'to' => $request->to]);
    }


    public function groupByOrderStatus()
    {

        $array_status = ['pending', 'packing', 'shipping', 'completed', 'refund', 'decline'];
        $statusGroup = DB::table('orders')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        foreach ($array_status as $status) {

            $filtered = $statusGroup->where('status', $status)->first();

            if ($filtered == null) {

                $newCollections[] = array(
                    'status' => $status,
                    'total' => 0,


                );
            } else {

                $newCollections[] = array(
                    'status' => $status,
                    'total' => $filtered->total,

                );
            }
        }
        return $newCollections;
        // $newCollections = [];
    }

    public function groupByOrder($array_status)
    {


        $statusGroup = DB::table('orders')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        foreach ($array_status as $status) {

            $filtered = $statusGroup->where('status', $status)->first();

            if ($filtered == null) {

                $newCollections[] = array(
                    'status' => $status,
                    'total' => 0,


                );
            } else {

                $newCollections[] = array(
                    'status' => $status,
                    'total' => $filtered->total,

                );
            }
        }
        return $newCollections;
        // $newCollections = [];
    }
}
