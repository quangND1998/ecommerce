<?php

namespace App\Exports;

use Attribute;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Modules\ProductCategory\Entities\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Str;
use Modules\Order\Entities\Order;

class ExportOrder implements WithMapping, WithHeadings, FromCollection
{
    use Exportable;

   
   


    
    public function collection()
    {
        return Order::where('status','completed')->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Mã đơn hàng',
            "Ngày tạo đơn",
            'Tên khách hàng',
            "Địa chỉ khách hàng",
            "SĐT",
            "Trang thái Thanh toán",
            "Phương thức thanh toán",
            "Giá trước chiết khấu",
            "Phí ship",
            "chiết khấu",
            "Khách phải trả"
        ];
    }

    public function map($order): array
    {
        return [
            $order->order_number ,
            Carbon::parse($order->created_at)->format('Y-m-d H:i:s'),
            $order->customer->name,
            $order->customer->address.','.$order->customer->ward.','.$order->customer->district.','.$order->customer->city,
            $order->phone_numbe,
            $order->payment_status ==1 ? "Đã thanh toán": "Chưa thanh toán",
            $order->payment_method,
            $order->grand_total,
            $order->shipping_fee? $order->shipping_fee :0 ,
            $order->discount,
            $order->last_price,
  


        ];
        
     
    }
}
