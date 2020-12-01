<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerProduct extends Controller
{
    function index($id=0)
    {
        $data= DB::Table('customers')
            ->select('customers.customer_name','products.product_name','products.product_number','customers.customer_phone','products.details','products.one_price','products.total_price','products.order_time','products.dead_line','products.status')
            ->join('products','customers.id','products.customer_id')
            ->where('customers.id',$id)
            ->get();

        if($data->isEmpty())
        {
            abort(404,"Hele ki musteri terefinden hecbir sifaris verilmeyib");

        }
        else
            return view('customer.customerproducts', compact('id','data'));
    }
}
