@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('analyse/patient/master/store') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="results">Observation (optionnel)</label>
                <textarea class="form-control" id="results" name="observation" rows="3"></textarea>
                <small class="form-text text-muted">Saisisser une observation</small>
            </div>

            <input type="hidden" name="id_adm" value="{{$id_adm}}">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>

@endsection