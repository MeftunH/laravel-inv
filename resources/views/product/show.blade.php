@extends('product.layout')
@section('content')
    <br><br><br>
    <div class="row" >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sifarisi Goster</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('product.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <div class="row" style="text-align: center">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Malin Adi:</strong>
    {{$data->product_name}}

    </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Malin Ededi:</strong>
                {{$data->product_number}}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Musteri Adi:</strong>
                {{$all->customer_name}}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Musteri Telefon Nomresi:</strong>
                {{$all->customer_phone}}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Elaveler:</strong>
                {{$data->details}}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Malin qiymeti:</strong>
                {{$data->price}}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sifaris Tarixi:</strong>
                {{$data->order_time}}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Catdirilma Tarixi:</strong>
                {{$data->dead_line}}

            </div>
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
            <p hidden>

                {{ $startTime = strtotime($data->dead_line)}}
                {{  $time = date("Y-m-d",$startTime)}}
                {{ $mytime = Carbon\Carbon::now()}}</p>
            @if($time<$mytime&&$data->status!=0)
                <td>
                     <span class="present" style="background:#f00;display:block; height: 100%; width:100%;color: #2a9055">
                      {{time_elapsed_string($startTime)}}
                     </span>
                </td>
            @elseif($data->status==1)
                <td>
                <span class="present" style="background:#ff0;display:block; width:100%;">
                Davam edir
                </span>
                </td>



            @elseif($data->status==0)
                <td>
                    <span class="present" style="background:#2a9055;display:block; width:100%;">
                   Sifaris tamamlandi
                    </span>
                </td>
            @endif
        </div>
@endsection
