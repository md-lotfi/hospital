@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form action="{{ url('medecin') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="Nom" class="from-control">
            </div>

            <div class="form-group">
            <label for="">Prenom</label>
            <input type="text" name="Prenom" class="from-control">
            </div>

            <div class="form-group">
            <label for="">Specialite</label>
            <input type="text" name="Specialite" class="from-control">
            </div>

            <div class="form-group">
            <label for="">Grade</label>
            <input type="text" name="Grade" class="from-control">
            </div>


            <div class="form-group">
            <input type="submit" class="from-control" btn btn-danger value="Enregistrer">
            </div>

        </form>
        </div>
    </div>
</div>

@endsection