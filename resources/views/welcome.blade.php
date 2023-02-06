@extends('layouts.app')

@section('content')

    @if (backpack_auth()->guest())
        <div class='container'>
            <div class='row text-center'>
                <div class="alert alert-danger" role="alert">
                        Необходимо авторизоваться !
                  </div>
            </div>
        </div>
    @endif
@endsection