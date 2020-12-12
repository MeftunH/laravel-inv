@extends('layouts.app')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Isci Elave Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('employes.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{route('employes.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Isci Adi:</strong>
                    <input type="text" name="employe_name" class="form-control"
                           placeholder="Isci adini bura daxil edin ">
                </div>
            </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div  class="form-group">
                        <strong>Isci soyadi:</strong>
                        <input type="text" name="employe_surname" class="form-control"
                               placeholder="Isci soyadini bura daxil edin.Bos buraxilebiler">
                    </div>
                </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Isci Nomresi:</strong>
                    <input type="text" name="phone" class="form-control"
                           placeholder="Musteri Nomresini bura daxil edin ">
                </div>
            </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div  class="form-group">
                        <strong>Vezifesi</strong>
                        <input type="text" name="department" class="form-control"
                               placeholder="Vezifeni bura daxil edin ">
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>

        </div>
    </form>
@endsection
