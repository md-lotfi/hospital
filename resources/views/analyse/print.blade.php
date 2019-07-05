@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-6 text-center">
                <h6><b><u>WILAYA DE MILA</u></b></h6>
                <h6><b><u>ETABLISSEMENT PUBLIC HOSPITALIER</u></b></h6>
                <h6><b><u>MOHAMED MEDDAHI FERDJIOUA</u></b></h6>
                <p style="padding: 0;margin: 0">Tél: 031 49 50 69/74/75</p>
                <p style="padding: 0;margin: 0">Fax: 031 49 50 70/73/76</p>
            </div>
            <div class="col-xs-6 text-center" style="border: 2px #333 solid">
                <h5>No d'enregistrement au service de radiologie</h5>
                <p>.....................................</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 text-center">
                <h3 class="text-center">DEMANDE D'EXAMENS DE RADIOLOGIE</h3>
            </div>
            <div class="col-xs-2 text-center">
                <h4><b>N° </b>{{str_pad($radio->id_radio, 7, "0", STR_PAD_LEFT)}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <p><b>Docteur: </b>{{$doctor->name}} {{$doctor->prenom_med}}</p>
                <p><b>Nom et prénom du malade: </b>{{$patient->nom}} {{$patient->prenom}}</p>
                <p><b>Age: </b>{{$age}} ans</p>
                <p><b>Adresse: </b>{{$patient->adresse}}</p>
            </div>
            <div class="col-xs-4" style="border-left: 1px #333 solid">
                <p><b>Service: </b>{{$lit->nom}}</p>
                <p><b>Unité: </b>{{$lit->nom_unite}}</p>
                <p><b>Salle: </b>{{$lit->nom_salle}}</p>
                <p><b>Lit: </b>{{$lit->nom_lit}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4 class="text-center"><b><u>DIAGNOSTIC CLINIQUE</u></b></h4>
                <p>{{$patient->diag}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5" style="border-right: 1px #333 dashed">
                <h5 class="text-center"><b><u>Examens demandés</u></b></h5>
                <p>{{$radio->nom_radio}}</p>
            </div>
            <div class="col-xs-7">
                <h5 class="text-center"><b><u>RÉSULTATS</u></b> (interprétation des clichet)</h5>
                <p>{{$radio->results}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                Ferdjioua, Le {{\Carbon\Carbon::now()->format('d/m/Y')}}
                <h6><b>LE MÉDECIN</b></h6>
            </div>
        </div>
    </div>
@endsection