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
use Modules\Order\Entities\CustomerOrder;
use Modules\Order\Entities\Order;

class CustomerExport implements WithMapping, WithHeadings, FromCollection
{
    use Exportable;






    public function collection()
    {
        return CustomerOrder::get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'TÊN KHÁCH HÀNG',
            "SỐ ĐIỆN THOẠI",
            "ĐỊA CHỈ KHÁCH HÀNG",
            "PHƯỜNG/XÃ",
            "QUẬN/HUYỆN",
            "TỈNH/THÀNH",
        ];
    }

    public function map($customer): array
    {
        return [
            $customer->name,
            $customer->phone_number,
            $customer->address . ', ' . $customer->ward . ', ' . $customer->district . ', ' . $customer->city,
            $customer->wards,
            $customer->district,
            $customer->city

        ];
    }
}
