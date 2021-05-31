@extends('layouts.app')


@section('content')
    <section class="section">
        <species-form :is-editable="true" :current-species="{{ $species }}"></species-form>
    </section>
@endsection
