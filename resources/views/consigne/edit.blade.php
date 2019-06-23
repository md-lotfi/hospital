@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('consigne/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="obs">Observation</label>
                        <textarea class="form-control" id="obs" name="observation" rows="3">{{$consigne->observation}}</textarea>
                        <small class="form-text text-muted">Saisisser une observation</small>
                    </div>

                    <input type="hidden" value="{{$consigne->id_consigne}}" name="id_consigne">
                    <input type="hidden" value="{{$consigne->id_patient}}" name="id_patient">
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection