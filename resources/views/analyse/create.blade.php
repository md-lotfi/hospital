@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('analyse') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nom">Nom Analyse</label>
                <input type="text" class="form-control" id="nom" name="nom_analyse" placeholder="Nom de l'analyse">
                <small class="form-text text-muted">Saisisser un nom de l'analyse</small>
            </div>

            <div class="form-group">
                <label for="norm">Ajouter une norm</label>
                <input type="text" class="form-control" id="norm" name="norm_analyse" placeholder="Ajouter une norm">
                <small class="form-text text-muted">Saisisser une norm</small>
            </div>

            <div class="form-group">
                <label for="unite">Ajouter une unite</label>
                <input type="text" class="form-control" id="unte" name="unite_analyse" placeholder="Ajouter une unité d'analyse">
                <small class="form-text text-muted">Saisisser une unité d'analyse</small>
            </div>

            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>

@endsection