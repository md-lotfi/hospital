@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('ordonnances/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="obs">Modifier l'observation</label>
                        <textarea class="form-control" id="obs" name="observation" rows="4">{{$ord->observation}}</textarea>
                        <small class="form-text text-muted">Ajouter une observation</small>
                    </div>

                    <input type="hidden" value="{{$ord->id_ord}}" name="id_ord">
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection