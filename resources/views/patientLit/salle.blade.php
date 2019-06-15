@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h4>Selectionné la salle</h4>
                <form action="{{ url('patientlit/select/next') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <select class="form-control" name="id_salle">
                            @foreach($salles as $salle)
                                <option value="{{$salle->id_salle}}">{{$salle->nom_salle}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Choisisser une unité</small>
                    </div>
                    <input type="hidden" name="id_adm" value="{{ $id_adm }}" />
                    <input type="hidden" name="type" value="salle" />
                    <input type="submit" class="btn btn-outline-primary float-right" value="Suivant >>">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection