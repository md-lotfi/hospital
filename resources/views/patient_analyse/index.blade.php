@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <dl class="row">
                    <dt class="col-sm-4">Nom</dt>
                    <dd class="col-sm-8">{{$patient->nom}}</dd>

                    <dt class="col-sm-4">Prénom</dt>
                    <dd class="col-sm-8">{{$patient->prenom}}</dd>

                    <dt class="col-sm-4">Age</dt>
                    <dd class="col-sm-8">{{$age}}</dd>
                </dl>
            </div>
            <div class="col-md-9">
                <h1>Liste des analyses<a href="/analyse/patient/create/{{$id_adm}}" class="btn btn-warning float-right">Ajouter une analyse</a></h1>
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
                                        Action
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
    </div>
@endsection