
@extends('layouts.app')

@section('content')

    <div class='container'>
        {{ $data['page']->id }} <br>
        {{ $data['page']->template }}<br>
        {{ $data['page']->name }}<br>
        {{ $data['page']->title }}<br>
        {{ $data['page']->slug }}<br>
        {{ $data['page']->content }}<br>
        {{ $data['page']->created_at }}<br>
        {{ $data['page']->updated_at }}<br>
        {{ $data['page']->deleted_at }}<br>
        {{ $data['page']->meta_title }}<br>
        {{ $data['page']->meta_description }}<br>
        {{ $data['page']->meta_keywords }}<br>
        {{ $data['page']->extras['meta_title'] }}<br>
        {{ $data['page']->extras['meta_description'] }}<br>
        {{ $data['page']->extras['meta_keywords'] }}<br>
    </div>

@endsection