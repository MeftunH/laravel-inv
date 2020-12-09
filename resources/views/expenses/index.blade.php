@extends('expenses.layout')
@section('content')
    @include('expenses.myjs')
    <br>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous">

            $(document.ready(function ()
            {
              $.ajax(
                  {
                      url:"{{route('search.action')}}",
                      method:'Get',
                      data:{query:query},
                      success:function (data)
                      {
                          $('tbody').html(data.table_data);
                          $('#total_records').text(data.total_data);
                      }
                  })
            }))

        </script>
    </head>

    <div class="row">
    <div class="col-lg-1 margin-tb">

        <select onchange="window.location='<?php echo URL::to( Request::path());?>'+this.options[this.selectedIndex].value" name="months" class="form-control">
            <option selected disabled>Ay sec</option>

            @foreach ($month as $months)
                {{$sum=DB::Table('expenses')->sum('exp_total_price')}}
                <option id="months{{$months->id}}" value="?months={{( $months->id) }}"
                @if(request('months')==$months->id) selected @endif
                > {{ $months->name }} </option>
            @endforeach

    </select>




        </div>
        <div class="col-md-2">
            <label>Toplam Xerc:</label>
            <input type="text" readonly  name="total" class="form-control margin-tbr" value={{$sum=DB::Table('expenses')->whereMonth('date', request('months') ?? '')->sum('exp_total_price')}}AZN>

        </div>

        <div class="col-md-2">
            <label>Toplam Odenilmis:</label>
            <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$sum_paid=DB::Table('expenses')->whereMonth('date', request('months') ?? '')->sum('paid')}}AZN>
        </div>

        <div class="col-md-2">
            <label>Toplam qalan:</label>
            <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$sum_amount=$sum-$sum_paid}}AZN>

    </div>
{{--        <div class="col-md-3 col-md-push-2">--}}
{{--            <div class="pull-right">--}}
{{--            <form action="/search" method="get">--}}
{{--                <div class="input-group">--}}
{{--                    <input type="search" name="search" class="form-control">--}}
{{--                    <span class="input-group-prepend">--}}
{{--                   <button type="submit" class="btn btn-primary">Axtar</button>--}}
{{--               </span>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Xercler</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('create.expenses')}}">Yeni Xerc elave et</a>
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
                Xercin Adi
            </th>

            <th width="5%">
                Xerc Qiymeti(bir eded)
            </th>

            <th width="5%">
                Eded
            </th>

            <th width="5%">
                Xerc Qiymeti
            </th>

            <th width="10%">
                Odenilmis
            </th>

            <th width="15%">
                Qalan mebleg
            </th>

            <th width="15%">
                Elaveler
            </th>
            <th width="15%">
                Tarix
            </th>
            <th width="10px"  style="text-align:center">
                Status
            </th>
            <th width="10px"  style="text-align:center">
                Hereketler
            </th>
        </tr>

        @foreach($data as $exp)
            <tr>

                <td>
                    {{$exp->exp_name}}
                </td>
                <td>
                    {{$exp->exp_one_price}}
                </td>
                <td>
                    {{$exp->exp_number}}
                </td>
                <td>
                    {{$exp->exp_total_price}}
                </td>
                <td>
                    {{$exp->paid}}
                </td>
                <td>
                    {{$exp->amount=$exp->exp_total_price-$exp->paid}}
                </td>

                <td>
                    {{$exp->exp_detail}}
                </td>

                <td>
                    {{date('d M Y  ', strtotime($exp->date))}}
                </td>
                <td>
                    @if($exp->amount==0)

                        <p style="color:green;">Tam Odenis</p>

                        @endif
                        @if($exp->amount!=0)

                            <p style="color:red;">Qalan Mebleg {{$exp->amount}}</p>

                        @endif

                </td>
                <td>
                    <a class="btn btn-info" href="{{URL::to('show/expenses/' .$exp->id) }}">Goster</a>
                    <a class="btn btn-primary" href="{{URL::to('editexp/' .$exp->id) }}">Duzelis Et</a>
                    <a class="btn btn-danger" href="{{URL::to('delete/expenses/' .$exp->id) }}"
                       onclick="return confirm('Silmek istediyinize eminsiniz?')">Sil</a>
                </td>
                @endforeach
            </tr>
    </table>
@endsection


