@extends('expenses.layout')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Musteride Duzelis Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('expenses.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{url('update/expenses/'.$expenses->id)}} " method="POST">
        @csrf
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Xerc Adi:</strong>
                <input type="text" name="exp_name" class="form-control"
                       value="{{$expenses->exp_name}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Xercin Deyeri(bir eded ucun):</strong>
                <input type="text" name="exp_one_price" class="form-control"
                       value="{{$expenses->exp_one_price}}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Eded:</strong>
                <input type="text" name="exp_number" class="form-control"
                       value="{{$expenses->exp_number}}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Toplam Mebleg:</strong>
                <input type="text" name="exp_total_price" class="form-control" readonly
                       value="{{$expenses->exp_total_price}}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Odenilmis Mebleg:</strong>
                <input type="text" name="paid" class="form-control"
                       value="{{$expenses->paid}}">
            </div>
        </div>


        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Musteri Telefon Nomresi:</strong>
                <textarea name="exp_detail" rows="5" cols="40" class="form-control">
                             {{$expenses->exp_detail}}
            </textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;border-width: 2px">
            <div  class="form-group">
                <strong>Tarix:</strong>
                <input type="date" id="start" name="date"
                       value="{{$expenses->date}}"
                       min="2018-01-01" max="2025-12-31">
            </div>
        </div>

            <div class="col-md-6 offset-md-4">
                <div class="form-group row">
                <div class="checkbox">
                        <input type="checkbox" class="form-check-input" name="all" id="" value="1"> Hamisi Odenilib
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>
    </form>
@endsection
