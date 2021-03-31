<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Devis</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
       
    </style>

</head>
<body class="login-page" style="background: white">
    <div class="circleServicesDroite">
        <img/>
    </div>
    
    <div class="circleServicesGauche">
        <img/>
    </div>
<div>
    <div class="row">
        <div class="col-xs-7">
            <h4>De:</h4>
            <strong>Eco-services</strong><br>
            24 Avenue Joannes Masset <br>
            Lyon 9, 69009<br>
            E: eco.service.institut.g4@gmail.com <br>

            <br>
        </div>

        <div class="col-xs-4">
            <img src="https://lh6.googleusercontent.com/xGNUT3krdhz46zeDsfHsKlS5kEIqxOcNzHO7TII2GeyHjxlCkgP8WaEq9N_EmLE8kNCbF6I5jym0yjse5q_bEjWZ8-8hpc24i_Lq8b7N" alt="logo">
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-6">
            <h4>A:</h4>
            <address>
                <strong>{{$name}}</strong><br>
                <span>{{$mail}}</span> <br>
            </address>
        </div>

        <div class="col-xs-5">
            <table style="width: 100%">
                <tbody>
                <tr>
                    <th>Numéro de devis:</th>
                    <td class="text-right">{{$id}}</td>
                </tr>
                <tr>
                    <th> Date: </th>
                    <td class="text-right">{{ $date }}</td>
                </tr>
                </tbody>
            </table>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <table style="width: 100%; margin-bottom: 20px">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Commercial : Roger Duval</div></th>
                    <td style="padding: 5px" class="text-right"><strong> </strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr>
            <th class="text-left">Options</th>
            <th class="text-center">Calcul</th>
            <th class="text-center">TVA</th>
            <th class="text-right">Prix</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-left"><div><strong>Temps de location </strong></div>
                <p>Vous louez ce service pour une durée de {{$jours}} jours.</p></td>
            <td class="text-center">{{$jours}} x 100,00 €</td>
            <td class="text-center">20%</td>
            <td class="text-right">{{$calcul_jours}},00 €</td>
        </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-5">
            <table style="width: 100%">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Total sans TVA</div></th>
                    <td style="padding: 5px" class="text-right"><strong>{{$calcul_jours}},00  €</strong></td>
                </tr>
                <tr class="well" style="padding: 5px; margin-top:10px;">
                    <th style="padding: 5px"><div> Total </div></th>
                    <td style="padding: 5px" class="text-right"><strong>{{$calcul_jours_tva}},00 € </strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

</body>
</html>
