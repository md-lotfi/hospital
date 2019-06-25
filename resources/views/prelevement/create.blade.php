@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('prelevement') }}" method="post">
        
          {{ csrf_field() }}

            <div class="input-group mb-3">
                <input type="text" id="temp" name="temp" class="form-control" placeholder="Température">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">C°</span>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" id="poid" name="poid" class="form-control" placeholder="Poid">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Kg</span>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" id="taille" name="taille" class="form-control" placeholder="Taille">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Cm</span>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" id="pouls" name="pouls" class="form-control" placeholder="pouls">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">/min</span>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" id="tension1" name="tension_bas" class="form-control" placeholder="Tension Bas">
                <div class="input-group-append">
                    <input type="text" id="tension2" name="tension_haut" class="form-control" placeholder="Tension Haut">
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" id="glecemie" name="glecemie" class="form-control" placeholder="Glécemie">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">mg/dl</span>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" id="diurese" name="diurese" class="form-control" placeholder="Diurese">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">ml/24h</span>
                </div>
            </div>

            <div class="form-group">
                <label for="obs">Observation</label>
                <textarea class="form-control" id="obs" name="observation" rows="3">
                </textarea>
                <small class="form-text text-muted">Saisisser une observation</small>
            </div>

            <input type="hidden" value="{{$id_adm}}" name="id_adm">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>
@endsection