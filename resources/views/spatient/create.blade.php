@extends('layouts.app')
@section('content')

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
        <div class="col-md-5">

        <form action="{{ url('spatient') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nature">Type de diagnostique</label>
                <select id="nature" name="type" class="form-control">
                    @foreach(\SP\SortiePatient::DIAGNOSTIC as $diag)
                        <option value="{{$diag}}">{{$diag}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner un type de diagnostique</small>
            </div>

            <div class="form-group">
                <label for="d">Date</label>
                <input type="date" id="d" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" name="date_sortie">
                <small class="form-text text-muted">Saisisser une date</small>
            </div>

            <div class="form-group">
                <label for="t">Heur de sortie</label>
                <input type="time" id="t" value="{{ Carbon\Carbon::now()->format('h:m:s') }}" class="form-control" name="heur_sortie">
                <small class="form-text text-muted">Saisisser l'heur de sortie</small>
            </div>

            <div class="form-group">
                <label for="diag">Diagnostique</label>
                <textarea rows="3" class="form-control" id="diag" name="diagnostic"></textarea>
                <small class="form-text text-muted">Saisisser le diagnostique du patient</small>
            </div>
            <input type="hidden" value="{{$id_adm}}" name="id_adm">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
@endsection