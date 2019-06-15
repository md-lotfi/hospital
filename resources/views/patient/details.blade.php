@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Détails sur le patient</h3>
            <dl class="row">
                <dt class="col-sm-3">Nom</dt>
                <dd class="col-sm-9">{{$patient->nom}}</dd>

                <dt class="col-sm-3">Prénom</dt>
                <dd class="col-sm-9">{{$patient->prenom}}</dd>

                <dt class="col-sm-3">Date de naissance</dt>
                <dd class="col-sm-9">{{$patient->datenai}}</dd>

                <dt class="col-sm-3">Prénom du père</dt>
                <dd class="col-sm-9">{{$patient->prenompere}}</dd>

                <dt class="col-sm-3">Nom mère</dt>
                <dd class="col-sm-9">{{$patient->nommere}}</dd>

                <dt class="col-sm-3">Prénom de la mère</dt>
                <dd class="col-sm-9">{{$patient->prenommere}}</dd>

                <dt class="col-sm-3">Adresse</dt>
                <dd class="col-sm-9">{{$patient->adresse}}</dd>
            </dl>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3>Admissions</h3>
                    <table class="table">
                        <head>
                            <tr class="d-flex">
                                <th class="col-md-3">Motif</th>
                                <th class="col-md-3">Dignostique</th>
                                <th class="col-md-2">Date d'Admission</th>
                                <th class="col-md-3">Emplacement</th>
                                <th class="col-md-1">Actions</th>
                            </tr>
                        </head>

                        <body>
                        @if($admissions !== null)
                            @foreach($admissions as $admission)

                                <tr class="d-flex">
                                    <td class="col-md-3">{{ $admission->motif }}</td>
                                    <td class="col-md-3">{{ $admission->diag }}</td>
                                    <td class="col-md-2">{{ $admission->date_adm }}</td>
                                    <td class="col-md-3">
                                        @if(!empty($admission->nom_lit))
                                        <dl class="row">
                                            <dt class="col-sm-3">Service</dt>
                                            <dd class="col-sm-9">{{$admission->nom_service}}</dd>
                                            <dt class="col-sm-3">Unité</dt>
                                            <dd class="col-sm-9">{{$admission->nom_unite}}</dd>
                                            <dt class="col-sm-3">Salle</dt>
                                            <dd class="col-sm-9">{{$admission->nom_salle}}</dd>
                                            <dt class="col-sm-3">Lit</dt>
                                            <dd class="col-sm-9">{{$admission->nom_lit}}</dd>
                                        </dl>
                                        @else
                                            <b>Non installé</b>
                                        @endif
                                    </td>
                                    <td class="col-md-1">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/admission/update/{{ $admission->id_admission }}">Editer</a>
                                                <a class="dropdown-item" href="#">Supprimer</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/patientlit/service/{{ $admission->id_admission }}">Service</a>
                                                <a class="dropdown-item" href="/assign/add?idadm={{ $admission->id_admission }}">Garde malade</a>
                                                <a class="dropdown-item" href="/validate/update?idadm={{ $admission->id_admission }}">Valider admission</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </body>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>


@endsection