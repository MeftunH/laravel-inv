@extends('product.layout')
@section('content')
    <br><br><br>

    <select name="month" id="month" class="form-control">
        <option value="jan"  @if (old('month') == "jan") {{ 'selected' }} @endif>Yanvar</option>
        <option value="feb"  @if (old('month') == "feb") {{ 'selected' }} @endif>Fevral</option>
        <option value="mar">Mart</option>
        <option value="apr">Aprel</option>
        <option value="may">May</option>
        <option value="jun">Iyun</option>
        <option value="jul">Iyul</option>
        <option value="aug">Avqust</option>
        <option value="sep">Sentyabr</option>
        <option value="oct">Oktyabr</option>
        <option value="nov">Noyabr</option>
        <option value="dec">Dekabr</option>
    </select>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Xercler</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('create.expenses')}}">Yeni Xerc elave et</a>

            </div>

        </div>
    </div>
    @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @if($message=Session::get('error'))
        <div class="alert alert-warning">
            <p>{{$message}}</p>
        </div>
    @endif

    @if($message=Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered col-md-4" style="border-width: 1px">
        <tr>

            <th width="10%">
                Xercin Adi
            </th>

            <th width="5%">
                Xerc Qiymeti(bir eded)
            </th>

            <th width="5%">
                Eded
            </th>

            <th width="5%">
                Xerc Qiymeti
            </th>

            <th width="10%">
                Odenilmis
            </th>

            <th width="15%">
                Qalan mebleg
            </th>

            <th width="15%">
                Elaveler
            </th>
            <th width="15%">
                Tarix
            </th>
            <th width="10px"  style="text-align:center">
                Status
            </th>
            <th width="10px"  style="text-align:center">
                Hereketler
            </th>


        </tr>
        @foreach($data as $exp)
            <tr>
                <td>
                    {{$exp->exp_name}}
                </td>
                <td>
                    {{$exp->exp_one_price}}
                </td>
                <td>
                    {{$exp->exp_number}}
                </td>
                <td>
                    {{$exp->exp_total_price}}
                </td>
                <td>
                    {{$exp->paid}}
                </td>
                <td>
                    {{$exp->amount=$exp->exp_total_price-$exp->paid}}
                </td>

                <td>
                    {{$exp->exp_detail}}
                </td>
                <td>
                    {{$exp->date}}
                </td>
                <td>
                    @if($exp->amount==0)

                        <p style="color:green;">Tam Odenis</p>

                        @endif
                        @if($exp->amount!=0)

                            <p style="color:red;">Qalan Mebleg {{$exp->amount}}</p>

                        @endif

                </td>
                <td>
                    <a class="btn btn-info" href="{{URL::to('show/expenses/' .$exp->id) }}">Goster</a>
                    <a class="btn btn-primary" href="{{URL::to('editexp/' .$exp->id) }}">Duzelis Et</a>
                    <a class="btn btn-danger" href="{{URL::to('delete/expenses/' .$exp->id) }}"
                       onclick="return confirm('Silmek istediyinize eminsiniz?')">Sil</a>
                </td>
                @endforeach
            </tr>
    </table>
@endsection
