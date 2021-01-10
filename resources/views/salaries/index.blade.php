@extends('layouts.app')
@section('content')
    <br><br>
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
        </div> <label>Toplam Xerc:</label>
        <div class="col-md-2">

            <input type="text" readonly  name="total" class="form-control margin-tbr"
                   @if(request('months')==NULL)
                   value={{$sal_sum=DB::Table('salaries')->sum('sal_total_price')}}AZN
                   @else
                   value={{$sal_sum=DB::Table('salaries')->whereMonth('date', request('months') ?? '')->sum('sal_total_price')}}AZN
                @endif
            >

        </div>
        <label>Toplam Odenis:</label>
        <div class="col-md-2">
            @if(request('months')==NULL)
                <input type="text" readonly  style="color:green;" name="sal_total" class="form-control margin-tbr" value={{$sal_sum_paid=DB::Table('salaries')->sum('paid')}}AZN>
            @else
                <input type="text" readonly  style="color:green;" name="sal_total" class="form-control margin-tbr" value={{$sal_sum_paid=DB::Table('salaries')->whereMonth('date', request('months') ?? '')->sum('paid')}}AZN>
            @endif
        </div>
        <label>Toplam qalan:</label>
        <div class="col-md-2">

            <input type="text" readonly  style="color:red;" name="sal_total" class="form-control margin-tbr" value={{$sal_sum_amount=$sal_sum-$sal_sum_paid}}AZN>

 </div>
 </div>
    <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Maaslar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('create.salaries')}}">Yeni is elave et</a>

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
                Tikdiyi mal
            </th>

            <th width="10%">
                Iscinin Adi
            </th>

            <th width="15%">
                Iscinin Telefonu
            </th>
            <th width="5%">
                Malin Sayi
            </th>
            <th width="5%">
                Bir Ededin Qiymeti
            </th>
            <th width="10%">
                Toplam qiymet
            </th>
            <th width="10%">
                Verilmis Pul
            </th>
            <th width="15%">
                Qalan
            </th>

            <th width="15%">
                Elaveler
            </th>
            <th width="10%">
                Tarix
            </th>
            @role('admin')
            <th width="30%">
                Hereketler
            </th>
            @endrole
        </tr>

        @foreach($data as $sal)
            <tr>
                <td>
                    {{$sal->sal_name}}
                </td>
                <td>
                    {{$sal->name}}
                </td>
                <td>
                    {{$sal->phone}}
                </td>

                <td>
                    {{$sal->number}}
                </td>
                <td>
                    <p>{{$sal->sal_one_price}} AZN</p>
                </td>

                <td>
                   <p>{{$sal->sal_total_price}} AZN</p>
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
                @role('admin')
                <td>
                    <a class="btn btn-primary" href="{{URL::to('edit/salaries/' .$sal->id) }}">Duzelis Et</a>

                    <a class="btn btn-danger" href="{{URL::to('del/salaries/'.$sal->id) }}"
                       onclick="return confirm('Silmek istediyinize eminsiniz?')">Sil</a>
                </td>
                @endrole
                @endforeach
            </tr>
    </table>
    {!! $data->links() !!}
@endsection
