@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <dl class="row">
                    <dt class="col-sm-4">Nom</dt>
                    <dd class="col-sm-8">{{$admission->nom}}</dd>

                    <dt class="col-sm-4">Prénom</dt>
                    <dd class="col-sm-8">{{$admission->prenom}}</dd>

                    <dt class="col-sm-4">Age</dt>
                    <dd class="col-sm-8">{{\SP\Patient::getAge($admission->datenai)}}</dd>
                </dl>
                <hr>
                <dl class="row">
                    <dt class="col-sm-4">Service</dt>
                    <dd class="col-sm-8">{{$lit->nom}}</dd>

                    <dt class="col-sm-4">Unité</dt>
                    <dd class="col-sm-8">{{$lit->nom_unite}}</dd>

                    <dt class="col-sm-4">Salle</dt>
                    <dd class="col-sm-8">{{$lit->nom_salle}}</dd>

                    <dt class="col-sm-4">Lit</dt>
                    <dd class="col-sm-8">{{$lit->nom_lit}}</dd>
                </dl>
            </div>
            <div class="col-md-4">

                <form id="formSbm" action="{{ url('admission/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="motif">motif</label>
                        <textarea name="motif" class="form-control" id="motif" rows="3">{{$admission->motif}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="diag">diagnostic</label>
                        <textarea name="diag" class="form-control" id="diag" rows="3">{{$admission->diag}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="date_adm">date admission</label>
                        <input type="date" name="date_adm" value="{{Carbon\Carbon::parse($admission->date_adm)->format('Y-m-d')}}" class="form-control" id="date_adm" aria-describedby="date_adm" placeholder="Date d'admission">
                    </div>

                    <input type="hidden" name="id_patient" value="{{$admission->id_patient}}"/>
                    <input type="hidden" name="id_adm" value="{{$admission->id_adm}}"/>

                    <a class="btn btn-outline-info" href="/patient/get/{{$admission->id_patient}}">Détail patient</a>

                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-info float-right" value="Enregistrer">

                </form>
            </div>
        </div>
    </div>

@endsection