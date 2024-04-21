<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function purchase_order()
    {

        return $this->hasMany(PurchaseOrder::class);
    }
}
