@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Utente autenticato --}}
        @auth
            <h2 class="fs-4 text-secondary my-4 text-white">
                {{ __('Dashboard') }}
            </h2>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">{{ __('User Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        {{-- Utente non autenticato --}}
        @guest
            <div class="my-5 p-4 border rounded shadow-sm bg-dark text-center">
                <h2 class="fs-4 text-white mb-3">
                    🔒 {{ __('Fai il login!') }}
                </h2>
                <p class="text-secondary">
                    Per accedere alla tua area personale, effettua l’accesso con il tuo account.
                </p>
                <a href="{{ route('login') }}" class="btn btn-outline-light mt-3">
                    Vai al Login
                </a>
            </div>
        @endguest

    </div>
@endsection