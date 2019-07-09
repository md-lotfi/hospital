@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
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
                <h1>Liste des radios<a href="/radio/patient/create/{{$id_adm}}" class="btn btn-warning float-right">Ajouter une radio</a></h1>
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
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/radio/patient/get/{{ $radio->id_pr }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/radio/patient/remove/{{ $radio->id_pr }}">Supprimer</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" target="_blank" href="/printer/print/radio/{{ $radio->id_pr }}">Imprimer</a>
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