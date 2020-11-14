@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col pt-4">
                @if (! empty($user->name))
                    <h1>@lang('pages/index.welcome'), {{ $user->name }}!</h1>
                @else
                    <h1>@lang('pages/index.welcome')!</h1>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
