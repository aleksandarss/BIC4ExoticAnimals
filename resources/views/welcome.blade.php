@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight-with-navbar">
        <div class="hero-body text-center bg-dark">
            <div class="container">
                <h1 class="title pb-3 fs-1 customHeaderColorForWelcomePage">
                    Welcome To {{ env('APP_TITLE', 'Sample application') }}
                </h1>
                <p class="lead text-white mx-5 py-5">Welcome to the register of exotic animals. Here you can register new animal species. You can manage and edit the species.<br> Log in to use our platform. If you don't have an account you can sign up here.</p>
                <p class="lead mx-5 my-3">
                    <a href="{{ route('login') }}" class="btn btn-lg btn-primary border-success bg-success text-white me-2"> <i class="fas fa-sign-in-alt me-1"></i> {{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-lg btn-secondary border-white bg-light text-dark "> <i class="fas fa-user-plus me-1"></i> {{ __('Register') }}</a>
                    @endif
                </p>
            </div>
        </div>
    </section>
@endsection

