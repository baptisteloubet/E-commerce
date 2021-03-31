@extends('layouts.app')
@section('title')
    Présentation
@endsection
@section('content')
<div class="container">
    <section>
        <div class="row col-lg-12 pt-16 justify-content-center">
            <div class="col-lg-6 mb-4 font-weight-bold text-4xl">
                <h1 class="text-center productstitle">DÉCOUVREZ<br/> ÉCO-SERVICES </h1>
            </div>
        </div>
    </section>
    <section>
        <div class="row pt-16 justify-content-center align-items-center">
            <div class="col-lg-5 text-justify">
                <p class="paveservices">Éco-Services est une société créée en 2021 qui souhaite aller dans le sens de la transition écologique
                   en vous proposant des produits de tout type avec pour principal atout leur éco-responsabilité.<br><br/> Nous proposont
                   également des produits réutilisables, recyclés qui permettent de réduire au maximum votre empreinte carbone,
                   tout en profitant de leur qualité et de leur durabilité.<br/><br>  Un large panel d'articles vous est mit à disposition,
                   pour les besoins de tout un chacun :) <br /><br>En tant que professionnelle vous pouvez avoir accès à nos différents services de recyclage.
                </p>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <img src="{{asset('/img/titrepres.png')}}" />
            </div>
        </div>
    </section>
</div>
    <section class="sectionpresa text-white">
        <div class="row justify-content-center pt-16 pb-16">
            <div class="col-lg-4">
                <div class="pb16 cerclespresa">
                    <a>
                        <img src="{{asset('/img/arnaud.jpg')}}" class="mx-auto p-2 roundedborder imgpresa col-lg-8" alt="Logo" data-original-title="" title="" aria-describedby="tooltip591651" />
                    </a>
                </div>
                <h2 class="text-center text-white pt-8">Notre fondateur</h2>
                <p class="text-justify col-lg-8 offset-lg-2 pt-4 pavepresentation text-center">Jeune Entepreneur, je travaille dans les métiers de l'environnement depuis plus de
                15 ans. J'essaie de trasmettre les valeurs que j'ai acquis au fil des années à travers de notre site Éco-Services tout en vous proposant des produits innovants !</p>
            </div>
            <div class="col-lg-4">
                <div class="pb16 cerclespresa">
                    <a>
                        <img src="{{asset('/img/presa/presa2.png')}}" class="mx-auto p-2 roundedborder bg-white imgpresa col-lg-8" alt="Logo" data-original-title="" title="" aria-describedby="tooltip591651" />
                    </a>
                </div>
                <h2 class="text-center text-white pt-8">Notre objectif</h2>
                <p class="text-justify col-lg-8 offset-lg-2 pt-4 pavepresentation text-center">Proposer un large choix de produits éco-responsables pour répondre aux enjeux
                du XXIème siècle, tout en proposant des produits du quotidien qui raviront les personnes sensibles à l'environnement, mais également les néophytes !</p>
            </div>
            <div class="col-lg-4">
                <div class="pb16 cerclespresa">
                    <a>
                        <img src="{{asset('/img/presa/presa3.jpg')}}" class="mx-auto p-2 roundedborder imgpresa col-lg-8" alt="Logo" data-original-title="" title="" aria-describedby="tooltip591651" />
                    </a>
                </div>
                <h2 class="text-center text-white pt-8">Nos valeurs</h2>
                <p class="text-justify col-lg-8 offset-lg-2 pt-4 pavepresentation text-center">Respect de l'environnement, circuit court et diversité des produits sont nos valeurs
                phares chez Éco-Services. Nous nous efforçons de vous présenter les produits les plus respectueux de l'environnement, au meilleur prix !
                </p>
            </div>
        </div>
    </section>
<div class="container">
            @guest
        <section class="row col-lg-12 justify-content-center">
            <div class="pt-16 mb-48">
                <a href={{route('products.index')}} class="buttonsbis pl-8 pr-8 nounderline">DÉCOUVREZ NOS PRODUITS/NOS SERVICES</a>
            </div>
        </section>
            @endguest('guest')

            @can('is_particuliers')
        <section class="row col-lg-12 justify-content-center">
            <div class="pt-16 mb-48">
                <a href={{route('products.index')}} class="buttonsbis pl-8 pr-8 nounderline">DÉCOUVREZ NOS PRODUITS</a>
            </div>
        </section>
            @endcan

            @can('is_pros')
        <section class="row col-lg-12 justify-content-center">
            <div class="pt-16 mb-48">
                <a href={{route('products.index')}} class="buttonsbis pl-8 pr-8 nounderline">DÉCOUVREZ NOS SERVICES</a>
            </div>
        </section>
            @endcan


</div>

@endsection

