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
                    <dt class="col-sm-4">Service</dt>
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
                <h1>Liste des médicaments
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::INFERMIERE_TYPE )
                        <a href="/soins/create/{{$id_adm}}" class="btn btn-warning float-right">Ajouter un médicament</a>
                    @endif
                </h1>
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
    </div>
@endsection