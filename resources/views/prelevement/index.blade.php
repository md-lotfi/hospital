@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
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
                <h1>Liste des prelevements
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::INFERMIERE_TYPE )
                        <a href="/prelevement/create/{{$id_adm}}" class="btn btn-warning float-right">Ajouter un prélevement</a>
                    @endif
                </h1>
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