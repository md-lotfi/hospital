@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 offset-md-4">

        <form action="{{ url('spatient') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nature">Type de diagnostique</label>
                <select id="nature" name="type" class="form-control">
                    @foreach(\SP\SortiePatient::DIAGNOSTIC as $diag)
                        <option value="{{$diag}}">{{$diag}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner un type de diagnostique</small>
            </div>

            <div class="form-group">
                <label for="d">Date</label>
                <input type="date" id="d" class="form-control" name="date_sortie">
                <small class="form-text text-muted">Saisisser une date</small>
            </div>

            <div class="form-group">
                <label for="diag">Diagnostique</label>
                <textarea rows="3" class="form-control" id="diag" name="diagnostic"></textarea>
                <small class="form-text text-muted">Saisisser le diagnostique du patient</small>
            </div>
            <input type="hidden" value="{{$id_adm}}" name="id_adm">
            <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
@endsection