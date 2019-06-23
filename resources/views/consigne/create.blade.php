@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <dl class="row">
                <dt class="col-sm-4">Nom</dt>
                <dd class="col-sm-8">{{$patient->nom}}</dd>

                <dt class="col-sm-4">Prénom</dt>
                <dd class="col-sm-8">{{$patient->prenom}}</dd>

                <dt class="col-sm-4">Age</dt>
                <dd class="col-sm-8">{{$age}}</dd>
            </dl>
        </div>
        <div class="col-md-7">
        <form action="{{ url('consigne') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="obs">Observation</label>
                <textarea class="form-control" id="obs" name="observation" rows="3">
                </textarea>
                <small class="form-text text-muted">Saisisser une observation</small>
            </div>

            <input type="hidden" value="{{$id_patient}}" name="id_patient">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>
@endsection