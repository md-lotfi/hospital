@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{ url('analyse/patient/master/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="results">Observation</label>
                        <textarea class="form-control" id="results" name="observation" rows="3">{{$ap->observation}}</textarea>
                        <small class="form-text text-muted">Saisisser le résultat si terminer</small>
                    </div>

                    <input type="hidden" name="id_pam" value="{{$ap->id_pam}}">
                    <input type="hidden" name="id_adm" value="{{$ap->id_adm}}">
                    <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection