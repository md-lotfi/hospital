@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des médecins<a href="/medecin/create" class="btn btn-warning float-right">Ajouter un médecin</a></h1>
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
                    @foreach($meds as $med)
                        <tr class="d-flex">
                            <td class="col-md-1">{{ $med->id_med }}</td>
                            <td class="col-md-3">{{ $med->name }}</td>
                            <td class="col-md-3">{{ $med->prenom_med }}</td>
                            <td class="col-md-2">{{ $med->adr_med }}</td>
                            <td class="col-md-2">{{ $med->tel_med }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/medecin/get/{{ $med->id_med }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/medecin/remove/{{ $med->id_med }}">Supprimer</a>
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