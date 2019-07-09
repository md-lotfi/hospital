@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
<div class="container mt-4">
    <h3>Détails sur le patient
        @if( app('request')->input('state') === 'es' )
            <a href="/spatient/create/{{$patient->id_admission}}" class="btn btn-warning float-right">Diagnostique de sortie</a>
        @elseif( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE )
            <a href="/gardem/historique/{{$patient->id_admission}}" class="btn btn-warning float-right">Historique des gardes malades</a>
            <a href="/patient/edit/{{$patient->id_patient}}" class="btn btn-info float-right mr-3">Editer patient</a>
        @endif
    </h3>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <dl class="row">
                <dt class="col-sm-3">Nom</dt>
                <dd class="col-sm-9">{{$patient->nom}}</dd>

                <dt class="col-sm-3">Prénom</dt>
                <dd class="col-sm-9">{{$patient->prenom}}</dd>

                <dt class="col-sm-3">Date de naissance</dt>
                <dd class="col-sm-9">{{Carbon\Carbon::parse($patient->datenai)->format('d/m/Y')}}</dd>

                <dt class="col-sm-3">Prénom du père</dt>
                <dd class="col-sm-9">{{$patient->prenompere}}</dd>

            </dl>
        </div>
        <div class="col-md-6">
            <dl class="row">
                <dt class="col-sm-3">Nom mère</dt>
                <dd class="col-sm-9">{{$patient->nommere}}</dd>

                <dt class="col-sm-3">Prénom de la mère</dt>
                <dd class="col-sm-9">{{$patient->prenommere}}</dd>

                <dt class="col-sm-3">Adresse</dt>
                <dd class="col-sm-9">{{$patient->adresse}}</dd>
            </dl>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-3">Admissions
                        @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE )
                            <a href="/admission/create/{{$patient->id_patient}}" class="btn btn-success float-right mr-3">Ajouter Admission</a>
                        @endif
                    </h3>
                    <table class="table">
                        <head>
                            <tr class="d-flex">
                                <th class="col-md-2">Motif</th>
                                <th class="col-md-2">Dignostique</th>
                                <th class="col-md-2">Date d'Admission</th>
                                <th class="col-md-2">Emplacement</th>
                                <th class="col-md-2">Garde M.</th>
                                <th class="col-md-1">Etat Patient</th>
                                <th class="col-md-1">Actions</th>
                            </tr>
                        </head>

                        <body>
                        @if($admissions !== null)
                            @foreach($admissions as $admission)

                                <tr class="d-flex">
                                    <td class="col-md-2">{{ $admission->motif }}</td>
                                    <td class="col-md-2">{{ $admission->diag }}</td>
                                    <td class="col-md-2">{{ Carbon\Carbon::parse($admission->date_adm)->format('d/m/Y') }}</td>
                                    <td class="col-md-2">
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
                                            <a href="/patientlit/service/{{$admission->id_admission}}" class="btn btn-sm btn-primary float-right">+</a>
                                        @endif
                                    </td>
                                    <td class="col-md-2">
                                        @if(!empty($admission->nom_gardem))
                                            <dl class="row">
                                                <dt class="col-sm-3">Nom</dt>
                                                <dd class="col-sm-9">{{$admission->nom_gardem}}</dd>
                                                <dt class="col-sm-3">Prénom</dt>
                                                <dd class="col-sm-9">{{$admission->prenom_gardem}}</dd>
                                                <dt class="col-sm-3">Date début</dt>
                                                <dd class="col-sm-9">{{$admission->date_debut_gardem}}</dd>
                                            </dl>
                                        @else
                                            <b>Non installé</b>
                                            <a href="/assign/add/{{$admission->id_admission}}" class="btn btn-sm btn-primary float-right">+</a>
                                        @endif
                                    </td>
                                    <td class="col-md-1">
                                        @if( $admission->date_sortie )
                                            <span class="text-danger">Sortie le {{ Carbon\Carbon::parse($admission->date_sortie)->format('d/m/Y') }}</span>
                                        @else
                                            Admis
                                        @endif
                                    </td>
                                    <td class="col-md-1">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE )
                                                    <a class="dropdown-item" href="/admission/get/{{ $admission->id_admission }}">Editer</a>
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/admission/remove/{{ $admission->id_admission }}">Supprimer</a>
                                                    <div class="dropdown-divider"></div>
                                                @endif
                                                <a class="dropdown-item" target="_blank" href="/printer/print/patient/{{ $admission->id_admission }}">Imprimer Dossier</a>
                                                @if( $admission->id_sp !== null )
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="/spatient/{{ $admission->id_admission }}">Consulter Sortie Patient</a>
                                                @endif
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
        </div>
    </div>

</div>
@endsection