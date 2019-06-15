@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des service<a href="/service/create" class="btn btn-warning float-right">Ajouter un service</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">N° service</th>
                            <th class="col-md-8">Nom du service</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($services as $service)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $service->id_service }}</td>
                            <td class="col-md-8">{{ $service->nom }}</td>
                            <td class="col-md-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/service/get/{{ $service->id_service }}">Editer</a>
                                        <a class="dropdown-item" href="/service/remove/{{ $service->id_service }}">Supprimer</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/unite/create/{{ $service->id_service }}">Ajouter Unite</a>
                                        <a class="dropdown-item" href="/unite/{{ $service->id_service }}">Consulter les unités</a>
                                        <a class="dropdown-item" href="/patients/list/{{ $service->id_service }}">Voire liste patients</a>
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