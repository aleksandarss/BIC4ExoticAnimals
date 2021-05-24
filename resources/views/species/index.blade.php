@extends('layouts.app')


@section('content')
    <section class="section is-fullwidth">
        <species :all-species="{{ $species->load('animals') }}"></species>
    </section>
@endsection
