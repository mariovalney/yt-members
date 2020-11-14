@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

@section('subtitle')
    @php
        printf(
            __('Tente fazer %s.'),
            '<a href="' . route('auth.login') . '">' . __( 'login novamente' ) . '</a>'
        );
    @endphp
@endsection
