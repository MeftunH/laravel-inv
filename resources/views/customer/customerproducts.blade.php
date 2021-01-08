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
    <div class="col-md-2">
        <label>Toplam Mebleg:</label>
        <input type="text" readonly  name="total" class="form-control margin-tbr" value={{$pro_sum}}AZN>

    </div>

    <div class="col-md-2">
        <label>Musterinin Toplam Odenisi:</label>
        <input type="text" readonly  style="color:green;" name="total" class="form-control margin-tbr" value={{$pro_sum_paid}}AZN>
    </div>

    <div class="col-md-2">
        <label>Musterinin Qalan borcu:</label>
        <input type="text" readonly  style="color:red;" name="total" class="form-control margin-tbr" value={{$pro_sum_amount=$pro_sum-$pro_sum_paid}}AZN>

    </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>Musterinin verdiyi sifarisler </h2>

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('create.product')}}">Yeni sifaris elave et</a>
                <a class="btn btn-info" href="{{route('customer.index')}}">Geri get</a>
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
                Musteri Adi
            </th>

            <th width="10%">
                Sifaris verdiyi malin adi
            </th>


            <th width="15%">
                Musterinin Telefonu
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
            <th width="10%">
                Sifaris Verildiyi Tarix
            </th>

            <th width="10%">
                Texmini Cixis Tarixi
            </th>

            <th width="10%">
                Status
            </th>
        </tr>
        <?php
        function time_elapsed_string($ptime)
        {
            $etime = time() - $ptime;

            if ($etime < 1)
            {
                return '0 seconds';
            }

            $a = array( 365 * 24 * 60 * 60  =>  'il',
                30 * 24 * 60 * 60  =>  'ay',
                24 * 60 * 60  =>  'gun',
                60 * 60  =>  'saat',
                60  =>  'deqiqe',
                1  =>  'saniye'
            );
            $a_plural = array( 'il'   => 'il',
                'ay'  => 'ay',
                'gun'    => 'gun',
                'saat'   => 'saat',
                'deqiqe' => 'deqiqe',
                'saniye' => 'saniye'
            );

            foreach ($a as $secs => $str)
            {
                $d = $etime / $secs;
                if ($d >= 1)
                {
                    $r = round($d);
                    return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' evvel';
                }
            }
        }
        ?>
        @foreach($data as $pro)
            <tr>
                <td>
                    {{$pro->customer_name}}
                </td>

                <td>
                    {{$pro->product_name}}
                </td>

                <td>
                    {{$pro->customer_phone}}
                </td>

                <td>
                    {{$pro->product_number}}
                </td>

                <td>
                    {{$pro->one_price}}
                </td>

                <td>
                    {{$pro->total_price}}
                </td>
                <td>
                    <p> {{$pro->paid}} AZN</p>
                </td>
                <td>
                    <p hidden>
                        {{$pro->amount=$pro->total_price-$pro->paid}}
                    </p>
                    @if($pro->amount==0)

                        <p style="color:green;">Tam Odenis</p>

                    @endif
                    @if($pro->amount!=0)

                        <p style="color:red;">{{$pro->amount}} AZN</p>

                    @endif
                </td>


                <td>
                    {{$pro->details}}
                </td>


                <td>
                    {{$pro->order_time}}
                </td>

                <td>
                    {{$pro->dead_line}}
                </td>
                <p hidden>

                    {{ $startTime = strtotime($pro->dead_line)}}
                    {{  $time = date("Y-m-d",$startTime)}}
                    {{ $mytime = Carbon\Carbon::now()}}</p>
                @if($time<$mytime&&$pro->status!=0)
                    <td>
                     <span class="present" style="background:#f00;display:block; height: 100%; width:100%;color: #2a9055">
                      {{time_elapsed_string($startTime)}}
                     </span>
                    </td>
                @elseif($pro->status==1)
                    <td>
                <span class="present" style="background:#ff0;display:block; width:100%;">
                Davam edir
                </span>
                    </td>



                @elseif($pro->status==0)
                    <td>
                    <span class="present" style="background:#2a9055;display:block; width:100%;">
                   Sifaris tamamlandi
                    </span>
                    </td>
                @endif

                @endforeach
            </tr>
    </table>
@endsection
