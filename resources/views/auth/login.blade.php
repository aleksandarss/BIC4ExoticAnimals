@extends('layouts.app')

@section('content')
    <h1 class="title pt-5 fs-1 customHeaderColorSpeciesList text-center"> Sign in if you already have an account!</h1>
    <section class="section is-fullheight">
        <div class="container text-center">
            <div class="columns is-multiline">
                <div class="card custom-card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ __('Sign In') }}</h1>
                    </header>
                    <div class="card-content bg-dark">
                        <div class="content">
                            @if (session('status'))
                                <article class="message is-success">
                                    <div class="message-body">
                                        {{ session('status') }}
                                    </div>
                                </article>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field">
                                    <label class="label text-white text-start" for="email">Email</label>
                                    <div class="control">
                                        <input id="email" title="email" name="email" type="email" required
                                               autocomplete="email" autofocus
                                               class="input @error('email') is-danger @enderror"
                                               value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">Email is not valid</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label text-white text-start" for="password">Password</label>
                                    <div class="control">
                                        <input id="password" title="password" name="password" type="password" required
                                               autocomplete="current-password"
                                               class="input @error('password') is-danger @enderror">
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">Password is not valid</p>
                                    @enderror
                                </div>

                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item field is-horizontal no-space">
                                            <div class="field-body">
                                                <div class="field no-space">
                                                    <div class="control text-white">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="remember"
                                                                   id="remember"
                                                                {{ old('remember') ? 'checked' : '' }}>
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <p class="level-item has-text-centered">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link level-right"
                                                   href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth">
                                    {{ __('Login') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a class="text-center fs-4" href="{{ route('welcome') }}">Get back to Welcome Page</a>
        </div>
    </section>
@endsection
