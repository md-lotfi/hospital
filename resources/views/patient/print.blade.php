@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><u>ETABLISSEMENT PUBLIC HOSPITALIER</u></h1>
                <h1><u>MOHAMED MEDDAHI FERDJIOUA</u></h1>
                <h1><b>DOSSIER DE MALADE</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>SERVICE: </b>.....................................
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-md-6">
                <p style="border: 1px #333 solid">
                    NOM: {{$patient->nom}}
                </p>
                <p>Prénom: {{$patient->prenom}}</p>
                <p>Date de naissance: {{$patient->datenai}}</p>
                <p>Adresse: {{$patient->adresse}}</p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8" style="border: 1px #333 solid">
                        <p>SALLE: {{$position->nom_salle}}</p>
                    </div>
                    <div class="col-md-4" style="border: 1px #333 solid">
                        <p>Lit: {{$position->nom_lit}}</p>
                    </div>
                </div>
                <p>Entré le: {{$patient->date_entre}}</p>
                <p>Sorti le: {{$patient->date_sortie}}</p>
                <p>....................Hospitalisation</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-md-8">
                <p style="border: 1px #333 solid">
                    DIAGNOSTIC
                </p>
                <p>
                    {{$patient->diag}}
                </p>
            </div>
            <div class="col-md-4">
                <p style="border: 1px #333 solid">
                    CLASSEMENT
                </p>
                <p style="border: 1px #333 solid">
                    D M ...................
                </p>
                <p style="border: 1px #333 solid">
                    F C ...................
                </p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-md-12">
                <p>Etat à l'entrée:</p>
                <p>{{$patient->motif}}</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-md-12">
                <p>Traitements Subis:</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-md-12">
                <p>Etat à la sortie:</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-md-12">
                <h1>EXPLORATIONS COMPLÉMENTAIRES</h1>
                Affiche en tableau les examens,
                Date | Nature de L'éxamen | Résultats
            </div>
        </div>
    </div>
@endsection