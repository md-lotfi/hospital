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
            <div class="col-xs-6 text-center" style="border: 1px #333 solid">
                <h5><b>DOCTEUR</b></h5>
                <p>{{$doctor->name}} {{$doctor->prenom_med}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 text-center">
                <h4 class="text-danger">{{str_pad($ord->id_ord, 7, "0", STR_PAD_LEFT)}}</h4>
            </div>
            <div class="col-xs-6 text-center">
                <p><b>Ferdjioua le: </b>{{$ord->created_at->format('d/m/Y')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <p><b>Nom et Prénom: </b>{{$patient->nom}} {{$patient->prenom}}</p>
            </div>
            <div class="col-xs-4 ">
                <p><b>Age: </b>{{$age}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">ORDONNANCE</h3>
                <hr>
                @foreach($ords as $k => $ord)
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $k+1 }} - <b>{{ $ord->nom_medic }}</b>, {{ $ord->doze_ord }}</h4>
                            <h4 style="padding-left: 2em">{{ $ord->freq_ord }} fois, {{ $ord->delay_ord }} / {{ $ord->qte_ord }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection