@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Verilen Sifarisde Duzelis Et</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('salaries.index')}}">Geri get</a>

            </div>

        </div>
    </div>

    <form action="{{url('update/salaries/'.$salaries->id)}} " method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Tikdiyi Malin Adi:</strong>
                    <input type="text" name="sal_name" class="form-control" value="{{$data->sal_name}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <label for="name">Iscinin Adi</label>
                    <select name="employes_id" id="employes_id" class="form control input-sm">
                        @foreach($emp as $empln)
                            <option value="{{$empln->id}}"
                              {{ $salaries->employes_id==$empln->id ?'selected="selected"' : '' }}
                                    > {{$empln->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Iscinin Telefon Nomresi:</strong>
                    <input type="text" name="phone" class="form-control"
                           value="{{$data->phone}}">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Malin qiymeti(1 eded):</strong>
                    <input type="text" name="sal_one_price" class="form-control"
                           value="{{$data->sal_one_price}}">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6" >
                <div  class="form-group">
                    <strong>Malin Ededi:</strong>
                    <input type="text" name="number" class="form-control"
                           value="{{$data->number}}">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div  class="form-group">
                    <strong>Odenilmis Mebleg:</strong>
                    <input type="text" name="paid" class="form-control"
                           value="{{$data->paid}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div  class="form-group">
                    <strong>Elaveler:</strong>
                    <textarea name="sal_detail" rows="5" cols="40" class="form-control">
                             {{$data->sal_detail}}
            </textarea>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;border-width: 2px">
                <div  class="form-group">
                    <strong>Tarix:</strong>
                    <input type="date" id="date" name="date"
                           value="{{$data->date}}"
                           min="2018-01-01" max="2025-12-31">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Qebul Et</button>
            </div>

        </div>
    </form>
@endsection
