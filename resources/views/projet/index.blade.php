@extends('layouts.app')
@section('title')
    Le Projet
@endsection
@section('content')
<div class="container">
    <section>
        <div class="row col-lg-12 pt-16 justify-content-center">
            <div class="col-lg-6 mb-4 font-weight-bold text-4xl">
                <h1 class="text-center productstitle">NOTRE EQUIPE </h1>
            </div>
        </div>
    </section>
    <section>
        <div class="row pt-16 justify-content-center align-items-center">
            <div class="col-lg-4 offset-lg-1">
                <img class="border-radius"src="{{asset('/img/presa/equipe.png')}}" />
            </div>
            <div class="col-lg-6 text-justify ml-5 ">
                <p class="paveservices">Nous préférons travailler avec des jeunes alternant, pour les aider a s'insérer dans le monde du travail et leur permettre d'acquérir de l'expérience. <br><br>Nous sommes désireux et déterminés à développer une industrie du recyclage plus avantageuse afin d'obtenir des avantages universels. <br><br>Nos collaborateurs développent chaque jour des solutions pour faire face aux défis environnementaux, économiques et humains auxquels l'entreprise est actuellement confrontée.<br />
                </p>
            </div>
            
        </div>
    </section>
    <section>
        <div class="row justify-content-center pt-16">
            <div class="col-lg-3">
                <div class="pb16">
                    <a>
                        <img src="{{asset('/img/nostete/baptiste.jpg')}}" class="mx-auto p-2 roundedborder col-lg-8" alt="Logo" data-original-title="" title="" aria-describedby="tooltip591651" />
                    </a>
                </div>
                <p class="text-center ml-4 mr-4 pt-4"><span class="font-weight-bold"> Baptiste Loubet</span>,<br><br>Développeur Back en cours de formation. Il s'est occupé de la partie services, authentification et de l'hebergement.</p>
            </div>
            <div class="col-lg-3">
                <div class="pb16">
                    <a>
                        <img src="{{asset('/img/nostete/leandre.jpg')}}" class="mx-auto p-2 roundedborder col-lg-8" alt="Logo" data-original-title="" title="" aria-describedby="tooltip591651" />
                    </a>
                </div>
                <p class="text-center  ml-4 mr-4 pt-4"><span class="font-weight-bold"> Leandre Delpivar</span>,<br><br>Développeur Back au sein de l'institut G4. Il a pris en charge le développement des produits et des différentes pages de présentation.</p>
            </div>
            <div class="col-lg-3">
                <div class="pb16">
                    <a>
                        <img src="{{asset('/img/nostete/maxime.jpg')}}" class="mx-auto p-2 roundedborder col-lg-8" alt="Logo" data-original-title="" title="" aria-describedby="tooltip591651" />
                    </a>
                </div>
                <p class="text-center ml-4 mr-4 pt-4"><span class="font-weight-bold">Maxime Dessus</span>,<br><br>Développeur Front actuellement en Licence Concepteur / Developpeur. Il a surpervisé la réalisation de la mise en forme.</p>
            </div>
            <div class="col-lg-3">
                <div class="pb16">
                    <a>
                        <img src="{{asset('/img/nostete/emilien.jpg')}}" class="mx-auto p-2 roundedborder col-lg-8" alt="Logo" data-original-title="" title="" aria-describedby="tooltip591651" />
                    </a>
                </div>
                <p class="text-center  ml-4 mr-4 pt-4"><span class="font-weight-bold"> Emilien Chaptard</span>,<br><br>Développeur Front en alternance. Il a réalisé les prototypes et les maquettes, et a également participé à la mise en page.</p>
            </div>
        </div>
    </section>
    <section class="row col-lg-12 justify-content-center">
        <div class="pt-16 mb-48 text-center">

    </section>
</div>

@endsection

