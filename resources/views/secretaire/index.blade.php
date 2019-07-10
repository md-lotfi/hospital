@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des secrétaires<a href="/secretaire/create" class="btn btn-warning float-right">Ajouter une secrétaire</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-1">N°</th>
                            <th class="col-md-3">Nom</th>
                            <th class="col-md-3">Prénom</th>
                            <th class="col-md-2">Adresse</th>
                            <th class="col-md-2">Tél</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($secs as $sec)
                        <tr class="d-flex">
                            <td class="col-md-1">{{ $sec->id_sec }}</td>
                            <td class="col-md-3">{{ $sec->name }}</td>
                            <td class="col-md-3">{{ $sec->prenom_sec }}</td>
                            <td class="col-md-2">{{ $sec->adr_sec }}</td>
                            <td class="col-md-2">{{ $sec->tel_sec }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/secretaire/get/{{ $sec->id_sec }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/infermiere/remove/{{ $sec->id_sec }}">Supprimer</a>
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