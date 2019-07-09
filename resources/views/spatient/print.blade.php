@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>SORTIE PATIENT</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>CADRE RESERVE AU PRATICIEN</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <dl class="dl-horizontal">
                    <dt>Nom patient</dt>
                    <dd>{{$sortie->nom}}</dd>
                    <dt>Prénom patient</dt>
                    <dd>{{$sortie->prenom}}</dd>
                    <dt>Age</dt>
                    <dd>{{SP\Patient::getAge($sortie->datenai)}}</dd>
                </dl>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-6">
                <dl class="dl-horizontal">
                    <dt>Date de sortie</dt>
                    <dd>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sortie->date_sortie)->format('d/m/Y') }}</dd>
                    <dt>Mode de sortie</dt>
                    <dd>{{$sortie->type}}</dd>
                    <dt>Dignostic ou motif d'entrée</dt>
                    <dd>{{$sortie->diag}}</dd>
                    <dt>Diagnostique de sortie</dt>
                    <dd>{{$sortie->diagnostic}}</dd>
                    <dt>Code C.I.M</dt>
                    <dd>|___|___|___|</dd>
                </dl>
            </div>
            <div class="col-xs-6">
                <dl class="dl-horizontal">
                    <dt>Heur de sortie</dt>
                    <dd>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sortie->date_sortie)->format('H:i:s') }}</dd>

                    <dt>Code de sortie</dt>
                    <dd>|___|___|</dd>

                    <dt>Code C.H.M</dt>
                    <dd>|___|___|___|</dd>
                </dl>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-xs-6 text-left">
                <h4>Nom prénom et grade du praticien</h4>
            </div>
            <div class="col-xs-6 text-right">
                <p>Visa du chef de service</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 text-center">
                <p>Date et cachet</p>
                <p>Signature,</p>
            </div>
        </div>
    </div>
@endsection