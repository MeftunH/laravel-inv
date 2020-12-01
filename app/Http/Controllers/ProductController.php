<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Product;
use DB;
use mysql_xdevapi\Table;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->latest()->paginate(10);
        $data= DB::table('customers')
            ->join('products','customers.id','=','products.customer_id')
            ->select('customers.*','products.*')
            ->paginate(10);
        return view('product.index', compact('data'));
    }


    public function create()
    {
        $customers=Customer::orderBy('customer_name', 'ASC')->get();
        $selectedCustomer=DB::table('products')->select('customer_id')->get();
        return view('product.create',compact('customers'));

    }


    public function Store(Request $request)
    {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['product_name'] = $request->product_name;
        $data['product_number'] = $request->product_number;
        $data['details'] = $request->details;
        $data['one_price'] = $request->one_price;
        $data['total_price'] = $request->total_price;
        $data['order_time'] = $request->order_time;
        $data['dead_line'] = $request->dead_line;
        $data['status'] = $request->status;
        $data['total_price'] =DB::raw('product_number * one_price');

        $product = DB::table('products')->insert($data);
        return redirect()->route('product.index')->with('success', 'Elave Olundu');
    }

    public function Edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data= DB::table('customers')
            ->join('products','customers.id','=','products.customer_id')
            ->select('customers.*','products.*')
            ->first();
        return view('product.edit', compact('product','data'));
    }

    public function Update(Request $request, $id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_number'] = $request->product_number;
        $data['details'] = $request->details;
        $data['one_price'] = $request->one_price;
        $data['total_price'] = $request->total_price;
        $data['order_time'] = $request->order_time;
        $data['dead_line'] = $request->dead_line;
        $data['status'] = $request->status;
        $data['total_price'] =DB::raw('product_number * one_price');
        $product =  DB::table('customers')
            ->join('products','customers.id','=','products.customer_id')
            ->select('customers.*','products.*')->where('products.id', $id)->update($data);
        return redirect()->route('product.index')->with('error', 'Duzelis Olundu');
    }

    public function Delete($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        $product = DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product.index')->with('danger', 'Silindi');

    }

    public function Show($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        $all= DB::table('customers')
            ->join('products','customers.id','=','products.customer_id')
            ->select('customers.*','products.*')
            ->first();
        return view('product.show',compact('data','all'));
    }



}
