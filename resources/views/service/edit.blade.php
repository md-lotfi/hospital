@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form id="formSbm" action="{{ url('service/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="">nom</label>
                        <input type="text" value="{{ $service->nom }}" name="nom" class="from-control">
                    </div>
                    <input type="hidden" name="id_service" value="{{ $service->id_service }}" />
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger" value="Enregistrer">

                </form>
                <a href="">Ajouter une unité</a>
            </div>
        </div>
    </div>

@endsection