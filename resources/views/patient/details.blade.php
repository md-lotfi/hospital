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
        <div class="col-md-9">
            <h1>Admissions</h1>
            <table class="table">
                <head>
                    <tr class="d-flex">
                        <th class="col-md-3">Motif</th>
                        <th class="col-md-3">Dignostique</th>
                        <th class="col-md-6">Date d'Admission</th>
                        <th>Actions</th>
                    </tr>
                </head>

                <body>
                @if($admissions !== null)
                @foreach($admissions as $admission)
                    <tr class="d-flex">
                        <td class="col-md-3">{{ $admission->motif }}</td>
                        <td class="col-md-3">{{ $admission->diag }}</td>
                        <td class="col-md-6">{{ $admission->date_adm }}</td>
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
                    @endif
                </body>
            </table>

        </div>
    </div>
</div>


@endsection