<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{

    function index()
    {
        $data= DB::Table('customers')->paginate(10);
        return view('customer.customer',['data'=>$data]);
    }

    function view()
    {
        $data= DB::Table('customers')->paginate(10);
        return view('customer.customer',['data'=>$data]);
    }

    public function create()
    {

        return view('customer.create');

    }


    public function Store(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $product = DB::table('customers')->insert($data);
        return redirect()->route('customer.index')->with('success', 'Musteri Elave Olundu');
    }

    public function Edit($id)
    {
        $customer=Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function Update(Request $request,$id)
    {

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $customers=DB::table('customers')->select('customers.*')->where('customers.id',$id)->update($data);
        return redirect()->route('customer.index')->with('error', 'Duzelis Olundu');
    }

    public function Delete($id)
    {
        $data = DB::table('customers')->where('id', $id)->first();
        $product = DB::table('customers')->where('id', $id)->delete();
        return redirect()->route('customer.index')->with('danger', 'Silindi');

    }
}
