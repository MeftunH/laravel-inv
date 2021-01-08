@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-lg-1 margin-tb" style="margin-top: 5px;">

            <select onchange="window.location='<?php echo URL::to( Request::path());?>'+this.options[this.selectedIndex].value" name="months" class="form-control">
                <option selected disabled>Ay sec</option>

                @foreach ($month as $months)

                    <option id="months{{$months->id}}" value="?months={{( $months->id) }}"
                            @if(request('months')==$months->id) selected @endif
                    > {{ $months->name }} </option>
                @endforeach

            </select>
        </div>
    </div>
        <br/>
        <div class="container">
            <div class="row">
        <label>Sifarisler toplam:</label>
        <div class="col-sm">

            <input type="text" readonly  name="total" class="form-control margin-tbr"
                   @if(request('months')==NULL)
                   value={{$pro_sum=DB::Table('products')->sum('total_price')}} AZN
                   @else
                   value={{$pro_sum=DB::Table('products')->whereMonth('order_time', request('months') ?? '')->sum('total_price')}} AZN
                @endif
            >

        </div>
        <label>Musterilerin odedikleri toplam:</label>
        <div class="col-sm">
            @if(request('months')==NULL)
                <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$pro_sum_paid=DB::Table('products')->sum('paid')}} AZN>
            @else
                <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$pro_sum_paid=DB::Table('products')->whereMonth('order_time', request('months') ?? '')->sum('paid')}} AZN>
            @endif
        </div>
        <label>Musteri odenisleri qalan:</label>
        <div class="col-sm">

            <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$pro_sum_amount=$pro_sum-$pro_sum_paid}} AZN>

        </div>
    </div>
</div>
<br/>
<div class="container">
    <div class="row">
        <label>Xercler toplam:</label>
        <div class="col-sm">

            <input type="text" readonly  name="total" class="form-control margin-tbr"
                   @if(request('months')==NULL)
                   value={{$exp_sum=DB::Table('expenses')->sum('exp_total_price')}} AZN
                   @else
                   value={{$exp_sum=DB::Table('expenses')->where('date_id', request('months') ?? '')->sum('exp_total_price')}} AZN
                @endif
            >
        </div>
        <label>Xercler odenilen:</label>
        <div class="col-sm">
            @if(request('months')==NULL)
                <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$exp_sum_paid=DB::Table('expenses')->sum('paid')}} AZN>
            @else
                <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$exp_sum_paid=DB::Table('expenses')->where('date_id', request('months') ?? '')->sum('paid')}} AZN>
            @endif
        </div>
        <label>Xercler qalan:</label>
        <div class="col-sm">
            <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$exp_sum_amount=$exp_sum-$exp_sum_paid}} AZN>

        </div>
    </div>
</div>
<br/>
    <div class="container">
        <div class="row">
            <label>Maaslar toplam:</label>
            <div class="col-sm">

                <input type="text" readonly  name="total" class="form-control margin-tbr"
                       @if(request('months')==NULL)
                       value={{$sal_sum=DB::Table('salaries')->sum('sal_total_price')}} AZN
                       @else
                       value={{$sal_sum=DB::Table('salaries')->where('date_id', request('months') ?? '')->sum('sal_total_price')}} AZN
                    @endif
                >
            </div>
            <label>Maaslar odenilen:</label>
            <div class="col-sm">
                @if(request('months')==NULL)
                    <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$sal_sum_paid=DB::Table('salaries')->sum('paid')}} AZN>
                @else
                    <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$sal_sum_paid=DB::Table('salaries')->where('date_id', request('months') ?? '')->sum('paid')}} AZN>
                @endif
            </div>
            <label>Maaslar qalan:</label>
            <div class="col-sm">
                <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$sal_sum_amount=$sal_sum-$sal_sum_paid}} AZN>

            </div>
        </div>
    </div>
    <br/>
    <div class="container">
        <br/>
        <div class="d-flex justify-content-center">
            <h1><p>KASSA</p></h1>
        </div>
        <br/>
        <div class="row">
            <label>Toplam gelir:</label>
            <div class="col-sm">

                <input type="text" readonly  name="total" class="form-control margin-tbr"
                       @if(request('months')==NULL)
                       value={{$pro_sum}} AZN
                       @else
                       value={{$pro_sum}} AZN
                    @endif
                >
            </div>
            <label>Toplam cixan:</label>
            <div class="col-sm">
                @if(request('months')==NULL)
                    <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$sal_sum+$exp_sum}} AZN>
                @else
                    <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$sal_sum+$exp_sum}} AZN>
                @endif
            </div>
            <label>Balans:</label>
            <div class="col-sm">
                @if($pro_sum-($sal_sum+$exp_sum)>=0)
                <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$sum_amount=$pro_sum-($sal_sum+$exp_sum)}} AZN>
                @endif
                    @if($pro_sum-($sal_sum+$exp_sum)<0)
                        <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$sum_amount=$pro_sum-($sal_sum+$exp_sum)}} AZN>
                    @endif
            </div>
        </div>
    </div>
    </div>
@endsection
