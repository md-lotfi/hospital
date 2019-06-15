@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h4>Selectionné l'unité</h4>
                <form action="{{ url('patientlit/select/next') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <select class="form-control" name="id_unite">
                            @foreach($unites as $unite)
                                <option value="{{$unite->id_unite}}">{{$unite->nom_unite}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Choisisser une unité</small>
                    </div>
                    <input type="hidden" name="id_adm" value="{{ $id_adm }}" />
                    <input type="hidden" name="type" value="unite" />
                    <input type="submit" class="btn btn-outline-primary float-right" value="Suivant >>">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection