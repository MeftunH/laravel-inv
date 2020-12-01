@extends('product.layout')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Musteri Elave Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('customer.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{route('customer.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Musteri Adi:</strong>
                    <input type="text" name="customer_name" class="form-control"
                           placeholder="Musteri adini bura daxil edin ">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Musteri Nomresi:</strong>
                    <input type="text" name="customer_phone" class="form-control"
                           placeholder="Musteri Nomresini bura daxil edin ">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>

        </div>
    </form>
@endsection
