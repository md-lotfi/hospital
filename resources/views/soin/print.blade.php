@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h6><b><u>WILAYA DE MILA</u></b></h6>
                <h6><b><u>ETABLISSEMENT PUBLIC HOSPITALIER</u></b></h6>
                <h6><b><u>MOHAMED MEDDAHI FERDJIOUA</u></b></h6>
                <p style="padding: 0;margin: 0">Tél: 031 49 50 69/74/75</p>
                <p style="padding: 0;margin: 0">Fax: 031 49 50 70/73/76</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <h3 class="text-center"><u><b>LISTE DES SOINS</b></u></h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-8">
                <p><b>Nom et prénom du malade: </b>{{$patient->nom}} {{$patient->prenom}}</p>
                <p><b>Age: </b>{{$age}} ans</p>
                <p><b>Adresse: </b>{{$patient->adresse}}</p>
            </div>
            <div class="col-xs-4" style="border-left: 1px #333 solid">
                <p><b>Service: </b>{{$lit->nom}}</p>
                <p><b>Unité: </b>{{$lit->nom_unite}}</p>
                <p><b>Salle: </b>{{$lit->nom_salle}}</p>
                <p><b>Lit: </b>{{$lit->nom_lit}}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <h5 CLASS="text-left"><u><b>LISTE DES MÉDICAMENTS</b></u></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-3">Médicament</th>
                            <th class="col-md-2">Dose</th>
                            <th class="col-md-2">Voie</th>
                            <th class="col-md-2">Date et Heure</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($soins as $soin)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $soin->name }} {{ $soin->prenom_inf }}</td>
                            <td class="col-md-3">{{ $soin->nom_medic }}</td>
                            <td class="col-md-2">{{ $soin->dose_admini }}</td>
                            <td class="col-md-2">{{ $soin->voie }}</td>
                            <td class="col-md-2">{{ $soin->created_at }}</td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h5 CLASS="text-left"><u><b>LISTE DES PSYCHOTROPES</b></u></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-3">Médecin</th>
                            <th class="col-md-2">Psychotrope</th>
                            <th class="col-md-2">Mat.</th>
                            <th class="col-md-2">Date et Heure</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($psys as $psy)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $psy->name_inf }} {{ $psy->prenom_inf }}</td>
                            <td class="col-md-3">{{ $psy->name_med }} {{ $psy->prenom_med }}</td>
                            <td class="col-md-2">{{ $psy->nom_psy }}</td>
                            <td class="col-md-2">{{ $psy->mat_psy }}</td>
                            <td class="col-md-2">{{ $psy->created_at }}</td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h5 CLASS="text-left"><u><b>LISTE DES PRÉLEVEMENTS</b></u></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">Infermiere</th>
                            <th class="col-md-1">Temp.</th>
                            <th class="col-md-1">Poids</th>
                            <th class="col-md-1">Taille</th>
                            <th class="col-md-1">Pouls</th>
                            <th class="col-md-1">Glécemie</th>
                            <th class="col-md-1">Diurese</th>
                            <th class="col-md-1">Tension B.</th>
                            <th class="col-md-1">Tension H.</th>
                            <th class="col-md-1">Date</th>
                            <th class="col-md-1">Observation</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($prelevs as $prelev)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $prelev->name_inf }} {{ $prelev->prenom_inf }}</td>
                            <td class="col-md-1">{{ $prelev->temp }}</td>
                            <td class="col-md-1">{{ $prelev->poid }}</td>
                            <td class="col-md-1">{{ $prelev->taille }}</td>
                            <td class="col-md-1">{{ $prelev->pouls }}</td>
                            <td class="col-md-1">{{ $prelev->glecymie }}</td>
                            <td class="col-md-1">{{ $prelev->diurese }}</td>
                            <td class="col-md-1">{{ $prelev->tension_bas }}</td>
                            <td class="col-md-1">{{ $prelev->tension_haut }}</td>
                            <td class="col-md-1">{{ $prelev->created_at }}</td>
                            <td class="col-md-1">{{ $prelev->observation }}</td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            </div>
        </div>
    </div>
@endsection