@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form id="formSbm" action="{{ url('infermiere/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" value="{{$inf->name}}" id="nom" name="nom" placeholder="Nom dl'infermiere">
                        <small class="form-text text-muted">Saisisser un nom</small>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" value="{{$inf->prenom_inf}}" id="prenom" name="prenom" placeholder="Prénom de l'infermiere">
                        <small class="form-text text-muted">Saisisser un prénom</small>
                    </div>

                    <div class="form-group">
                        <label for="adr">Adresse</label>
                        <input type="text" class="form-control" value="{{$inf->adr_inf}}" id="adr" name="adr" placeholder="Adresse">
                        <small class="form-text text-muted">Saisisser l'adresse</small>
                    </div>

                    <div class="form-group">
                        <label for="tel">Tél</label>
                        <input type="tel" class="form-control" value="{{$inf->tel_inf}}" id="tel" name="tel" placeholder="Nom du tel">
                        <small class="form-text text-muted">Saisisser le numéro de tél</small>
                    </div>
                    <input type="hidden" name="id_inf" value="{{ $inf->id_inf }}" />
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection