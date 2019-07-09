@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des médicaments<a href="/medicament/create" class="btn btn-warning float-right">Ajouter un médicament</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">N°</th>
                            <th class="col-md-5">Nom Médicament</th>
                            <th class="col-md-4">Dose</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($medics as $medic)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $medic->id_medic }}</td>
                            <td class="col-md-5">{{ $medic->nom_medic }}</td>
                            <td class="col-md-4">{{ $medic->dose_medic }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/medicament/get/{{ $medic->id_medic }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/medicament/remove/{{ $medic->id_medic }}">Supprimer</a>
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