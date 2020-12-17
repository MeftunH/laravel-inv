@extends('layouts.app')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Is Elave Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('salaries.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{route('salaries.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Tikdiyi mal:</strong>
                    <input type="text" name="sal_name" class="form-control"
                           placeholder="Malin adini bura daxil edin ">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Malin Ededi:</strong>
                    <input type="text" name="number" class="form-control"
                           placeholder="Malin ededini bura daxil edin ">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Bir Ededin Qiymeti:</strong>
                    <input type="text" name="sal_one_price" class="form-control"
                           placeholder="Qiymeti bura daxil edin ">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <label for="employes_id">Isci Adi</label>
                    <select name="employes_id" id="employes_id" class="form control input-sm">
                        @foreach($employes as $emp)
                            <option
                                value="{{$emp->id}}">
                                {{$emp->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div  class="form-group">
                    <strong>Elaveler:</strong>
                    <textarea name="sal_detail" rows="5" cols="40" class="form-control"
                              placeholder="Elave veya detallari bura daxil edin ">
            </textarea>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Verilmis mebleg:</strong>
                    <input type="text" name="paid" class="form-control"
                           placeholder="Odenilmis meblegi bura daxil edin.(Bos buraxilabiler) ">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <div  class="form-group">
                    <strong>Sifaris Tarixi:</strong>
                    <input type="date" id="date" name="date"
                           value="today"
                           min="2018-01-01" max="2025-12-31">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>

        </div>
    </form>
@endsection
