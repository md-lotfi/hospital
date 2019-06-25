@extends('layouts.app')

@section('content')

    <div class="container-fluid m-0 p-0 pb-5 pt-5 h-100" style="background-color: #2192bd">
        <div class="row">
            <div class="col-md-5 offset-md-4">
                <div class="card-group">
                    <div class="card mr-3" style="width: 11rem;">
                        <a href="/patient/search/add/{{\SP\Http\Controllers\PatientSearchController::ROUTE_ENREGISTRER_SOIN_MEDICAMENT}}">
                            <img src="/images/medic.jpg" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <p class="card-text text-center"><b>Médicaments</b></p>
                        </div>
                    </div>
                    <div class="card mr-3" style="width: 11rem;">
                        <a href="/patient/search/add/{{\SP\Http\Controllers\PatientSearchController::ROUTE_ENREGISTRER_SOIN_PSYCHOTROPE}}">
                            <img src="/images/psychotropes.png" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <p class="card-text text-center"><b>Psychotropes</b></p>
                        </div>
                    </div>
                    <div class="card-group">
                        <div class="card" style="width: 11rem;">
                            <a href="/patient/search/add/{{\SP\Http\Controllers\PatientSearchController::ROUTE_ENREGISTRER_SOIN_PRELEVEMENT}}">
                                <img src="/images/prelevements.png" class="card-img-top" style="height: 140px">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Prélevements</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection