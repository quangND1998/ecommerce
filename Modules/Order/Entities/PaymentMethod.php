<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';
    protected $fillable = ["id", "name",  "priority", "thumb", "active",    "created_at", "updated_at"];


    public function paymentInfos()
    {
        return $this->hasMany(PaymentAccount::class, 'payment_method_id');
    }
    public function payment_info()
    {
        return $this->hasOne(PaymentAccount::class, 'payment_method_id');
    }
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\PaymentMethodFactory::new();
    }
}
