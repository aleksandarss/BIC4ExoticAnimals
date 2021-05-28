@extends('layouts.app')

@section('content')

    <!-- Custom -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>-->

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->

    <section class="section is-fullheight">
        <example-component title="Dashboard">
            @if (session('status'))
                <query-message :success="true" :fail="false" message="{{ session('status') }}"></query-message>
            @endif
            <h1>Welcome <strong>{{ auth()->user()->name }}</strong></h1>

            <div class="carouselContainer">
                
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="./img/pexels-Tier1.jpg" class="d-block w-100" alt="Animal1">
                        </div>
                        <div class="carousel-item">
                        <img src="./img/pexels-Tier2.jpg" class="d-block w-100" alt="Animal2">
                        </div>
                        <div class="carousel-item">
                        <img src="./img/pexels-Tier4.jpg" class="d-block w-100" alt="Animal3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </example-component>
    </section>
@endsection
