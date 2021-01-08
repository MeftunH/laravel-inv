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
            $pro_sum=DB::Table('products')->where('products.customer_id',$id)->where('products.date_id',$request['months'])->sum('total_price');
            $pro_sum_paid=DB::Table('products')->where('products.customer_id',$id)->where('products.date_id',$request['months'])->sum('paid');
            $data= DB::Table('customers')
                ->select('customers.*','products.*')
                ->join('products','customers.id','products.customer_id')
                ->where([
                    ['products.date_id',$request['months']],
                    ['customers.id',$id],
                ])->paginate(10);

        }

return view('customer.customerproducts', compact('id','data','month','pro_sum','pro_sum_paid'));
}
}
