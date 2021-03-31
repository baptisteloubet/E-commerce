@extends('layouts.app')
@section('title')
    Acceuil
@endsection

@section('content')

<div class="container2">
  <div class="section" id="hero">
    <div class="content">
      <h1 id="brand" class="text-white">Éco Services</h1>

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6"><p style="line-height: 1.8em" id="sub-brand-text">Engagé de passion pour la transition écologique et solidaire avec nos produits et services</p></div>
<div class="col-sm-3"></div>
</div>

    </div>
    <a id="hero-down-button" class="down-button" data-speed="1000" href="#presentation">
      <img src="https://s3-ap-southeast-1.amazonaws.com/sem-content/misc/interior-designer-blog/down-arrow.png" alt="Voir plus" />
    </a>
    <div class="video-wrapper">
      <video id="hero-video" src="{{asset('/img/accueil/accueil-video.mp4')}}" autoplay muted loop></video>
    </div>
  </div>
</div>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="éco-services votre entreprise de recyclage d'appareils éléctroniques">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Accueil</title>
</head>

<body>

<!--
    <video controls width="100%">

        <source src="{{asset('/img/accueil/accueil-video.mp4')}}" type="video/mp4">

        Désolé, votre navigateur ne prend pas en charge les vidéos intégrées.
    </video>


-->
    <div class="md:container md:mx-auto mb-16" id="presentation">



        <h1 class="text-center qsm">Qui sommes-nous ?</h1>


        <div class="row align-items-center">

            <div class="col-sm-4">

                <div class="circle">
                    <img />
                </div>

                <img class="imageRound" src="{{asset('/img/accueil/images-qsm-projet-ecommerce.jpg')}}" alt="éco-services l’innovation au service de nos clients" title="éco-services l’innovation au service de nos clients">


            </div>

            <div class="col-sm-7 ml-16 qsm-text text-md whitespace-nowrap text-gray-800 font-semibold pl-0 text-justify">
              <p class="paveservices mb-0">Chaque jour, les &eacute;quipes d&apos;&eacute;co-services mettent toute leur capacit&eacute; d&rsquo;innovation au service de leurs clients dans le passage d&rsquo;un mod&egrave;le lin&eacute;aire qui surconsomme les ressources &agrave; une &eacute;conomie circulaire qui les recycle et les valorise.</p>
              <p class="paveservices mb-0"><br>Une entreprise fond&eacute;e par <strong>Arnaud PARADIS</strong>, engag&eacute; de passion pour la transition &eacute;cologique et solidaire.</p>
              <p class="paveservices mb-0" style="text-align: center;"><br>Apr&egrave;s 20 ans d&apos;exp&eacute;rience, &eacute;co-services se r&eacute;invente !</p>
              <p class="paveservices mb-0"><br>D&eacute;couvrez d&egrave;s maintenant l&apos;ensemble de nos produits pour les professionnels et particuliers.</p>
              <p class="paveservices mb-0"><br>En plus de son activit&eacute; principale, l&apos;entreprise esp&egrave;re &eacute;galement se diversifier et fournir des produits<br>z&eacute;ro d&eacute;chet aux particuliers ayant des ventes de produits &eacute;cologiquement responsables.</p>
              <p class="paveservices mb-0"><br></p>
              <p class="paveservices mb-0">Inscrivez-vous en tant que particulier pour acc&eacute;der &agrave; nos produits ou alors en professionnelle si vous souhaiter voir nos services.</p>
               
                <br><br><br>

                @guest
                <div class="text-center">
                    <a href="{{route('register')}}"><button class="center bg-green-500 font-semibold text-white p-2 w-64 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2" @click="showModal3 = true">
                            Nos Produits | Nos services
                        </button></a>
                </div>  
                @endguest('guest')    
            </div>

        </div>
   
        @can('is_pros')
        <div class="text-center">
            <a href="{{route('services.index')}}"><button class="center bg-green-500 font-semibold text-white p-2 w-32 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2" @click="showModal3 = true">
                    Nos services
                </button></a>
        </div>


        @endcan
        @can('is_particuliers')
        <div class="text-center">
            <a href="{{route('products.index')}}"><button class="center bg-green-500 font-semibold text-white p-2 w-32 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2" @click="showModal3 = true">
                    Nos Produits
                </button></a>
        </div>
        @endcan
    </div>
 <div class="h2-title mt-16">
            <h2 class="text-center v-heading-v2"></h2>
        </div>

        <div class="row certifications mt-8 pt-16 pb-32 align-items-center">
            <div class="col-lg-12 text-center">
            <h2 class="text-center pb-16 text-white v-heading-v2">Nos certifications</h2>
            </div>
            <div class="col-sm-4 text-right"><img src="{{asset('/img/accueil/label-1.png')}}" alt="Certifications 1" title="Certifications 1"></div>

            <div class="col-sm-4 text-center certif"><img src="{{asset('/img/accueil/label-2.jpg')}}" alt="Certifications 2" title="Certifications 2"></div>

            <div class="col-sm-4 text-left certif"><img src="{{asset('/img/accueil/label-3.png')}}" alt="Certifications 3" title="Certifications 3"></div>

        </div>
        
    
    <div class="section" id="footer">
    <div class="content">
      <h2>Éco service, c'est une équipe de <br/>professionnels toujours à votre service</h2>
      <h2>Votre satisfaction est notre priorité</h2>

    </div>

  </div>
</body>

</html>



<script>

// DOM Elements
var vid = document.getElementById("hero-video");
var brand = document.getElementById("brand");
var subBrand = document.getElementById("sub-brand-text");
var heroDownButton = document.getElementById("hero-down-button");

// Show logo on video load
vid.oncanplay = function() {
    showSubBrand();
    setTimeout(showBrand, 1000);
    setTimeout(showDownButton, 2000);
};

function showBrand() {
  brand.classList.add("h1-appear");
}

function showSubBrand() {
  subBrand.classList.add("p-appear");
}

function showDownButton() {
  heroDownButton.classList.add("img-appear");
}

// Smooth scrolling
(function() {
  "use strict";
  // Feature Test
  if (
    "querySelector" in document &&
    "addEventListener" in window &&
    Array.prototype.forEach
  ) {
    // Function to animate the scroll
    var smoothScroll = function(anchor, duration) {
      // Calculate how far and how fast to scroll
      var startLocation = window.pageYOffset;
      var endLocation = anchor.offsetTop;
      var distance = endLocation - startLocation;
      var increments = distance / (duration / 16);
      var stopAnimation;

      // Scroll the page by an increment, and check if it's time to stop
      var animateScroll = function() {
        window.scrollBy(0, increments);
        stopAnimation();
      };

      // If scrolling down
      if (increments >= 0) {
        // Stop animation when you reach the anchor OR the bottom of the page
        stopAnimation = function() {
          var travelled = window.pageYOffset;
          if (
            travelled >= endLocation - increments ||
            window.innerHeight + travelled >= document.body.offsetHeight
          ) {
            clearInterval(runAnimation);
          }
        };
      } else {
        // If scrolling up
        // Stop animation when you reach the anchor OR the top of the page
        stopAnimation = function() {
          var travelled = window.pageYOffset;
          if (travelled <= (endLocation || 0)) {
            clearInterval(runAnimation);
          }
        };
      }
      // Loop the animation function
      var runAnimation = setInterval(animateScroll, 16);
    };

    // Define smooth scroll links
    var scrollToggle = document.querySelectorAll(".down-button");

    // For each smooth scroll link
    [].forEach.call(scrollToggle, function(toggle) {
      // When the smooth scroll link is clicked
      toggle.addEventListener(
        "click",
        function(e) {
          // Prevent the default link behavior
          e.preventDefault();

          // Get anchor link and calculate distance from the top
          var dataID = toggle.getAttribute("href");
          var dataTarget = document.querySelector(dataID);
          var dataSpeed = toggle.getAttribute("data-speed");

          // If the anchor exists
          if (dataTarget) {
            // Scroll to the anchor
            smoothScroll(dataTarget, dataSpeed || 500);
          }
        },
        false
      );
    });
  }
})();

// Start buggyfill for viewport units in old browsers
window.viewportUnitsBuggyfill.init();


</script>

@endsection
