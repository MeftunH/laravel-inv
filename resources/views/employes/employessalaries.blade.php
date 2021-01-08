@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-1 margin-tb" style="margin-top: 5px">

            <select onchange="window.location='<?php echo URL::to( Request::path());?>'+this.options[this.selectedIndex].value" name="months" class="form-control">
                <option selected disabled>Ay sec</option>

                @foreach ($month as $months)

                    <option id="months{{$months->id}}" value="?months={{( $months->id) }}"
                            @if(request('months')==$months->id) selected @endif
                    > {{ $months->name }} </option>
                @endforeach

            </select>
        </div>
        <label>Toplam Xerc:</label>
        <div class="col-md-2">

            <input type="text" readonly  name="total" class="form-control margin-tbr"
                   @if(request('months')==NULL)
                   value={{$pro_sum}}AZN
                   @else
                   value={{$pro_sum=DB::Table('salaries')->where('salaries.employes_id',$id)->where('salaries.date_id',request('months'))->sum('sal_total_price')}}AZN
                @endif
            >

        </div>
        <label>Toplam Odenis:</label>
        <div class="col-md-2">
            @if(request('months')==NULL)
                <input type="text" readonly  style="color:green;" name="sal_total" class="form-control margin-tbr" value={{$pro_sum_paid}}AZN>
            @else
                <input type="text" readonly  style="color:green;" name="sal_total" class="form-control margin-tbr" value={{ $pro_sum_paid=DB::Table('salaries')->where('salaries.employes_id',$id)->where('salaries.date_id',request('months'))->sum('paid')}}AZN>
            @endif
        </div>
        <label>Toplam qalan:</label>
        <div class="col-md-2">

            <input type="text" readonly  style="color:red;" name="sal_total" class="form-control margin-tbr" value={{$pro_sum_amount=$pro_sum-$pro_sum_paid}}AZN>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>Iscinin gorduyu isler </h2>

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('create.salaries')}}">Yeni sifaris elave et</a>
                <a class="btn btn-info" href="{{route('employes.index')}}">Geri get</a>
            </div>

        </div>
    </div>
    @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @if($message=Session::get('error'))
        <div class="alert alert-warning">
            <p>{{$message}}</p>
        </div>
    @endif

    @if($message=Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered col-md-4" style="border-width: 1px">
        <tr>
            <th width="10%">
                Isci Adi
            </th>

            <th width="10%">
                Isci Soyadi
            </th>

            <th width="10%">
                Isci Telefonu
            </th>

            <th width="10%">
                Vezifesi
            </th>

            <th width="10%">
                Tikdiyi malin adi
            </th>

            <th width="5%">
                Malin Sayi
            </th>

            <th width="5%">
                Malin Bir Ededinin Qiymeti
            </th>

            <th width="5%">
                Malin Toplam Qiymeti
            </th>
            <th width="5%">
                Odenilen
            </th>
            <th width="5%">
                Qalan
            </th>

            <th width="15%">
                Elaveler
            </th>

            <th width="15%">
                Tarix
            </th>
        </tr>

        @foreach($data as $sal)
            <tr>
                <td>
                    {{$sal->name}}
                </td>

                <td>
                    {{$sal->surname}}
                </td>

                <td>
                    {{$sal->phone}}
                </td>

                <td>
                    {{$sal->department}}
                </td>

                <td>
                    {{$sal->sal_name}}
                </td>

                <td>
                    {{$sal->number}}
                </td>

                <td>
                    {{$sal->sal_one_price}} AZN
                </td>

                <td>
                    {{$sal->sal_total_price}} AZN
                </td>

                <td>
                    <p> {{$sal->paid}} AZN</p>
                </td>

                <td>
                    <p hidden>
                        {{$sal->amount=$sal->sal_total_price-$sal->paid}}
                    </p>
                    @if($sal->amount==0)

                        <p style="color:green;">Tam Odenis</p>

                    @endif
                    @if($sal->amount!=0)

                        <p style="color:red;">{{$sal->amount}} AZN</p>

                    @endif
                </td>


                <td>
                    {{$sal->sal_detail}}
                </td>

                <td>
                    {{$sal->date}}
                </td>

                <p hidden>
                @endforeach
            </tr>
    </table>
@endsection
