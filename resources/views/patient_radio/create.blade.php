@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('radio/patient/store') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="radio">Radio</label>
                <select id="radio" name="id_radio" class="form-control">
                    @foreach($radios as $radio)
                        <option value="{{$radio->id_radio}}">{{$radio->nom_radio}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner une radio</small>
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