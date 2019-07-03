@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('radio') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nom">Nom radio</label>
                <input type="text" class="form-control" id="nom" name="nom_radio" placeholder="Nom de la radio">
                <small class="form-text text-muted">Saisisser un nom de la radio</small>
            </div>

            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>

@endsection