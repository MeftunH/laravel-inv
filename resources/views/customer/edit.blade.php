@extends('customer.layout')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Musteride Duzelis Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('customer.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{url('update/'.$customer->id)}} " method="POST">
  @csrf
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Musteri Adi:</strong>
                    <input type="text" name="customer_name" class="form-control"
                           value="{{$customer->customer_name}}">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Musteri Telefon Nomresi:</strong>
                    <input type="text" name="customer_phone" class="form-control"
                           value="{{$customer->customer_phone}}">
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>

        </div>
    </form>
@endsection
