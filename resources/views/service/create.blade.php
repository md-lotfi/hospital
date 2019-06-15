@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('service') }}" method="post">
        
          {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nom du service</label>
                <input type="text" class="form-control" id="name" name="nom" aria-describedby="nomdels" placeholder="Nom du service">
                <small id="nomdels" class="form-text text-muted">Saisisser un nom pour le service</small>
            </div>

            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
            <a href="/service"><- Retoure</a>
        </div>
    </div>
</div>

@endsection