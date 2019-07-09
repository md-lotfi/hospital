@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des soins
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE )
                        <a href="/admission/create/{{$id_patient}}" class="btn btn-warning float-right">Ajouter une Admission</a>
                    @endif
                </h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-1">N° Adm</th>
                            <th class="col-md-4">Motif</th>
                            <th class="col-md-4">Diagnostique</th>
                            <th class="col-md-2">Date et Heure</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($adms as $adm)
                        <tr class="d-flex">
                            <td class="col-md-1">{{ $adm->id_adm }}</td>
                            <td class="col-md-4">{{ $adm->motif }}</td>
                            <td class="col-md-4">{{ $adm->diag }}</td>
                            <td class="col-md-2">{{ $adm->created_at }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/admission/get/{{ $adm->id_adm }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/admission/remove/{{ $adm->id_adm }}">Supprimer</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/patientlit/service/{{ $adm->id_adm }}?set=redispatch">Re-dispatcher le patient</a>
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