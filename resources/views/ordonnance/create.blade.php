@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form action="{{ url('ordonnances') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="obs">Ajouter une observation (optional)</label>
                <textarea class="form-control" id="obs" name="observation" rows="4"></textarea>
                <small class="form-text text-muted">Ajouter une observation</small>
            </div>

            <input type="hidden" value="{{$id_adm}}" name="id_adm">
            <input type="submit" class="btn btn-danger float-right" value="Suivant">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>
@endsection