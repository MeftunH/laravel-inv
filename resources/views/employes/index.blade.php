@extends('layouts.app')
@section('content')
    <br>
    <div class="">
        <div class="pull-right">
            @role('admin')
            <a class="btn btn-success" href="{{route('create.employes')}}">Yeni Isci elave et</a>
            @endrole
        </div>
        <h3>Isci Siyahisi</h3>
        <table class="table table-bordered col-md-4" style="margin-left: auto;margin-right: auto",>
            <tr>
                <th width="20px"  style="text-align:center">
                    Isci Adi
                </th>
                <th width="10px"  style="text-align:center">
                    Isci Soyadi
                </th>
                <th width="10px"  style="text-align:center">
                    Telefon nomresi
                </th>
                <th width="10px"  style="text-align:center">
                Vezifesi
                </th>

                <th width="10px"  style="text-align:center">
                    Hereketler
                </th>

            </tr>
            @foreach($data as $item)
                <tr>
                    <td  style="text-align:center">
                        {{$item->name}}
                    </td>
                    <td  style="text-align:center">
                        <a href="{{route('customerproduct', ['id' => $item->id])}}">{{$item->surname}} </a>

                    </td>
                    <td  style="text-align:center">
                        <a href="{{route('customerproduct', ['id' => $item->id])}}">{{$item->phone}} </a>
                    </td>
                    <td  style="text-align:center">
                        <a href="{{route('customerproduct', ['id' => $item->id])}}">{{$item->department}} </a>
                    </td>

                    <td>
                        <a class="btn btn-info" href="{{URL::to('/employessalaries/' .$item->id) }}">Goster</a>
                        @role('admin')
                        <a class="btn btn-primary" href="{{URL::to('editemp/' .$item->id) }}">Duzelis Et</a>
                        <a class="btn btn-danger" href="{{URL::to('delete/employes/' .$item->id) }}"
                           onclick="return confirm('Musteri silindiyi teqdirde onun verdiyi butun sifarisler de silinecekdir.Silmek istediyinize eminsiniz?')">Sil</a>
                        @endrole
                    </td>

                </tr>

            @endforeach
        </table>
    </div>
    {!! $data->links() !!}
@endsection
