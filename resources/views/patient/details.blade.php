@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Détails sur le patient</h1>

            {{ $patient->nom }}<br>
            {{ $patient->prenom }}<br>
            {{ $patient->datenai }}<br>
            {{ $patient->prenompere }}<br>
            {{ $patient->nommere }}<br>
            {{ $patient->prenommere }}<br>
            {{ $patient->adresse }}
        </div>
    </div>
</div>


@endsection