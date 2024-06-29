<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guarded = [];

    protected $guard_name = 'customer';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'], function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    }
}
