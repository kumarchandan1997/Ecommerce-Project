<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whishlist extends Model
{
    use HasFactory;
    protected $table='whishlists';
    protected $fillable = ['user_id','prod_id',];

    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
