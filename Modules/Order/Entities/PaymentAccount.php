<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentAccount extends Model
{
    use HasFactory;
    protected $table = 'payment_accounts';
    protected $fillable = ["id", "qr_code",    "priority", "description",    "active", "payment_method_id",  "created_at", "updated_at"];


    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\PaymentAccountFactory::new();
    }
}
