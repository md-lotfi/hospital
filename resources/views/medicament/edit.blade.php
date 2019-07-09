@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form id="formSbm" action="{{ url('medicament/update') }}" method="post">

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
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection