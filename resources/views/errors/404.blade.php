@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section('subtitle')
    @php
        printf(
            __('Confira o link que você clicou ou vá até a %s.'),
            '<a href="' . route('index') . '">' . __( 'página inicial' ) . '</a>'
        );
    @endphp
@endsection
