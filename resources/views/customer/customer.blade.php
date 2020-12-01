@extends('customer.layout')
@section('content')
<br>
    <div class="">
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('create.customer')}}">Yeni Musteri elave et</a>

        </div>
        <h3>Musteriler Siyahisi</h3>
        <table class="table table-bordered col-md-4" style="margin-left: auto;margin-right: auto",>
            <tr>
                <th width="20px"  style="text-align:center">
                    Musteri Adi
                </th>
                <th width="10px"  style="text-align:center">
                    Musteri Telefonu
                </th>
                <th width="10px"  style="text-align:center">
                   Hereketler
                </th>
            </tr>
        @foreach($data as $item)
            <tr>
                <td  style="text-align:center">
                    <a href="{{route('customerproduct', ['id' => $item->id])}}">{{$item->customer_name}} </a>
                </td>
                <td  style="text-align:center">
                    <a href="{{route('customerproduct', ['id' => $item->id])}}">{{$item->customer_phone}} </a>
                </td>
                <td>
                    <a class="btn btn-info" href="{{URL::to('/customerproduct/' .$item->id) }}">Goster</a>
                    <a class="btn btn-primary" href="{{URL::to('edit/customer/' .$item->id) }}">Duzelis Et</a>
                    <a class="btn btn-danger" href="{{URL::to('delete/customer/' .$item->id) }}"
                       onclick="return confirm('Musteri silindiyi teqdirde onun verdiyi butun sifarisler de silinecekdir.Silmek istediyinize eminsiniz?')">Sil</a>
                </td>
            </tr>

        @endforeach
        </table>
    </div>
{!! $data->links() !!}
@endsection
