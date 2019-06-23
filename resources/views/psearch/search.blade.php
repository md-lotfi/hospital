@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="{{ url('patient/search') }}" method="post">
                {{ csrf_field() }}
                <h5>Chercher un patient</h5>
                <div class="form-group">
                    <label for="salle">N° Salle</label>
                    <input type="text" class="form-control" id="salle" name="nom_salle" placeholder="Numéro de la salle">
                    <small class="form-text text-muted">Saisisser le numéro de la salle</small>
                </div>
                <div class="form-group">
                    <label for="lit">N° Lit</label>
                    <input type="text" class="form-control" id="lit" name="nom_lit" placeholder="Numéro du lit">
                    <small class="form-text text-muted">Saisisser le numéro du lit</small>
                </div>
                <input type="hidden" name="route" value="{{$route}}">
                <input type="hidden" name="action" value="{{$action}}">
                <div class="input-group-append flex-row-reverse">
                    <button type="submit" class="btn btn-secondary">Recherche</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection