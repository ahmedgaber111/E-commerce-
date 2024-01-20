<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['name','email','address','phone','user_id','product_title',
        'quantity','price','image','product_id','Payment_status','Delivered_status'];

}
