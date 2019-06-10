@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form action="{{ url('patient') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
            <label for="">nom</label>
            <input type="text" name="nom" class="from-control">
            </div>

            <div class="form-group">
            <label for="">prenom</label>
            <input type="prenom" name="prenom" class="from-control">
            </div>

            <div class="form-group">
            <label for="">datenai</label>
            <input type="text" name="datenai" class="from-control">
            </div>

            <div class="form-group">
            <label for="">prenompere</label>
            <input type="text" name="prenompere" class="from-control">
            </div>

            <div class="form-group">
            <label for="">nommere</label>
            <input type="text" name="nommere" class="from-control">
            </div>
            <div class="form-group">
            <label for="">prenommere</label>
            <input type="text" name="prenommere" class="from-control">
            </div>
            <div class="form-group">
            <label for="">adresse</label>
            <input type="text" name="adresse" class="from-control">
            </div>

            <div class="form-group">
            
            <input type="submit" class="from-control" btn btn-danger value="Enregistrer">
            </div>

        </form>
        </div>
    </div>
</div>

@endsection