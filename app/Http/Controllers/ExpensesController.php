<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Expenses;
use Illuminate\Http\Request;
use DB;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data= DB::Table('expenses')  ->whereMonth('date', '09')->paginate(10);
        $data= DB::Table('expenses')->paginate(10);

        return view('expenses.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['exp_name'] = $request->exp_name;
        $data['exp_one_price'] = $request->exp_one_price;
        $data['exp_number'] = $request->exp_number;
        $data['exp_total_price'] = $request->exp_total_price;
        $data['paid'] = $request->paid;
        $data['amount'] = $request->amount;
        $data['exp_detail'] = $request->exp_detail;
        $data['date']=$request->date;
        $data['exp_total_price'] =DB::raw('exp_number * exp_one_price');
        $data['amount'] =DB::raw('exp_total_price-amount');
        $product = DB::table('expenses')->insert($data);
        return redirect()->route('expenses.index')->with('success', 'Elave Olundu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expenses=Expenses::find($id);
        return view('expenses.edit', compact('expenses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request, $id)
    {
        $data= array();
        $data['exp_name'] = $request->exp_name;
        $data['exp_one_price'] = $request->exp_one_price;
        $data['exp_number'] = $request->exp_number;
        $data['paid'] = $request->paid;
        $data['amount'] = $request->amount;
        $data['exp_detail'] = $request->exp_detail;
        $data['date']=$request->date;
        $data['exp_total_price'] =DB::raw('exp_number * exp_one_price');
        $data['amount'] =DB::raw('exp_total_price-amount');
        if($request['all']) {
            $data['paid']=$data['exp_total_price'];
        }
        $expenses=DB::table('expenses')->select('expenses.*')->where('expenses.id',$id)->update($data);
        return redirect()->route('expenses.index')->with('error', 'Duzelis Olundu');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function Delete($id)
    {
        $data = DB::table('expenses')->where('id', $id)->first();
        $expenses = DB::table('expenses')->where('id', $id)->delete();
        return redirect()->route('expenses.index')->with('danger', 'Silindi');
    }
}
