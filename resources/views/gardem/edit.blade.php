@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('gardem/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" value="{{$gardem->nom}}" id="nom" name="nom" placeholder="Nom du garde malade">
                        <small class="form-text text-muted">Saisisser un nom</small>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" value="{{$gardem->prenom}}" id="prenom" name="prenom" placeholder="Prénom du garde malade">
                        <small class="form-text text-muted">Saisisser un prénom</small>
                    </div>

                    <div class="form-group">
                        <label for="lien_parent">Lien parent</label>
                        <input type="text" class="form-control" value="{{$gardem->lien_parent}}" id="lien_parent" name="lien_parent" placeholder="Lien parent">
                        <small id="emailHelp" class="form-text text-muted">Saisisser un lien parent</small>
                    </div>

                    <div class="form-group">
                        <label for="adr">Adresse</label>
                        <input type="text" class="form-control" value="{{$gardem->adr}}" id="adr" name="adr" placeholder="Adresse">
                        <small class="form-text text-muted">Saisisser l'adresse</small>
                    </div>

                    <div class="form-group">
                        <label for="tel">Tél</label>
                        <input type="tel" class="form-control" value="{{$gardem->tel}}" id="tel" name="tel" placeholder="Nom du tel">
                        <small class="form-text text-muted">Saisisser le numéro de tél</small>
                    </div>
                    <input type="hidden" name="id_gardem" value="{{ $gardem->id_gardem }}" />
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection