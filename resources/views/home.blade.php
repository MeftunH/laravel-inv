@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(!(Gate::check('show')))
                    {{ __('Siz normal istifadecesiniz ve panelleri,hesabatlari gorme icazeniz yoxdur.Adminden icaze alin!') }}
                        @endif
                        @role('admin')
                        {{ __('Rolunuz admin!') }}
                    @endrole
                        @role('manager')
                        {{ __('Rolunuz meneger.Siz  websaytta olan butun bilgileri sadece gorme haqqina sahibsiniz!') }}
                        @endrole

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
