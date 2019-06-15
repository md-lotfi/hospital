@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form action="{{ url('salle/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nom de la salle</label>
                        <input type="text" class="form-control" id="name" value="{{ $salle->nom_salle }}" name="nom_salle" aria-describedby="nomdelasalle" placeholder="Nom de la salle">
                        <small id="emailHelp" class="form-text text-muted">Modifier le nom de la salle</small>
                    </div>
                    <input type="hidden" name="id_salle" value="{{ $salle->id_salle }}" />
                    <input type="hidden" name="id_unite" value="{{ $salle->id_unite }}" />
                    <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
                <a href="/salle/{{ $salle->id_unite }}"><- Retoure</a>
            </div>
        </div>
    </div>

@endsection