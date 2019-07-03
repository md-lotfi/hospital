@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <form id="formSbm" action="{{ url('/ordonnances/medic/update') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
                <label for="nature">Nature</label>
                <select id="nature" name="id_medic" class="form-control">
                    @foreach($medics as $medic)
                        @if( $medic->id_medic === $ord->id_medic )
                            <option selected value="{{$medic->id_medic}}">{{$medic->nom_medic}}</option>
                        @else
                            <option value="{{$medic->id_medic}}">{{$medic->nom_medic}}</option>
                        @endif
                    @endforeach
                </select>
                <small class="form-text text-muted">Sélectionner un médicament</small>
            </div>

            <div class="form-group">
                <label for="dose">Dose à administrer par prise</label>
                <input type="text" value="{{$ord->doze_ord}}" class="form-control" id="dose" name="dose_ord" placeholder="Dose du médicament">
                <small class="form-text text-muted">Saisisser une dose</small>
            </div>

            <div class="form-group">
                <label for="freq">Nombre de fois</label>
                <input type="text" class="form-control" id="freq" value="{{$ord->freq_ord}}" name="freq_ord" placeholder="Nombre de fois">
                <small class="form-text text-muted">Saisisser le nombre de fois</small>
            </div>

            <div class="form-group">
                <label for="delay">Period entre les prises</label>
                <input type="text" class="form-control" id="delay" name="delay_ord" value="{{$ord->delay_ord}}" placeholder="Period entre les prises">
                <small class="form-text text-muted">Saisisser une periode</small>
            </div>

            <div class="form-group">
                <label for="pdp">Period de prise (optionel)</label>
                <input type="text" class="form-control" id="pdp" value="{{$ord->qte_ord}}" name="qte_ord" placeholder="Period de prise">
                <small class="form-text text-muted">Saisisser la periode du prise (optionel)</small>
            </div>

            <a href="/ordonnances/medic/list/{{$ord->id_ord}}" class="btn btn-outline-primary">Voire détails</a>
            <input type="hidden" value="{{$ord->id_ord}}" name="id_ord">
            <input type="hidden" value="{{$ord->id_ord_medic}}" name="id_ord_medic">
            <input type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger float-right" value="Enregistrer">
            <div class="clearfix"></div>
        </form>
        </div>
    </div>
</div>
@endsection