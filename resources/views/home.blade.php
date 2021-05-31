  
@extends('layouts.app')

@section('content')

    <section class="container py-5">
        <example-component title="Exotic Animals">
            @if (session('status'))
                <query-message :success="true" :fail="false" message="{{ session('status') }}"></query-message>
            @endif
            
            <h1 class="title customFontColor mb-5 fs-1">Welcome <strong>{{ auth()->user()->name }}</strong></h1>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        
                        <img src="./img/pexels-Tier1.jpg" class="d-block w-100 rounded-pill" alt="Animal1">
                        

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Banana Joe.</h1>
                                <p>Joe is eating his banana.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        
                        <img src="./img/pexels-Tier2.jpg" class="d-block w-100 rounded-pill" alt="Animal2">

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Rickon is posing.</h1>
                                <p>Rickon is posing is and showing his colors to everyone.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/pexels-Tier3.jpg" class="d-block w-100 rounded-pill" alt="Animal3">  

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Spyro is hungry.</h1>
                                <p>Spyro is looking for his food.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->

            <div class="container marketing mt-5 customHeaderColorForWelcomePage">
                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4 text-center text-white">
                        <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                        <h2 class="fs-3 mt-3 mb-3">Heading</h2>
                        <p class=" mb-3">Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                        <p class=" mb-3"><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 text-center text-white">
                        <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                        <h2 class="fs-3 mt-3 mb-3">Heading</h2>
                        <p class=" mb-3">Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                        <p class=" mb-3"><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 text-center text-white">
                        <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                        <h2 class="fs-3 mt-3 mb-3">Heading</h2>
                        <p class=" mb-3">And lastly this, the third column of representative placeholder content.</p>
                        <p class=" mb-3"><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                </div>
            </div><!-- /.row -->

        </example-component>
    </section>

@endsection