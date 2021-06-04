@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight-with-navbar">
        <div class="hero-body has-text-centered has-background-dark">
            <div class="container">
                <div class="block">
                    <h class="title is-size-1 customHeaderColorForWelcomePage">
                        Welcome To {{ env('APP_TITLE', 'Sample application') }}
                    </h>
                </div>
                <div class="block">
                    <p class="is-size-4 has-text-grey">Welcome to the register of exotic animals. Here you can register new animal species. You can manage and edit the species.<br> Log in to use our platform. If you don't have an account you can sign up here.</p>
                </div>
                <div class="block">
                    <a href="{{ route('login') }}" class="button is-success is-medium is-hovered is-rounded"><i class="fas fa-sign-in-alt "></i>&nbsp;{{ __('Login') }}</a>
                    &nbsp;
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button is-hovered is-medium is-rounded"><i class="fas fa-user-plus"></i>&nbsp;{{ __('Register') }}</a>
                    @endif
                </div>
            </div>
        </div>  
    </section>
@endsection