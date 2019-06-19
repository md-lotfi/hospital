@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

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
                    @foreach(\App\Soin::VOIE_ADMINISTRATIONS as $voie)
                        <option value="{{$voie}}">{{$voie}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner une voie</small>
            </div>
            <input type="hidden" value="{{$id_patient}}" name="id_patient">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>
@endsection