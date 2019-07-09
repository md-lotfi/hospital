@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Sortie du patient
                    <a href="/printer/print/spatient/{{$sortie->id_sp}}" class="btn btn-warning float-right">Imprimer</a>
                </h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <dl class="row">
                    <dt class="col-sm-4">Nom patient</dt>
                    <dd class="col-sm-8">{{$sortie->nom}}</dd>

                    <dt class="col-sm-4">Prénom patient</dt>
                    <dd class="col-sm-8">{{$sortie->prenom}}</dd>

                    <dt class="col-sm-4">Age</dt>
                    <dd class="col-sm-8">{{SP\Patient::getAge($sortie->datenai)}}</dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl class="row">
                    <dt class="col-sm-4">Nom secrétaire</dt>
                    <dd class="col-sm-8">{{$sortie->name}}</dd>

                    <dt class="col-sm-4">Prénom secrétaire</dt>
                    <dd class="col-sm-8">{{$sortie->prenom_sec}}</dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl class="row">
                    <dt class="col-sm-4">N° sortie</dt>
                    <dd class="col-sm-8">{{$sortie->id_sp}}</dd>

                    <dt class="col-sm-4">Diagnostique de sortie</dt>
                    <dd class="col-sm-8">{{$sortie->diagnostic}}</dd>

                    <dt class="col-sm-4">Type</dt>
                    <dd class="col-sm-8">{{$sortie->type}}</dd>

                    <dt class="col-sm-4">Date de sortie</dt>
                    <dd class="col-sm-8">{{$sortie->date_sortie}}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection