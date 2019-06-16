@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des gardes malades<a href="/gardem/create" class="btn btn-warning float-right">Ajouter un garde malade</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-1">N°</th>
                            <th class="col-md-3">Nom</th>
                            <th class="col-md-3">Lien P.</th>
                            <th class="col-md-2">Adresse</th>
                            <th class="col-md-2">Tél</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($gardems as $gardem)
                        <tr class="d-flex">
                            <td class="col-md-1">{{ $gardem->id_gardem }}</td>
                            <td class="col-md-3">{{ $gardem->nom }} {{ $gardem->prenom }}</td>
                            <td class="col-md-3">{{ $gardem->lien_parent }}</td>
                            <td class="col-md-2">{{ $gardem->adr }}</td>
                            <td class="col-md-2">{{ $gardem->tel }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/gardem/get/{{ $gardem->id_gardem }}">Editer</a>
                                        <a class="dropdown-item" href="/gardem/remove/{{ $gardem->id_gardem }}">Supprimer</a>
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