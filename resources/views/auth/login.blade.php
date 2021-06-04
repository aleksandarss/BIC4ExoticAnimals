@extends('layouts.app')

@section('content')
    
    <!-- Head -->
    <section class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="block"> 
                    <p class="customFontColor title is-size-1">Sign in with your user account!</p>  
                </div>
                <div class="block"> 
                    <h2 class="subtitle">If you don't have an account you can register right over here.</h2>
                </div>
                <div class="block"> 
                    <a href="{{ route('register') }}" class="button is-hovered is-medium is-rounded"><i class="fas fa-user-plus"></i>&nbsp;{{ __('Create new account!') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section is-fullheight">
        <div class="container has-text-centered">
            <div class="columns is-multiline">
                <div class="card custom-card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ __('Sign In') }}</h1>
                    </header>
                    <div class="card-content has-background-dark">
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
                                    <label class="label has-text-white text-start" for="email">Email</label>
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
                                    <label class="label has-text-white text-start" for="password">Password</label>
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
                                                    <div class="control has-text-white">
                                                        <label class="checkbox has-text-white">
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
                                                <a class="btn btn-link level-right has-text-white"
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
            <div class="has-text-centered">
                <a class="has-text-centered button is-hovered is-medium is-rounded" href="{{ route('welcome') }}"><i class="fas fa-arrow-left"></i>&nbsp;Return to welcome page</a>
            </div>
        </div>
    </section>
@endsection
