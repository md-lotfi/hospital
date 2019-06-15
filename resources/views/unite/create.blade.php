@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('unite') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nom de l'unité</label>
                <input type="text" class="form-control" id="name" name="nom_unite" aria-describedby="nomdelunite" placeholder="Nom de l'unite">
                <small id="emailHelp" class="form-text text-muted">Saisisser un nom pour l'unité</small>
            </div>

            <input type="hidden" name="id_service" value="{{ $id_service }}">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
            <a href="/unite/{{ $id_service }}"><- Retoure</a>
        </div>
    </div>
</div>

@endsection