@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des prelevements
                    @if( \Illuminate\Support\Facades\Auth::user()->type === \App\User::INFERMIERE_TYPE )
                        <a href="/prelevement/create/{{$id_patient}}" class="btn btn-warning float-right">Ajouter un prélevement</a>
                    @endif
                </h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-3">Infermiere</th>
                            <th class="col-md-3">Médecin</th>
                            <th class="col-md-3">Temp.</th>
                            <th class="col-md-2">Date et Heure</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($prelevs as $prelev)
                        <tr class="d-flex">
                            <td class="col-md-3">{{ $prelev->name_inf }} {{ $prelev->prenom_inf }}</td>
                            <td class="col-md-3">{{ $prelev->name_med }} {{ $prelev->prenom_med }}</td>
                            <td class="col-md-3">{{ $prelev->temp_prel }}</td>
                            <td class="col-md-2">{{ $prelev->created_at }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/soin/get/{{ $prelev->id_prel }}">Editer</a>
                                        <a class="dropdown-item" href="/soin/remove/{{ $prelev->id_prel }}">Supprimer</a>
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