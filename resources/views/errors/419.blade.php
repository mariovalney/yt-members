@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))

@section('subtitle')
    @php
        printf(
            __('Recarregue a página ou vá até a %s.'),
            '<a href="' . route('admin.index') . '">' . __( 'página inicial' ) . '</a>'
        );
    @endphp
@endsection
