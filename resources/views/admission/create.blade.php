@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-4">

        <form action="{{ url('admission') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="motif">motif</label>
                <textarea name="motif" class="form-control" id="motif" rows="3">
                </textarea>
            </div>

            <div class="form-group">
                <label for="diag">diagnostic</label>
                <textarea name="diag" class="form-control" id="diag" rows="3">
                </textarea>
            </div>

            <div class="form-group">
            <label for="date_adm">date admission</label>
            <input type="date" name="date_adm" class="form-control" id="date_adm" aria-describedby="date_adm" placeholder="Date d'admission">
            </div>

            <input type="hidden" name="id_patient" value="{{$id_patient}}"/>

            <div class="form-group text-right">
            <input type="submit" class="btn btn-info" value="Enregistrer">
            </div>

        </form>
        </div>
    </div>
</div>

@endsection