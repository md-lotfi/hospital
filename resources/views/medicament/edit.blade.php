@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{ url('medicament/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom">Nom médicaments</label>
                        <input type="text" class="form-control" value="{{$medic->nom_medic}}" id="nom" name="nom_medic" placeholder="Nom du medicament">
                        <small class="form-text text-muted">Saisisser un nom du médicament</small>
                    </div>

                    <div class="form-group">
                        <label for="dose">Ajouter une dose</label>
                        <input type="text" class="form-control" value="{{$medic->dose_medic}}" id="dose" name="dose_medic" placeholder="Ajouter une dose">
                        <small class="form-text text-muted">Saisisser une dose</small>
                    </div>
                    <input type="hidden" name="id_medic" value="{{ $medic->id_medic }}" />
                    <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection