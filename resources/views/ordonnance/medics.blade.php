@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <dl class="row">
                    <dt class="col-sm-4">Nom</dt>
                    <dd class="col-sm-8">{{$patient->nom}}</dd>

                    <dt class="col-sm-4">Prénom</dt>
                    <dd class="col-sm-8">{{$patient->prenom}}</dd>

                    <dt class="col-sm-4">Age</dt>
                    <dd class="col-sm-8">{{$age}}</dd>
                </dl>
                <hr>
                <dl class="row">
                    <dt class="col-sm-4">N° Ordonnance</dt>
                    <dd class="col-sm-8">{{$patient->id_ord}}</dd>

                    <dt class="col-sm-4">Date de création</dt>
                    <dd class="col-sm-8">{{$patient->created_at}}</dd>

                    <dt class="col-sm-4">Observation</dt>
                    <dd class="col-sm-8">{{$patient->observation}}</dd>
                </dl>
            </div>
            <div class="col-md-9">
                <h1>Liste des préscriptions
                    <a href="/ordonnances/{{ $id_adm }}" class="btn btn-outline-danger float-right">Consulter les ordonnances</a>
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::MEDECIN_TYPE )
                        <a href="/ordonnances/medic/add/{{ $id_ord }}/{{ $id_adm }}" class="btn btn-warning float-right mr-2">Ajouter médicament</a>
                    @endif
                </h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-1">Item</th>
                            <th class="col-md-2">Médicament</th>
                            <th class="col-md-2">Doze</th>
                            <th class="col-md-2">Fréquence</th>
                            <th class="col-md-1">Period</th>
                            <th class="col-md-1">Durée</th>
                            <th class="col-md-2">Date et Heure</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($ords as $k => $ord)
                        <tr class="d-flex">
                            <td class="col-md-1">{{ $k+1 }}</td>
                            <td class="col-md-2">{{ $ord->nom_medic }}</td>
                            <td class="col-md-2">{{ $ord->doze_ord }}</td>
                            <td class="col-md-2">{{ $ord->freq_ord }}</td>
                            <td class="col-md-1">{{ $ord->delay_ord }}</td>
                            <td class="col-md-1">{{ $ord->qte_ord }}</td>
                            <td class="col-md-2">{{ $ord->created_at }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/ordonnances/medic/get/{{ $ord->id_ord_medic }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/ordonnances/medic/remove/{{ $ord->id_ord_medic }}">Supprimer</a>
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