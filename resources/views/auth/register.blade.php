@extends('layouts.app')

@section('content')
    <!-- Head -->
    <section class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="block"> 
                    <p class="customFontColor title is-size-1">Create an new account if you don't have one!</p>  
                </div>
                <div class="block"> 
                    <h2 class="subtitle">If you already have an account, just log in!</h2>
                </div>
                <div class="block"> 
                    <a href="{{ route('login') }}" class="button is-medium is-hovered is-rounded"><i class="fas fa-sign-in-alt "></i>&nbsp;{{ __('Login') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container has-text-centered">
            <div class="columns is-multiline">
                <div class="card custom-card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ __('Register') }}</h1>
                    </header>
                    <div class="card-content has-background-dark">
                        <div class="content">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="field">
                                    <label class="label has-text-white text-start" for="name">{{ __('Name') }}</label>
                                    <div class="control">
                                        <input name="name" class="input @error('name') is-danger @enderror"
                                               type="text" id="name"
                                               value="{{ old('name') }}" required autocomplete="name"
                                               autofocus>
                                    </div>
                                    @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label has-text-white text-start" for="email">Email</label>
                                    <div class="control">
                                        <input name="email" id="email" class="input @error('email') is-danger @enderror"
                                               type="email" required>
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">Email is not valid</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label has-text-white text-start" for="password">Password</label>
                                    <div class="control">
                                        <input name="password" id="password"
                                               class="input @error('password') is-danger @enderror"
                                               type="password"
                                               required>
                                    </div>
                                    @error('password')
                                    <p class="help is-danger">Password is not valid</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label has-text-white text-start" for="password-confirm">Confirm Password</label>
                                    <div class="control">
                                        <input class="input field-spacer" type="password"
                                               id="password-confirm" name="password_confirmation"
                                               required>
                                    </div>
                                </div>

                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth">
                                    {{ __('Register') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="has-text-centered">
                <a class="has-text-centered button is-hovered is-medium is-rounded" href="{{ route('welcome') }}"><i class="fas fa-arrow-left"></i>&nbsp;Return to welcome page</a>
            </div>
        </div>
    </section>
@endsection
