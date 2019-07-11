@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h4>Selectionné le service</h4>
                <form action="{{ url('patientlit/select/next') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <select class="form-control dynamic" data-dependent="unite" name="id_service" id="service">
                            @foreach($services as $service)
                                <option value="{{$service->id_service}}">{{$service->nom}}</option>
                            @endforeach
                        </select>
                        <small id="nomdelit" class="form-text text-muted">Choisisser un service</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control dynamic" data-dependent="salle" name="id_unite" id="unite">
                            <option></option>
                        </select>
                        <small id="nomdelit" class="form-text text-muted">Choisisser une unite</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control dynamic" data-dependent="lit" name="id_lit" id="salle">
                            <option></option>
                        </select>
                        <small id="nomdelit" class="form-text text-muted">Choisisser une salle</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control dynamic" name="id_lit" id="lit">
                            <option></option>
                        </select>
                        <small id="idlit" class="form-text text-muted">Choisisser un lit</small>
                    </div>
                    <input type="hidden" name="id_adm" value="{{ $id_adm }}" />
                    <input type="hidden" name="type" value="service" />
                    <input type="submit" class="btn btn-outline-primary float-right" value="Suivant >>">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection