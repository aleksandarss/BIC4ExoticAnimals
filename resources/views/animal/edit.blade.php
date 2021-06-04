@extends('layouts.app')


@section('content')
    <section class="section">
        <animal-form :is-editable="true" :current-animal="{{ $animal }}"></animal-form>
    </section>
@endsection
