@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('psychotrope/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom_psy">Nom psychotrope</label>
                        <input type="text" value="{{$psy->nom_psy}}" class="form-control" id="nom_psy" name="nom_psy" placeholder="Nom du psychotrope">
                        <small class="form-text text-muted">Saisisser un psychotrope</small>
                    </div>

                    <div class="form-group">
                        <label for="mat_psy">Matricule psychotrope</label>
                        <input type="text" value="{{$psy->mat_psy}}" class="form-control" id="mat_psy" name="mat_psy" placeholder="Mat du psychotrope">
                        <small class="form-text text-muted">Saisisser la matricule psychotrope</small>
                    </div>

                    <div class="form-group">
                        <label for="med">Médecin</label>
                        <select id="med" name="id_med" class="form-control">
                            @foreach($meds as $med)
                                @if($med->id_med === $psy->id_med)
                                    <option value="{{$med->id_med}}">{{$med->prenom_med}}</option>
                                @else
                                    <option value="{{$med->id_med}}">{{$med->prenom_med}}</option>
                                @endif
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Sélectionner un médecin</small>
                    </div>
                    <input type="hidden" value="{{$psy->id_psy}}" name="id_psy">
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection