@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <form action="{{ url('radio') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nom">Nom radio</label>
                    <input type="text" value="{{$radio->nom_radio}}" class="form-control" id="nom" name="nom_radio" placeholder="Nom de la radio">
                    <small class="form-text text-muted">Saisisser un nom de la radio</small>
                </div>
                <input type="hidden" name="id_radio" value="{{ $radio->id_radio }}" />
                <input type="submit" class="btn btn-danger float-right" value="Enregistrer">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

@endsection