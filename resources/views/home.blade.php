@extends('layouts.app')

@section('content')

    <div class="container-fluid m-0 p-0 pb-5 pt-5" style="background-color: #2192bd">
        @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::ADMIN_TYPE )
            <div class="row">
                <div class="col-md-6 offset-md-3">
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
            <div class="row">
                <div class="col-md-4 offset-md-4">
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
                                <img src="/images/doctor.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Consigne</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group mt-3">
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/secretaire')}}">
                                <img src="/images/secretary.png" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><b>Prescrire soin</b></p>
                            </div>
                        </div>
                        <div class="card mr-3" style="width: 11rem;">
                            <a href="{{ url('/medicament/create')}}">
                                <img src="/images/hospital.png" class="card-img-top">
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

        @elseif( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE )

        @endif
    </div>

@endsection