@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))

@section('subtitle')
    @php
        printf(
            __('Tente fazer %s.'),
            '<a href="' . route('login') . '">' . __( 'login novamente' ) . '</a>'
        );
    @endphp
@endsection
