@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h1>Détails sur le patient</h1>

            {{ $patient->nom }}<br>
            {{ $patient->prenom }}<br>
            {{ $patient->datenai }}<br>
            {{ $patient->prenompere }}<br>
            {{ $patient->nommere }}<br>
            {{ $patient->prenommere }}<br>
            {{ $patient->adresse }}
        </div>
        <div class="col-md-3">
            <h1>Admissions</h1>
            <table class="table">
                <head>
                    <tr>
                        <th>Motif</th>
                        <th>Dignostique</th>
                        <th>Date d'Admission</th>
                        <th>Date de Sortie</th>
                        <th>Etat de Sortie</th>
                        <th>Actions</th>
                    </tr>
                </head>

                <body>
                @foreach($admissions as $admission)
                    <tr>
                        <td>{{ $admission->motif }}</td>
                        <td>{{ $admission->diag }}</td>
                        <td>{{ $admission->date_adm }}</td>
                        <td>{{ $admission->date_sort }}</td>
                        <td>{{ $admission->etat_sort }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admission/update/{{ $admission->id_adm }}">Editer</a>
                                    <a class="dropdown-item" href="#">Supprimer</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="patient/dispatch?idadm={{ $admission->id_adm }}">Service</a>
                                    <a class="dropdown-item" href="assign/add?idadm={{ $admission->id_adm }}">Assigner garde malade</a>
                                    <a class="dropdown-item" href="validate/update?idadm={{ $admission->id_adm }}">Valider admission</a>
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