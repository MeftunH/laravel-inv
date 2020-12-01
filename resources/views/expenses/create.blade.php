@extends('expenses.layout')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sifaris Elave Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('expenses.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{route('expenses.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Xercin Adi:</strong>
                    <input type="text" name="exp_name" class="form-control"
                           placeholder="Xerc adini daxil et ">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Xercin Deyeri(bir eded ucun):</strong>
                    <input type="text" name="exp_one_price" class="form-control"
                           placeholder="Cixan Xerci bura daxil edin ">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Eded:</strong>
                    <input type="text" name="exp_number" class="form-control"
                           placeholder="Edei daxil edin ">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Odenilmis mebleg:</strong>
                    <input type="text" name="paid" class="form-control"
                           placeholder="Odenilmis meblegi bura daxil edin.(Bos buraxilabiler) ">
                </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div  class="form-group">
                    <strong>Elaveler:</strong>
                    <textarea name="exp_detail" rows="5" cols="40" class="form-control"
                              placeholder="Elave veya detallari bura daxil edin ">
            </textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <div  class="form-group">
                    <strong>Tarix:</strong>
                    <input type="date" id="start" name="date"
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
