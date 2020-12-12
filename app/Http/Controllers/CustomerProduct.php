<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerProduct extends Controller
{
    function index($id=0,Request $request)
    {
        $data= DB::Table('customers')
            ->select('customers.customer_name','products.product_name','products.product_number','customers.customer_phone','products.details','products.one_price','products.total_price','products.order_time','products.dead_line','products.status','products.paid','products.amount')
            ->join('products','customers.id','products.customer_id')
            ->where('customers.id',$id)
            ->get();
        $pro_sum=DB::Table('products')->where('products.customer_id',$id)->sum('total_price');
        $pro_sum_paid=DB::Table('products')->where('products.customer_id',$id)->sum('paid');

        $month=DB::Table('month')->get();
        $req=$request['months'];
        if($request['months'])
        {
            $data=DB::Table('expenses')->where('expenses.date_id',$request['months'])->paginate(10);

        }

        if($data->isEmpty())
        {
            abort(404,"Hele ki musteri terefinden hecbir sifaris verilmeyib");

        }
else
return view('customer.customerproducts', compact('id','data','month','pro_sum','pro_sum_paid'));
}
}
