@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

        <form action="{{ url('patient') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" required class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom du patient">
                    <small class="form-text text-muted">Saisisser un nom</small>
                    @error('nom')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="prenom">Prenom</label>
                    <input type="text" required class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" placeholder="Prenom du patient">
                    <small class="form-text text-muted">Saisisser un prenom</small>
                    @error('prenom')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="prenompere">Prénom du père</label>
                    <input type="text" class="form-control" id="prenompere" name="prenompere" placeholder="Prénom du père">
                    <small class="form-text text-muted">Saisisser le prénom du père</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="nommere">Nom de la mère</label>
                    <input type="text" class="form-control" id="nommere" name="nommere" placeholder="Nom de la mère">
                    <small class="form-text text-muted">Saisisser le nom de a mère</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="prenommere">Prénom de la mère</label>
                    <input type="text" class="form-control" id="prenommere" name="prenommere" placeholder="Prénom de la mère">
                    <small class="form-text text-muted">Saisisser le prénom de la mère</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="datenai">Date de naissance</label>
                    <input type="date" required class="form-control @error('datenai') is-invalid @enderror" id="datenai" name="datenai">
                    <small class="form-text text-muted">Saisisser une date</small>
                    @error('datenai')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse actuel de résidence">
                    <small class="form-text text-muted">Saisisser l'adresse de résidence</small>
                </div>
            </div>
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
        </form>
        </div>
    </div>
</div>

@endsection