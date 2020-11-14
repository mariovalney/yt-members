@extends('layouts.minimal')

@section('content')

<div class="col-md-6">
    <div class="clearfix">
        <h1 class="float-left display-3 mr-4">@yield('code')</h1>
        <h4 class="pt-3">@yield('message')</h4>
        <p class="text-muted">@yield('subtitle')</p>
    </div>
</div>

@endsection
