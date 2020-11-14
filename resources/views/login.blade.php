@extends('layouts.minimal')

@section('content')

<div class="col-sm-12 col-lg-9">
    <div class="card-group">
        <div class="card p-4">
            <div class="card-body">
                <h1>@lang('pages/login.title')</h1>
                <p class="text-muted">@lang('pages/login.subtitle')</p>
                <a href="{{ route('auth.login') }}" class="btn btn-login-google">
                    {{ __('auth.google.login') }}
                </a>
            </div>
        </div>
        <div class="card card-privacy text-white bg-primary pt-4 pb-2">
            <div class="card-body text-center">
                <h2>@lang('pages/login.privacy')</h2>
                <p>@lang('pages/login.privacy_note_1')</p>
                <p class="privacy-text">{!! sprintf( __('pages/login.privacy_note_2'), '<a href="' . route('privacy') . '">' . __('pages/login.privacy_link') . '</a>' ) !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection
