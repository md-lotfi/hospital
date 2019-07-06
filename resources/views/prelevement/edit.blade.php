@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('prelevement/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="input-group mb-3">
                        <input type="text" value="{{$prel->temp}}" id="temp" name="temp" class="form-control" placeholder="Température">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">C°</span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" value="{{$prel->poid}}" id="poid" name="poid" class="form-control" placeholder="Poid">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Kg</span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" value="{{$prel->taille}}" id="taille" name="taille" class="form-control" placeholder="Taille">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Cm</span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" value="{{$prel->pouls}}" id="pouls" name="pouls" class="form-control" placeholder="pouls">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">/min</span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" value="{{$prel->tension_bas}}" id="tension1" name="tension_bas" class="form-control" placeholder="Tension Bas">
                        <div class="input-group-append">
                            <input type="text" id="tension2" value="{{$prel->tension_haut}}" name="tension_haut" class="form-control" placeholder="Tension Haut">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" value="{{$prel->glecymie}}" id="glecemie" name="glecemie" class="form-control" placeholder="Glécemie">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">mg/dl</span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" value="{{$prel->diurese}}" id="diurese" name="diurese" class="form-control" placeholder="Diurese">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">ml/24h</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="obs">Observation</label>
                        <textarea class="form-control" id="obs" name="observation" rows="3">
                            {{$prel->observation}}
                        </textarea>
                        <small class="form-text text-muted">Saisisser une observation</small>
                    </div>

                    <input type="hidden" value="{{$prel->id_prel}}" name="id_prel">
                    <input type="hidden" value="{{$prel->id_adm}}" name="id_adm">
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection