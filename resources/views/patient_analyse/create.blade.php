@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('analyse/patient/store') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="analyse">Analyse</label>
                <select id="analyse" name="id_analyse" class="form-control">
                    @foreach($analyses as $analyse)
                        <option value="{{$analyse->id_analyse}}">{{$analyse->nom_analyse}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner un analyse</small>
            </div>

            <div class="form-group">
                <label for="results">Résulta (optionnel)</label>
                <textarea class="form-control" id="results" name="results" rows="3"></textarea>
                <small class="form-text text-muted">Saisisser le résulta si terminer</small>
            </div>

            <input type="hidden" name="id_adm" value="{{$id_adm}}">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>

@endsection