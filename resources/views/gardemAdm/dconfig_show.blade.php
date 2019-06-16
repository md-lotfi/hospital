@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2>Selectionné une date de début / fin</h2>
                <form action="{{ url('dconfig_show') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input type="date" name="date_debut" class="form-control" id="date_debut" >
                        <small id="date_fin" class="form-text text-muted">Ce champ est obligatoire.</small>
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin</label>
                        <input type="date" name="date_fin" class="form-control" id="date_fin" >
                        <small id="date_fin" class="form-text text-muted">Ce champ est facultative.</small>
                    </div>

                    <input type="hidden" name="id_gardem" value="{{$id_gardem}}">
                    <input type="hidden" name="id_adm" value="{{$id_adm}}">
                    <button class="btn btn-success float-right">Ok</button>
                </form>
            </div>
        </div>
    </div>
@endsection