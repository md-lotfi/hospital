@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-3">Nom</dt>
                    <dd class="col-sm-9">{{$patient->nom}}</dd>

                    <dt class="col-sm-3">Prénom</dt>
                    <dd class="col-sm-9">{{$patient->prenom}}</dd>

                    <dt class="col-sm-3">Date de naissance</dt>
                    <dd class="col-sm-9">{{$patient->datenai}}</dd>

                    <dt class="col-sm-3">Prénom du père</dt>
                    <dd class="col-sm-9">{{$patient->prenompere}}</dd>

                </dl>
            </div>
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-3">Nom mère</dt>
                    <dd class="col-sm-9">{{$patient->nommere}}</dd>

                    <dt class="col-sm-3">Prénom de la mère</dt>
                    <dd class="col-sm-9">{{$patient->prenommere}}</dd>

                    <dt class="col-sm-3">Adresse</dt>
                    <dd class="col-sm-9">{{$patient->adresse}}</dd>
                </dl>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des médicaments</h1>
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
            <div class="col-md-12">
                <h1>Liste des Prélevements</h1>
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
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des psychotropes</h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-3">Médecin</th>
                            <th class="col-md-2">Psychotrope</th>
                            <th class="col-md-2">Mat. Psychotrope</th>
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
    </div>
@endsection