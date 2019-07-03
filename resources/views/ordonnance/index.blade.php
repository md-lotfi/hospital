@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Patient</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nom</dt>
                            <dd class="col-sm-8">{{$patient->nom}}</dd>

                            <dt class="col-sm-4">Prénom</dt>
                            <dd class="col-sm-8">{{$patient->prenom}}</dd>

                            <dt class="col-sm-4">Age</dt>
                            <dd class="col-sm-8">{{$age}}</dd>
                        </dl>
                        <a class="card-link float-right" href="/patient/get/{{$patient->id_patient}}">Voir détail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @if(\Illuminate\Support\Facades\Auth::user()->type === \SP\User::MEDECIN_TYPE )
                    <div>
                        <a href="/radio/patient/create/{{$id_adm}}" class="btn btn-warning float-right">Ajouter une radio</a>
                        <a href="/analyse/patient/create/{{$id_adm}}" class="btn btn-warning float-right mr-3">Ajouter une analyse</a>
                        <a href="/ordonnances/create/{{$id_adm}}" class="btn btn-warning float-right mr-3">Ajouter une ordonnance</a>
                        <div class="clearfix"></div>
                    </div>
                    <hr>
                @endif
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Liste des ordonnances</h3>
                        <table class="table">
                            <head>
                                <tr class="d-flex">
                                    <th class="col-md-1">N° Ord</th>
                                    <th class="col-md-4">Médecin</th>
                                    <th class="col-md-4">Observation</th>
                                    <th class="col-md-2">Date et Heure</th>
                                    <th class="col-md-1">Action</th>
                                </tr>
                            </head>

                            <body>
                            @foreach($ords as $ord)
                                <tr class="d-flex">
                                    <td class="col-md-1">{{ $ord->id_ord }}</td>
                                    <td class="col-md-4">{{ $ord->name }} {{ $ord->prenom_med }}</td>
                                    <td class="col-md-4">{{ $ord->observation }}</td>
                                    <td class="col-md-2">{{ $ord->created_at }}</td>
                                    <td class="col-md-1">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                A
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/ordonnances/get/{{ $ord->id_ord }}">Editer</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/ordonnances/remove/{{ $ord->id_ord }}">Supprimer</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/ordonnances/medic/list/{{ $ord->id_ord }}">Voire détails</a>
                                                <a class="dropdown-item" href="/ordonnances/medic/add/{{ $ord->id_ord }}/{{ $ord->id_adm }}">Ajouter Médicaments</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </body>
                        </table>
                    </div>
                </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Liste des analyses</h3>
                            <table class="table">
                                <head>
                                    <tr class="d-flex">
                                        <th class="col-md-3">Analyse</th>
                                        <th class="col-md-4">Resultats</th>
                                        <th class="col-md-2">Date de création</th>
                                        <th class="col-md-2">Date de mise à jour</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </head>

                                <body>
                                @foreach($analyses as $anal)
                                    <tr class="d-flex">
                                        <td class="col-md-3">{{ $anal->nom_analyse }}</td>
                                        <td class="col-md-4">{{ $anal->results }}</td>
                                        <td class="col-md-2">{{ $anal->created_at }}</td>
                                        <td class="col-md-2">{{ $anal->updated_at }}</td>
                                        <td class="col-md-1">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    A
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/analyse/patient/get/{{ $anal->id_pa }}">Editer</a>
                                                    <a class="dropdown-item" href="/analyse/patient/remove/{{ $anal->id_pa }}">Supprimer</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </body>
                            </table>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Liste des Radios</h3>
                            <table class="table">
                                <head>
                                    <tr class="d-flex">
                                        <th class="col-md-3">Radio</th>
                                        <th class="col-md-4">Resultats</th>
                                        <th class="col-md-2">Date de création</th>
                                        <th class="col-md-2">Date de mise à jour</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </head>

                                <body>
                                @foreach($radios as $radio)
                                    <tr class="d-flex">
                                        <td class="col-md-3">{{ $radio->nom_radio }}</td>
                                        <td class="col-md-4">{{ $radio->results }}</td>
                                        <td class="col-md-2">{{ $radio->created_at }}</td>
                                        <td class="col-md-2">{{ $radio->updated_at }}</td>
                                        <td class="col-md-1">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    A
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/radio/patient/get/{{ $radio->id_pr }}">Editer</a>
                                                    <a class="dropdown-item" href="/radio/patient/remove/{{ $radio->id_pr }}">Supprimer</a>
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
        </div>
    </div>
@endsection