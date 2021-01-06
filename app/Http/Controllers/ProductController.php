<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Product;
use DB;
use mysql_xdevapi\Table;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = DB::table('products')->latest()->paginate(10);
        $data= DB::table('customers')
            ->join('products','customers.id','=','products.customer_id')
            ->select('customers.*','products.*')
            ->paginate(10);
        $month=DB::Table('month')->get();
        $req=$request['months'];
        if($request['months'])
        {
            $data= DB::table('customers')
                ->join('products','customers.id','=','products.customer_id')
                ->select('customers.*','products.*')->where('products.date_id',$request['months'])
                ->paginate(10);

        }
        return view('product.index',['data'=>$data],['month'=>$month]);
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
        $data['paid'] = $request->paid;
        $data['amount'] = $request->amount;
        $data['amount'] =DB::raw('total_price-amount');
        $data['status'] = $request->status;
        $data['total_price'] =DB::raw('product_number * one_price');
        $pieces = explode("-",$data['order_time']);
        $data['date_id']=$pieces[1];
        $product = DB::table('products')->insert($data);
        return redirect()->route('product.index')->with('success', 'Elave Olundu');
    }

    public function Edit($id,Request $request)
    {

        $product = DB::table('products')->where('id', $id)->first();
        $customer=Customer::orderBy('customer_name', 'ASC')->get();
        $data= DB::table('customers')
            ->join('products','customers.id','=','products.customer_id')
            ->select('customers.*','products.*')
            ->first();
        // dd($customer);

        return view('product.edit', compact('product','data','customer','cst'));
    }

    public function Update(Request $request, $id)
    {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['product_name'] = $request->product_name;
        $data['product_number'] = $request->product_number;
        $data['details'] = $request->details;
        $data['one_price'] = $request->one_price;
        $data['paid'] = $request->paid;
        $data['amount'] = $request->amount;
        $data['total_price'] = $request->total_price;
        $data['order_time'] = $request->order_time;
        $data['dead_line'] = $request->dead_line;
        $data['status'] = $request->status;
        $data['amount'] =DB::raw('total_price-amount');
        $pieces = explode("-",$data['order_time']);
        $data['date_id']=$pieces[1];
        $data['total_price'] =DB::raw('product_number * one_price');

        $product =  DB::table('customers')
            ->join('products','customers.id','=','products.customer_id')
            ->select('customers.*','products.*')->where('products.id', $id)->update($data);
        //dd($product);
        dd($data);
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
