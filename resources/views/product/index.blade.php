@extends('product.layout')
@section('content')
    <br><br><br>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
    <h2>Gelen Sifarisler</h2>
</div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{route('create.product')}}">Yeni sifaris elave et</a>

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
                Malin Adi
            </th>


            <th width="10%">
                Musteri Adi
            </th>

            <th width="15%">
                Musterinin Telefonu
            </th>
            <th width="5%">
                Malin Sayi
            </th>
            <th width="5%">
                Bir Ededin Qiymeti
            </th>

            <th width="5%">
                Sifarisin Toplam Meblegi
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
            <th width="30%">
                Hereketler
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
                {{$pro->product_name}}
            </td>
            <td>
                {{$pro->customer_name}}
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
            <td>

            <a class="btn btn-primary" href="{{URL::to('edit/product/' .$pro->id) }}">Duzelis Et</a>

                <a class="btn btn-danger" href="{{URL::to('delete/product/' .$pro->id) }}"
            onclick="return confirm('Silmek istediyinize eminsiniz?')">Sil</a>
            </td>
            @endforeach
        </tr>
    </table>
    {!! $data->links() !!}
@endsection
