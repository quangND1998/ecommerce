<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $table = 'customer_orders';
    protected $fillable = ["id",'name' ,'email','phone_number','address','city','district','wards',   "created_at", "updated_at"];


    public function orders(){
        return $this->hasMany(Order::class,'customer_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\CustomerOrderFactory::new();
    }
}
