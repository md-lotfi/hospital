@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">
                <u><b>Fiche des Soins</b></u>
                <a href="/printer/print/soins/{{ $id_adm }}" class="btn btn-outline-primary float-right">Imprimer</a>
            </h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-4">Nom</dt>
                    <dd class="col-sm-8">{{$patient->nom}}</dd>

                    <dt class="col-sm-4">Prénom</dt>
                    <dd class="col-sm-8">{{$patient->prenom}}</dd>

                    <dt class="col-sm-4">Age</dt>
                    <dd class="col-sm-8">{{$age}}</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-4">Salle</dt>
                    <dd class="col-sm-8">{{$position->nom}}</dd>

                    <dt class="col-sm-4">Unité</dt>
                    <dd class="col-sm-8">{{$position->nom_unite}}</dd>

                    <dt class="col-sm-4">Salle</dt>
                    <dd class="col-sm-8">{{$position->nom_salle}}</dd>

                    <dt class="col-sm-4">Lit</dt>
                    <dd class="col-sm-8">{{$position->nom_lit}}</dd>
                </dl>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h3>Liste des médicaments</h3>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-2">Médicament</th>
                            <th class="col-md-2">Dose</th>
                            <th class="col-md-2">Voie</th>
                            <th class="col-md-2">Date et Heure</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($soins as $soin)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $soin->name }} {{ $soin->prenom_inf }}</td>
                            <td class="col-md-2">{{ $soin->nom_medic }}</td>
                            <td class="col-md-2">{{ $soin->dose_admini }}</td>
                            <td class="col-md-2">{{ $soin->voie }}</td>
                            <td class="col-md-2">{{ $soin->created_at }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/soin/get/{{ $soin->id_soin }}">Modifier</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/soin/remove/{{ $soin->id_soin }}">Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Liste des psychotropes</h3>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-2">Médecin</th>
                            <th class="col-md-2">Psychotrope</th>
                            <th class="col-md-2">Mat. Psychotrope</th>
                            <th class="col-md-2">Date et Heure</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($psys as $psy)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $psy->name_inf }} {{ $psy->prenom_inf }}</td>
                            <td class="col-md-2">{{ $psy->name_med }} {{ $psy->prenom_med }}</td>
                            <td class="col-md-2">{{ $psy->nom_psy }}</td>
                            <td class="col-md-2">{{ $psy->mat_psy }}</td>
                            <td class="col-md-2">{{ $psy->created_at }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/psychotrope/get/{{ $psy->id_psy }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/psychotrope/remove/{{ $psy->id_psy }}">Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Liste des prelevements</h3>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-1">Infermiere</th>
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
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($prelevs as $prelev)
                        <tr class="d-flex">
                            <td class="col-md-1">{{ $prelev->name_inf }} {{ $prelev->prenom_inf }}</td>
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
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/prelevement/get/{{ $prelev->id_prel }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/prelevement/remove/{{ $prelev->id_prel }}">Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            </div>
        </div>
    </div>
@endsection