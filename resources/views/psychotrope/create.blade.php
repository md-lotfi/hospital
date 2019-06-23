@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('psychotrope') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nom_psy">Nom psychotrope</label>
                <input type="text" class="form-control" id="nom_psy" name="nom_psy" placeholder="Nom du psychotrope">
                <small class="form-text text-muted">Saisisser un psychotrope</small>
            </div>

            <div class="form-group">
                <label for="mat_psy">Matricule psychotrope</label>
                <input type="text" class="form-control" id="mat_psy" name="MAT_psy" placeholder="Mat du psychotrope">
                <small class="form-text text-muted">Saisisser la matricule psychotrope</small>
            </div>

            <div class="form-group">
                <label for="med">Médecin</label>
                <select id="med" name="id_med" class="form-control">
                    @foreach($meds as $med)
                        <option value="{{$med->id_med}}">{{$med->prenom_med}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner un médecin</small>
            </div>
            <input type="hidden" value="{{$id_patient}}" name="id_patient">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>
@endsection