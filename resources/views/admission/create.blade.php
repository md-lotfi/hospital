@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form action="{{ url('admission') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
            <label for="">motif</label>
            <input type="text" name="motif" class="from-control">
            </div>

            <div class="form-group">
            <label for="">diagnostic</label>
            <input type="text" name="diag" class="from-control">
            </div>

            <div class="form-group">
            <label for="">date admission</label>
            <input type="text" name="date_adm" class="from-control">
            </div>

            <div class="form-group">
            <label for="">date sortie</label>
            <input type="text" name="date_sort" class="from-control">
            </div>

            <div class="form-group">
            <label for="">etat sortie</label>
            <input type="text" name="etat_sort" class="from-control">
            </div>

            <input type="hidden" name="idpatient" value="<?= $_GET['idp'] ?>"/>

            <div class="form-group">
            <input type="submit" class="from-control" btn btn-danger value="Enregistrer">
            </div>

        </form>
        </div>
    </div>
</div>

@endsection