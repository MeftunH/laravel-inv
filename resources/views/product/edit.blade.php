@extends('product.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Verilen Sifarisde Duzelis Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('product.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{url('update/product/'.$product->id)}} " method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Malin Adi:</strong>
                    <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Musteri Adi:</strong>
                    <input type="text" name="customer_name" class="form-control"
                           value="{{$data->customer_name}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Musteri Telefon Nomresi:</strong>
                    <input type="text" name="customer_phone" class="form-control"
                           value="{{$data->customer_phone}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6" >
                <div  class="form-group">
                    <strong>Malin Ededi:</strong>
                    <input type="text" name="product_number" class="form-control"
                           value="{{$product->product_number}}">
                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Malin qiymeti(1 eded):</strong>
                    <input type="text" name="one_price" class="form-control"
                           value="{{$product->one_price}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div  class="form-group">
                    <strong>Elaveler:</strong>
                    <textarea name="details" rows="5" cols="40" class="form-control">
                             {{$product->details}}
            </textarea>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;border-width: 2px">
                <div  class="form-group">
                    <strong>Sifaris Tarixi:</strong>
                    <input type="date" id="start" name="order_time"
                           value="{{$product->order_time}}"
                           min="2018-01-01" max="2025-12-31">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <div  class="form-group">
                    <strong>Catdirilmasi Tarixi:</strong>
                    <input type="date" id="deadline" name="dead_line"
                           value="{{$product->dead_line}}"
                           min="2018-01-01" max="2025-12-31">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <strong> Status:</strong>
                <select class="form-control" name="status" id="status">
                    <option value="1" @if (old('status') == 1) selected @endif>Davam edir</option>
                    <option value="0" @if (old('status') == 0) selected @endif>Sifaris tamamlandi</option>
                </select>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>

        </div>
    </form>
@endsection
