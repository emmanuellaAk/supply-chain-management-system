<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalSupport extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','subject','description','status','attachment'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
