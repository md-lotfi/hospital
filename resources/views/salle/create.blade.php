@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('salle') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nom de la salle</label>
                <input type="text" class="form-control" id="name" name="nom_salle" aria-describedby="nomdelsalle" placeholder="Nom de la salle">
                <small id="emailHelp" class="form-text text-muted">Saisisser un nom pour la salle</small>
            </div>

            <input type="hidden" name="id_unite" value="{{ $id_unite }}">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
            <a href="/salle/{{ $id_unite }}"><- Retoure</a>
        </div>
    </div>
</div>

@endsection