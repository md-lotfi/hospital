@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <form action="{{ url('medecin') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du médecin">
                    <small class="form-text text-muted">Saisisser un nom</small>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email du médecin">
                    <small class="form-text text-muted">Saisisser un email</small>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="*********">
                    <small class="form-text text-muted">Saisisser un mot de passe</small>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom du médecin">
                    <small class="form-text text-muted">Saisisser un prénom</small>
                </div>

                <div class="form-group">
                    <label for="adr">Adresse</label>
                    <input type="text" class="form-control" id="adr" name="adr" placeholder="Adresse">
                    <small class="form-text text-muted">Saisisser l'adresse</small>
                </div>

                <div class="form-group">
                    <label for="tel">Tél</label>
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Numéro du tel">
                    <small class="form-text text-muted">Saisisser le numéro de tél</small>
                </div>

                <div class="form-group">
                    <label for="spec">Specialité</label>
                    <input type="text" class="form-control" id="spec" name="spec_med" placeholder="Specialité">
                    <small class="form-text text-muted">Saisisser la specialité du médecin</small>
                </div>

                <div class="form-group">
                    <label for="grade">Grade</label>
                    <input type="text" class="form-control" id="grade" name="grade_med" placeholder="Grade">
                    <small class="form-text text-muted">Saisisser le grade du médecin</small>
                </div>

                <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

@endsection