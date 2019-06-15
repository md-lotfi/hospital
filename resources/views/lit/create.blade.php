@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('lit') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nom de lit</label>
                <input type="text" class="form-control" id="name" name="nom_lit" aria-describedby="nomdellit" placeholder="Nom du lit">
                <small id="nomdellit" class="form-text text-muted">Saisisser un nom pour le lit</small>
            </div>

            <input type="hidden" name="id_salle" value="{{ $id_salle }}">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
            <a href="/lit/{{ $id_salle }}"><- Retoure</a>
        </div>
    </div>
</div>

@endsection