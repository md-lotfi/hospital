@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>SORTIE PATIENT</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-unstyled">
                    <li><b>Nom patient: </b>{{$sortie->nom}}</li>
                    <li><b>Prénom patient: </b>{{$sortie->prenom}}</li>
                    <li><b>Age: </b>{{SP\Patient::getAge($sortie->datenai)}}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>CADRE RESERVE AU PRATICIEN</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-6">
                <ul class="list-unstyled">
                    <li><b>Date de sortie: </b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sortie->date_sortie)->format('d/m/Y') }}</li>
                    <li><b>Mode de sortie: </b>{{$sortie->type}}</li>
                    <li><b>Dignostic ou motif d'entrée: </b>{{$sortie->diag}}</li>
                    <li><b>Diagnostique de sortie: </b>{{$sortie->diagnostic}}</li>
                    <li><b>Code C.I.M: </b>|___|___|___|</li>
                </ul>
            </div>
            <div class="col-xs-6">
                <ul class="list-unstyled">
                    <li><b>Heur de sortie: </b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sortie->date_sortie)->format('H:i:s') }}</li>

                    <li><b>Code de sortie: </b>|___|___|</li>

                    <li><b>Code C.H.M: </b>|___|___|___|</li>
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 20px; margin-bottom: 30px">
            <div class="col-xs-6 text-left">
                <h5>Nom prénom et grade du praticien</h5>
            </div>
            <div class="col-xs-6 text-right">
                <h5>Visa du chef de service</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 text-center">
                <h5 style="margin-bottom: 30px">Date et cachet</h5>
                <h5>Signature,</h5>
            </div>
        </div>
    </div>
@endsection