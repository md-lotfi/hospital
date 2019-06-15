@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des unités<a href="/unite/create/{{$id_service}}" class="btn btn-warning float-right">Ajouter une unité</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">N° unité</th>
                            <th class="col-md-8">Nom de l'unité</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($unites as $unite)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $unite->id_unite }}</td>
                            <td class="col-md-8">{{ $unite->nom_unite }}</td>
                            <td class="col-md-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/unite/get/{{ $unite->id_unite }}">Editer</a>
                                        <a class="dropdown-item" href="/unite/remove/{{ $unite->id_unite }}">Supprimer</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/salle/create/{{ $unite->id_unite }}">Ajouter une salle</a>
                                        <a class="dropdown-item" href="/salle/get/{{ $unite->id_unite }}">Consulter les salles</a>
                                        <a class="dropdown-item" href="/patients/list/{{ $unite->id_unite }}">Voire liste patients</a>
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