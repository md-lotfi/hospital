@extends('layouts.app')

@section('content')

    <div class="container-fluid m-0 p-0 pb-5 pt-5 h-100 w-100" style="background-color: rgba(19, 125, 111, 0.75);">
        @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::ADMIN_TYPE )
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="card-group">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('medecin/create')}}">
                                <img src="/images/doctor.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Ajouter Médecin</b></p>
                            </div>
                        </div>
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/infermiere')}}">
                                <img src="/images/nurse.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Ajouter Infirmiere</b></p>
                            </div>
                        </div>
                        <div class="card" style="width: 11rem;">
                            <a href="{{ url('/patient')}}">
                                <img src="/images/bed.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Mes Patients</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group mt-3">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/secretaire')}}">
                                <img src="/images/secretary.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Ajouter Secrétaire Médicale</b></p>
                            </div>
                        </div>
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/service')}}">
                                <img src="/images/hospital.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Ajouter un Service</b></p>
                            </div>
                        </div>
                        <div class="card" style="width: 11rem;">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <img src="/images/exit.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Déconnexion</b></p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::MEDECIN_TYPE )
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="card-group">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/patient')}}">
                                <img src="/images/bed.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Mes Patients</b></p>
                            </div>
                        </div>
                        <div class="card" style="width: 11rem;">
                            <a href="{{ url('consigne/create')}}">
                                <img src="/images/consigne.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Consigne</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group mt-3">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/secretaire')}}">
                                <img src="/images/prescrire.png" class="card-img-top" style="height: 140px">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Prescrire soin</b></p>
                            </div>
                        </div>
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/medicament/create')}}">
                                <img src="/images/medicament.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Ajouter un Médicament</b></p>
                            </div>
                        </div>
                        <div class="card" style="width: 11rem;">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <img src="/images/exit.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Déconnexion</b></p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::INFERMIERE_TYPE )
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="card-group">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/patient')}}">
                                <img src="/images/bed.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Mes Patients</b></p>
                            </div>
                        </div>
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="/soin/show/buttons">
                                <img src="/images/enregistrer_soin.png" class="card-img-top" style="height: 140px">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Enregistrer soin</b></p>
                            </div>
                        </div>
                        <div class="card" style="width: 11rem;">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <img src="/images/exit.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Déconnexion</b></p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @elseif( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE )
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="card-group">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/patient')}}">
                                <img src="/images/bed.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Mes Patients</b></p>
                            </div>
                        </div>
                        <div class="card" style="width: 11rem;">
                            <a href="/patient/create">
                                <img src="/images/admission.png" class="card-img-top" style="height: 205px">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Admission</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group mt-3">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="/gardem">
                                <img src="/images/gardem.png" class="card-img-top" style="height: 140px">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Garde Malade</b></p>
                            </div>
                        </div>
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="/patient/search/add/{{\SP\Http\Controllers\PatientSearchController::ROUTE_SORTIE_PATIENT}}">
                                <img src="/images/sortie_patient.jpg" class="card-img-top" style="height: 140px">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Sortie Patient</b></p>
                            </div>
                        </div>
                        <div class="card" style="width: 11rem;">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <img src="/images/exit.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Déconnexion</b></p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection