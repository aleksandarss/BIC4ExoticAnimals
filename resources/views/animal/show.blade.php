@extends('layouts.app')


@section('content')
    <section class="section">
        <animals :animals="{{ $animals }}" :user="{{ Auth::user() }}"></animals>
    </section>
@endsection
