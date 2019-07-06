@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des soins
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::INFERMIERE_TYPE )
                        <a href="/psychotrope/create/{{$id_adm}}" class="btn btn-warning float-right">Ajouter un psychotrope</a>
                    @endif
                </h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-2">Médecin</th>
                            <th class="col-md-2">Psychotrope</th>
                            <th class="col-md-2">Mat. Psychotrope</th>
                            <th class="col-md-2">Date et Heure</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($psys as $psy)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $psy->name_inf }} {{ $psy->prenom_inf }}</td>
                            <td class="col-md-2">{{ $psy->name_med }} {{ $psy->prenom_med }}</td>
                            <td class="col-md-2">{{ $psy->nom_psy }}</td>
                            <td class="col-md-2">{{ $psy->mat_psy }}</td>
                            <td class="col-md-2">{{ $psy->created_at }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/psychotrope/get/{{ $psy->id_psy }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/psychotrope/remove/{{ $psy->id_psy }}">Supprimer</a>
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