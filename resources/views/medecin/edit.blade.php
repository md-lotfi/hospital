@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('medecin/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" value="{{$med->name}}" id="nom" name="nom" placeholder="Nom du médecin">
                        <small class="form-text text-muted">Saisisser un nom</small>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" value="{{$med->prenom_med}}" id="prenom" name="prenom" placeholder="Prénom du médecin">
                        <small class="form-text text-muted">Saisisser un prénom</small>
                    </div>

                    <div class="form-group">
                        <label for="adr">Adresse</label>
                        <input type="text" class="form-control" value="{{$med->adr_med}}" id="adr" name="adr" placeholder="Adresse">
                        <small class="form-text text-muted">Saisisser l'adresse</small>
                    </div>

                    <div class="form-group">
                        <label for="tel">Tél</label>
                        <input type="tel" class="form-control" value="{{$med->tel_med}}" id="tel" name="tel" placeholder="Numéro du tel">
                        <small class="form-text text-muted">Saisisser le numéro de tél</small>
                    </div>

                    <div class="form-group">
                        <label for="spec">Specialité</label>
                        <input type="text" class="form-control" value="{{$med->spec_med}}" id="spec" name="spec_med" placeholder="Specialité">
                        <small class="form-text text-muted">Saisisser la specialité du médecin</small>
                    </div>

                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input type="text" class="form-control" value="{{$med->grade_med}}" id="grade" name="grade_med" placeholder="Grade">
                        <small class="form-text text-muted">Saisisser le grade du médecin</small>
                    </div>

                    <input type="hidden" value="{{$med->id_med}}" name="id_med">
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection
