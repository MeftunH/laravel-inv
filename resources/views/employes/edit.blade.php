@extends('layouts.app')
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Iscide Duzelis Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('employes.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{url('update/employes/'.$employes->id)}}" method="POST" >
        @csrf
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Iscinim Adi:</strong>
                <input type="text" name="name" class="form-control"
                       value="{{$employes->name}}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Iscinim Soyadi:</strong>
                <input type="text" name="surname" class="form-control"
                       value="{{$employes->surname}}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div  class="form-group">
                <strong>Iscinin Telefon Nomresi:</strong>
                <input type="text" name="phone" class="form-control"
                       value="{{$employes->phone}}">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Iscinin Vezifesi:</strong>
                    <input type="text" name="department" class="form-control"
                           value="{{$employes->department}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>
            </div>
    </form>
@endsection
