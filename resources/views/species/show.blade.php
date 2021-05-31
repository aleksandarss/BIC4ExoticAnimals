@extends('layouts.app')


@section('content')
    <section class="section">
        <species :species="{{ $species }}" :user="{{ Auth::user() }}" :animals="{{ $species->animals }}"></species>
    </section>
@endsection
