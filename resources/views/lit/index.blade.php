@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><u>Service</u> -> <b>{{$service->nom}}</b> -> <u>Unité</u> -> <b>{{$service->nom_unite}}</b> -> <u>Salle</u> -> <b>{{$service->nom_salle}}</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des lits<a href="/lit/create/{{$id_salle}}" class="btn btn-warning float-right">Ajouter un lit</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">N° lit</th>
                            <th class="col-md-8">Nom du lit</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($lits as $lit)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $lit->id_lit }}</td>
                            <td class="col-md-8">{{ $lit->nom_lit }}</td>
                            <td class="col-md-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/lit/get/{{ $lit->id_lit }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/lit/remove/{{ $lit->id_lit }}">Supprimer</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/lit/link/{{ $lit->id_lit }}">Assigner un patient</a>
                                        <a class="dropdown-item" href="/lit/view/{{ $lit->id_lit }}">Voire le patient</a>
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