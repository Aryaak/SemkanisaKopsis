<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'status_id',
        'payment_id',
        'total',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
