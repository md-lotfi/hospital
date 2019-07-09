@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('lit/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nom du lit</label>
                        <input type="text" class="form-control" id="name" value="{{ $lit->nom_lit }}" name="nom_lit" aria-describedby="nomdelit" placeholder="Nom du lit">
                        <small id="nomdelit" class="form-text text-muted">Modifier le nom de la salle</small>
                    </div>
                    <input type="hidden" name="id_salle" value="{{ $lit->id_salle }}" />
                    <input type="hidden" name="id_lit" value="{{ $lit->id_lit }}" />
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
                <a href="/lit/{{ $lit->id_salle }}"><- Retoure</a>
            </div>
        </div>
    </div>

@endsection