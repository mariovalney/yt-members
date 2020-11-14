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
        <div class="row">
            <div class="col">
                <div class="alert alert-warning mt-3">
                    <h4 class="alert-heading">Ainda estamos em desenvolvimento.</h4>
                    <p class="mb-0">
                        Se você possui um canal com membros e gostaria de usar essa plataforma, sua ajuda será muito bem-vinda!<br>
                        O YouTube não fornece contas de teste para usarmos durante o desenvolvimento. <a href="mailto:mariovalney@gmail.com">Entre em contato</a>, se você pode ajudar a testar.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col pt-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Informações do Membro</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($members))
                                    <tr>
                                        <td>Nenhum membro encontrado</td>
                                    </tr>
                                @else
                                    @foreach($members as $member)
                                        <tr>
                                            <td>{{ json_encode( $member ) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
