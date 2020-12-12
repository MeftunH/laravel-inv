@extends('layouts.app')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sifaris Elave Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('product.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{route('product.store')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Malin Adi:</strong>
                <input type="text" name="product_name" class="form-control"
                       placeholder="Malin adini bura daxil edin ">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
        <div  class="form-group">
                <strong>Malin Ededi:</strong>
                <input type="text" name="product_number" class="form-control"
                       placeholder="Malin ededini bura daxil edin ">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
        <div  class="form-group">
            <label for="customer_id">Musteri Adi</label>
           <select name="customer_id" id="customer_id" class="form control input-sm">
          @foreach($customers as $cst)
              <option
                  value="{{$cst->id}}">
                  {{$cst->customer_name}}</option>
               @endforeach
           </select>
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div  class="form-group">
            <strong>Elaveler:</strong>
            <textarea name="details" rows="5" cols="40" class="form-control"
                   placeholder="Elave veya detallari bura daxil edin ">
            </textarea>
        </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Malin bir ededinin qiymeti:</strong>
                <input type="text" name="one_price" class="form-control">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Odenilmis mebleg:</strong>
                <input type="text" name="paid" class="form-control"
                       placeholder="Odenilmis meblegi bura daxil edin.(Bos buraxilabiler) ">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
            <div  class="form-group">
                <strong>Sifaris Tarixi:</strong>
                <input type="date" id="start" name="order_time"
                       value="today"
                       min="2018-01-01" max="2025-12-31">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
            <div  class="form-group">
                <strong>Catdirilmasi Tarixi:</strong>
                <input type="date" id="start" name="dead_line"
                       value="today"
                       min="2018-01-01" max="2025-12-31">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <strong> Status:</strong>
                <select class="form-control" name="status" id="status">
                    <option  value="1"  @if (old('status') == 1) selected @endif>Davam edir</option>
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
