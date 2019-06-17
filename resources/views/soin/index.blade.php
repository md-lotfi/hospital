@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des infermières<a href="/infermiere/create" class="btn btn-warning float-right">Ajouter une infermiere</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-3">Médicament</th>
                            <th class="col-md-2">Dose</th>
                            <th class="col-md-2">Voie</th>
                            <th class="col-md-1">Date et Heure</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($soins as $soin)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $soin->nom }} {{ $soin->prenom }}</td>
                            <td class="col-md-3">{{ $soin->nom_inf }} {{ $soin->prenom_inf }}</td>
                            <td class="col-md-3">{{ $soin->nom_medic }}</td>
                            <td class="col-md-2">{{ $inf->adr_inf }}</td>
                            <td class="col-md-2">{{ $inf->tel_inf }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/infermiere/get/{{ $inf->id_inf }}">Editer</a>
                                        <a class="dropdown-item" href="/infermiere/remove/{{ $inf->id_inf }}">Supprimer</a>
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