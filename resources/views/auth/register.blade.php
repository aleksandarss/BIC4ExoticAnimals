@extends('layouts.app')

@section('content')
    <h1 class="title pt-5 fs-1 customHeaderColorSpeciesList text-center"> Create an new account if you don't have one!</h1>
    <section class="section is-fullheight">
        <div class="container text-center">
            <div class="columns is-multiline">
                <div class="card custom-card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ __('Register') }}</h1>
                    </header>
                    <div class="card-content bg-dark">
                        <div class="content">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="field">
                                    <label class="label text-white text-start" for="name">{{ __('Name') }}</label>
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
                                    <label class="label text-white text-start" for="email">Email</label>
                                    <div class="control">
                                        <input name="email" id="email" class="input @error('email') is-danger @enderror"
                                               type="email" required>
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">Email is not valid</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label text-white text-start" for="password">Password</label>
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
                                    <label class="label text-white text-start" for="password-confirm">Confirm Password</label>
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
            <a class="text-center fs-4" href="{{ route('welcome') }}">Get back to Welcome Page</a>
        </div>
    </section>
@endsection
