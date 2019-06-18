@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{ url('secretaire/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" value="{{$sec->nom_sec}}" id="nom" name="nom" placeholder="Nom du secrétaire">
                        <small class="form-text text-muted">Saisisser un nom</small>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" value="{{$sec->prenom_sec}}" id="prenom" name="prenom" placeholder="Prénom du secrétaire">
                        <small class="form-text text-muted">Saisisser un prénom</small>
                    </div>

                    <div class="form-group">
                        <label for="adr">Adresse</label>
                        <input type="text" class="form-control" value="{{$sec->adr_sec}}" id="adr" name="adr" placeholder="Adresse">
                        <small class="form-text text-muted">Saisisser l'adresse</small>
                    </div>

                    <div class="form-group">
                        <label for="tel">Tél</label>
                        <input type="tel" class="form-control" value="{{$sec->tel_sec}}" id="tel" name="tel" placeholder="Nom du tel">
                        <small class="form-text text-muted">Saisisser le numéro de tél</small>
                    </div>
                    <input type="hidden" name="id_sec" value="{{ $sec->id_sec }}" />
                    <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection