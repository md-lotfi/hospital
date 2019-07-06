@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('gardem') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom du garde malade">
                <small class="form-text text-muted">Saisisser un nom</small>
                @error('nom')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" placeholder="Prénom du garde malade">
                <small class="form-text text-muted">Saisisser un prénom</small>
                @error('prenom')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="lien_parent">Lien parent</label>
                <input type="text" class="form-control" id="lien_parent" name="lien_parent" placeholder="Lien parent">
                <small id="emailHelp" class="form-text text-muted">Saisisser un lien parent</small>
            </div>

            <div class="form-group">
                <label for="adr">Adresse</label>
                <input type="text" class="form-control" id="adr" name="adr" placeholder="Adresse">
                <small class="form-text text-muted">Saisisser l'adresse</small>
            </div>

            <div class="form-group">
                <label for="tel">Tél</label>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Nom du tel">
                <small class="form-text text-muted">Saisisser le numéro de tél</small>
            </div>
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>

@endsection