@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <dl class="row">
                <dt class="col-sm-4">Nom</dt>
                <dd class="col-sm-8">{{$patient->nom}}</dd>

                <dt class="col-sm-4">Prénom</dt>
                <dd class="col-sm-8">{{$patient->prenom}}</dd>

                <dt class="col-sm-4">Age</dt>
                <dd class="col-sm-8">{{$age}}</dd>
            </dl>
            <hr>
            <dl class="row">
                <dt class="col-sm-4">Service</dt>
                <dd class="col-sm-8">{{$position->nom}}</dd>

                <dt class="col-sm-4">Unité</dt>
                <dd class="col-sm-8">{{$position->nom_unite}}</dd>

                <dt class="col-sm-4">Salle</dt>
                <dd class="col-sm-8">{{$position->nom_salle}}</dd>

                <dt class="col-sm-4">Lit</dt>
                <dd class="col-sm-8">{{$position->nom_lit}}</dd>
            </dl>
        </div>
        <div class="col-md-6">

        <form action="{{ url('soin') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nature">Nature</label>
                <select id="nature" name="id_medic" class="form-control">
                    @foreach($medics as $medic)
                        <option value="{{$medic->id_medic}}">{{$medic->nom_medic}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner un médicament</small>
            </div>

            <div class="form-group">
                <label for="dose">Dose</label>
                <input type="text" class="form-control" id="dose" name="dose" placeholder="Dose du médicament">
                <small class="form-text text-muted">Saisisser une dose</small>
            </div>

            <div class="form-group">
                <label for="voie">Voie</label>
                <select id="voie" name="nom_voie" class="form-control">
                    @foreach(\SP\Soin::VOIE_ADMINISTRATIONS as $voie)
                        <option value="{{$voie}}">{{$voie}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner une voie</small>
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