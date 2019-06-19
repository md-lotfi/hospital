@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des consignes
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \App\User::MEDECIN_TYPE )
                        <a href="/consigne/create/{{$id_patient}}" class="btn btn-warning float-right">Ajouter une consigne</a>
                    @endif
                </h1>
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
                                        <a class="dropdown-item" href="/consigne/get/{{ $consigne->id_consigne }}">Editer</a>
                                        <a class="dropdown-item" href="/consigne/remove/{{ $consigne->id_consigne }}">Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            </div>
        </div>
    </div>
@endsection