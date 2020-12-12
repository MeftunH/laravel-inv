<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public function customers()
{
    return $this->belongsTo(Customer::class);
}
    protected $fillable = [
        'customer_id,product_name, product_number,
        details, one_price,total_price,product_name, order_time, dead_line,status','date_id','paid','date',
    ];



}
