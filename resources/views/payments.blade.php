@extends('layouts.app')

@section('content')

    @if (backpack_auth()->guest())
        <div class='container'>
            <div class='row text-center'>
                <div class="alert alert-danger" role="alert">
                        Необходимо авторизоваться!
                  </div>
            </div>
        </div>
    @endif

    @if (backpack_auth()->check())
        <div class='container'>
            <div class='row text-center'>
                <h2>Выплаты</h2>
                <hr>
            </div>
            <div class='row '>
                <table-payment></table-payment>
            </div>
        </div>
    @endif
@endsection