<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable =[
        'fname',
        'user_id',
        'total_price',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'counyrt',
        'pincode',
        'status',
        'message',
        'tracking_no',
        'payment_id',
        'payment_mode',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
