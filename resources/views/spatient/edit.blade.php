@extends('layouts.app')
@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">

                <form id="formSbm" action="{{ url('soin/update') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nature">Nature</label>
                        <select id="nature" name="id_medic" class="form-control">
                            @foreach($medics as $medic)
                                @if($medic->id_medic === $soin->id_medic)
                                    <option selected value="{{$medic->id_medic}}">{{$medic->nom_medic}}</option>
                                @else
                                    <option value="{{$medic->id_medic}}">{{$medic->nom_medic}}</option>
                                @endif
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Sélectionner un médicament</small>
                    </div>

                    <div class="form-group">
                        <label for="dose">Dose</label>
                        <input type="text" class="form-control" id="dose" value="{{$soin->dose_admini}}" name="dose" placeholder="Dose du médicament">
                        <small class="form-text text-muted">Saisisser une dose</small>
                    </div>

                    <div class="form-group">
                        <label for="voie">Voie</label>
                        <select id="voie" name="nom_voie" class="form-control">
                            @foreach(\SP\Soin::VOIE_ADMINISTRATIONS as $voie)
                                @if($voie === $soin->voie)
                                    <option selected value="{{$voie}}">{{$voie}}</option>
                                @else
                                    <option value="{{$voie}}">{{$voie}}</option>
                                @endif
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Sélectionner une voie</small>
                    </div>
                    <input type="hidden" value="{{$soin->id_soin}}" name="id_soin">
                    <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection