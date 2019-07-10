@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1><u>ETABLISSEMENT PUBLIC HOSPITALIER</u></h1>
                <h1><u>MOHAMED MEDDAHI FERDJIOUA</u></h1>
                <h1><b>DOSSIER DE MALADE</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4><b>SERVICE: </b>{{$position->nom}}</h4>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-6">
                <h4 style="border: 1px #333 solid; padding: 5px">
                    <b>NOM: </b>{{$patient->nom}}
                </h4>
                <p><b>Prénom: </b>{{$patient->prenom}}</p>
                <p><b>Date de naissance: </b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $patient->datenai)->format('d/m/Y') }}</p>
                <p><b>Adresse: </b>{{$patient->adresse}}</p>
            </div>
            <div class="col-xs-6" style="border-left: 1px #333 solid">
                <div class="row" style="border-bottom: 1px #333 solid">
                    <div class="col-xs-7">
                        <h4 style="border: 1px #333 solid; padding: 5px"><b>SALLE: </b>{{$position->nom_salle}}</h4>
                    </div>
                    <div class="col-xs-5" style="padding: 0px">
                        <h4 style="border: 1px #333 solid; padding: 5px; margin-right: 10px;"><b>LIT: </b>{{$position->nom_lit}}</h4>
                    </div>
                </div>
                <p><b>Entré le: </b>{{$patient->date_adm}}</p>
                <p><b>Sorti le: </b>{{$sortie->date_sortie}}</p>
                <p>...................................................................Hospitalisation</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-8">
                <h4 style="border: 1px #333 solid; padding: 5px">
                    <b>DIAGNOSTIC</b>
                </h4>
                <p>
                    {{$patient->diag}}
                </p>
            </div>
            <div class="col-xs-4" style="border-left: 1px #333 solid; margin: 0px; padding: 0px">
                <h4 class="text-center" style="border-bottom: 1px #333 solid; padding: 5px; margin: 0px;">
                    CLASSEMENT
                </h4>
                <h4 style="border: 1px #333 solid; padding: 5px; margin: 10px">
                    D M ...................
                </h4>
                <h4 style="border: 1px #333 solid; padding: 5px; margin: 10px">
                    F C ...................
                </h4>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-12">
                <h4><b>Etat à l'entrée:</b></h4>
                <p>{{$patient->motif}}</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-12">
                <h4><b>Traitements Subis:</b></h4>
                <h6>Médicaments:</h6>
                @foreach( $soins as $k => $soin )
                    <ul class="list-unstyled">
                        <li>{{$k+1}} - <b>{{$soin->nom_medic}}</b>, {{$soin->dose_admini}}</li>
                    </ul>
                @endforeach
                <h6>Psychotropes:</h6>
                @foreach( $psys as $kp => $psy )
                    <ul class="list-unstyled">
                        <li>{{$kp+1}} - <b>{{$psy->nom_psy}}</b>, {{$psy->mat_psy}}</li>
                    </ul>
                @endforeach
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-12">
                <h4><b>Etat à la sortie:</b></h4>
                <p>Type de sortie: {{$sortie->type}}</p>
                <p>Diagnostic: {{$sortie->diagnostic}}</p>
            </div>
        </div>
        <div class="row" style="border: 2px #333 solid">
            <div class="col-xs-12">
                <h1 class="text-center"><u><b>EXPLORATIONS COMPLÉMENTAIRES</b></u></h1>
                <table class="table borderless">
                    <head>
                        <tr>
                            <th>Date</th>
                            <th>Nature de l'examen</th>
                            <th>Resultats</th>
                        </tr>
                    </head>
                    <tbody>
                    @foreach($analyses as $analyse)
                        <tr>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $analyse->created_at)->format('d/m/Y')}}</td>
                            <td>{{$analyse->nom_analyse}}</td>
                            <td>{{$analyse->results}}</td>
                        </tr>
                    @endforeach
                    @foreach($radios as $radio)
                        <tr>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $radio->created_at)->format('d/m/Y')}}</td>
                            <td>{{$radio->nom_radio}}</td>
                            <td>{{$radio->results}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection