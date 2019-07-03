@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des radio<a href="/radio/create" class="btn btn-warning float-right">Ajouter une radio</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">N° radio</th>
                            <th class="col-md-4">Nom radio</th>
                            <th class="col-md-5">Ajouter le</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($radios as $radio)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $radio->id_radio }}</td>
                            <td class="col-md-4">{{ $radio->nom_radio }}</td>
                            <td class="col-md-5">{{ $radio->created_at }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/radio/get/{{ $radio->id_radio }}">Editer</a>
                                        <a class="dropdown-item" href="/radio/remove/{{ $radio->id_radio }}">Supprimer</a>
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