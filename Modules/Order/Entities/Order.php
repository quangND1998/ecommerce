<?php

namespace Modules\Order\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'id',
        'order_number',
        'customer_id',
        'status',
        'payment_status',
        'payment_method',
        'grand_total',
        'discount',
        'shipping_fee',
        'last_price',
        'specific_address',
        'address',
        'city',
        'district',
        'wards',
        'phone_number',
        'notes',
        'reason',
        'created_at',
        "updated_at"
    ];



    public function customer()
    {
        return $this->belongsTo(CustomerOrder::class, 'customer_id');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function scopeFilter($query, array $filters)
    {

        if (array_key_exists('payment_status', $filters)) {
            $query->where('payment_status',  $filters['payment_status']);
        } else {

            $query->get();
        }
    }

    public function scopeStatus($query, array $filters)
    {

        if (array_key_exists('status', $filters)) {
            $query->where('status',  $filters['status']);
        } else {
            $query->get();
        }
    }

    public function scopeDate($query, array $dates)
    {

        if (array_key_exists('from', $dates) && array_key_exists('to', $dates)) {
            $query->whereBetween('created_at', [Carbon::parse($dates['from'])->format('Y-m-d H:i:s'), Carbon::parse($dates['to'])->format('Y-m-d H:i:s')]);
        } else {
            $query->get();;
        }
    }



    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderFactory::new();
    }
}
