@extends('layouts.app')


@section('content')
    <section class="section is-fullwidth">
        <example :example="{{ $animal }}"></example>
    </section>
@endsection