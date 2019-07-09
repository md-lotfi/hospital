@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form id="formSbm" action="{{ url('radio/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom">Nom radio</label>
                        <input type="text" value="{{$radio->nom_radio}}" class="form-control" id="nom" name="nom_radio" placeholder="Nom de la radio">
                        <small class="form-text text-muted">Saisisser un nom de la radio</small>
                    </div>
                    <input type="hidden" name="id_radio" value="{{ $radio->id_radio }}" />
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection