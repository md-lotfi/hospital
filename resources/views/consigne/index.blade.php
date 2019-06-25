@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Liste des consignes pour <u>{{$p_name}} {{$p_prenom}}</u>
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::MEDECIN_TYPE )
                        <a href="/consigne/create/{{$id_adm}}" class="btn btn-warning float-right">Ajouter une consigne</a>
                    @endif
                </h3>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Médecin</th>
                            <th class="col-md-2">Date</th>
                            <th class="col-md-6">Observation</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($consignes as $consigne)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $consigne->name }} {{ $consigne->prenom_med }}</td>
                            <td class="col-md-2">{{ $consigne->created_at }}</td>
                            <td class="col-md-6">{{ $consigne->observation }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/consigne/get/{{ $consigne->id_consigne }}">Modifier</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/consigne/remove/{{ $consigne->id_consigne }}">Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <form method="GET" id="formDelete">
                    </form>
                    </body>
                </table>
            </div>
        </div>
    </div>
@endsection