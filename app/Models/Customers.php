<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'], function ($query, $search) {
            $query->where('customer_name', 'like', '%' . $search . '%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
