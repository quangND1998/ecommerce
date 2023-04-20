<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $fillable = [
        'id', 'name', 'type', 'unit','','count_item',  'start_date', 'end_date', 'discount', 'state',    'created_at', 'updated_at'

    ];


    public function sale_items()
    {
        return $this->hasMany(SaleItem::class, 'sale_id');
    }

    public function scopeState($query, array $filters)
    {

        if (array_key_exists('state', $filters)) {
            $query->where('state',  $filters['state']);
        } else {
            $query->get();
        }
    }
}
