  
@extends('layouts.app')

@section('content')
    
<section class="container">
    <example-component title="Exotic Animals">
        @if (session('status'))
            <query-message :success="true" :fail="false" message="{{ session('status') }}"></query-message>
        @endif 

        <!-- Head -->
        <section class="hero">
            <div class="hero-body">
                <div class="container has-text-centered">
                <div class="hero-body"> 
                    <p class="customFontColor title is-size-1">Welcome to exotic animals {{ auth()->user()->name }}</p>
                </div>
                <h2 class="subtitle">Use our application, save animals, register new species.</h2>
                </div>
            </div>
        </section>

        <!-- Start Hero Carousel -->
        

        <section>
            <div class="slideshow-container">

                <div class="mySlides fade">
                <div class="numbertext has-text-centered">1 / 3</div>
                <!-- Slide Content -->
                <figure class="image is-3by2">
                    <img src="./img/pexels-Tier1.jpg" class="is-rounded" alt="Animal1">
                </figure>
                <div class="text has-text-centered subtitle">Banana Joe</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext has-text-centered">2 / 3</div>
                <!-- Slide Content -->
                <figure class="image is-3by2">
                    <img src="./img/pexels-Tier2.jpg" class="is-rounded" alt="Animal2">
                </figure>
                <div class="text has-text-centered subtitle">Green Recon</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext has-text-centered">3 / 3</div>
                <!-- Slide Content -->
                <figure class="image is-3by2">
                    <img src="./img/pexels-Tier3.jpg" class="is-rounded" alt="Animal3">
                </figure>
                <div class="text has-text-centered subtitle">Colorful Gecko</div>
                </div>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>
        </section>

        <section class="section">
            <div class="container has-text-centered">
                <h2 class="title">Our exotic animals</h2>
                <p class="subtitle mb-6">Here you can see of our animals. We register all animals with different species.</p>
                <div class="columns py-5">
                    <div class="column is-4">
                        <div class="level">
                            <div class="level-item">
                                <figure class="image is-128x128"><img class="is-rounded" src="./img/pexels-Tier1.jpg" alt="1"></figure>
                            </div>
                        </div>
                        <h5 class="title is-5">Joe</h5>
                        <p class="subtitle is-6">Monkey</p>
                        <p>Joe loves bananas and loves playing.</p>
                    </div>
                    <div class="column is-4">
                        <div class="level">
                            <div class="level-item"><figure class="image is-128x128"><img class="is-rounded" src="./img/pexels-Tier2.jpg" alt="2"></figure></div>
                        </div>
                        <h5 class="title is-5">Recon</h5>
                        <p class="subtitle is-6">Iguana</p>
                        <p>Recon is always focused on his surroundings.</p>
                    </div>
                    <div class="column is-4">
                        <div class="level">
                            <div class="level-item"><figure class="image is-128x128"><img class="is-rounded" src="./img/pexels-Tier3.jpg" alt="3"></figure></div>
                        </div>
                        <h5 class="title is-5">Gecko</h5>
                        <p class="subtitle is-6">Parrot</p>
                        <p>Gecko loves posing and shows his colors to everyone.</p>
                    </div>
                </div>
            </div>
        </section>

    </example-component>
</section>
    
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
</script>
    
    
@endsection