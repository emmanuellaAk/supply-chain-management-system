<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrders extends Model
{
    use HasFactory;
    protected $fillable = [ 'order_id', 'products'];
    protected $cast = ['products'];

    public function products() {
        return $this->belongsTo(OrderItem::class, 'order_id');
    }

    
}
