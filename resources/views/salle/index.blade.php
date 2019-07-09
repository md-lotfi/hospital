@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><u>Service</u> -> <b>{{$service->nom}}</b> -> <u>Unité</u> -> <b>{{$service->nom_unite}}</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des salles<a href="/salle/create/{{$id_unite}}" class="btn btn-warning float-right">Ajouter une salle</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">N° salle</th>
                            <th class="col-md-8">Nom de la salle</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($salles as $salle)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $salle->id_salle }}</td>
                            <td class="col-md-8">{{ $salle->nom_salle }}</td>
                            <td class="col-md-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/salle/get/{{ $salle->id_salle }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/salle/remove/{{ $salle->id_salle }}">Supprimer</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/lit/create/{{ $salle->id_salle }}">Ajouter un lit</a>
                                        <a class="dropdown-item" href="/lit/{{ $salle->id_salle }}">Consulter les lits</a>
                                        <a class="dropdown-item" href="/salle/list/{{ $salle->id_salle }}">Voire liste patients</a>
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