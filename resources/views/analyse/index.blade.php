@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des analyses<a href="/analyse/create" class="btn btn-warning float-right">Ajouter une analyse</a></h1>
                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">N° analyse</th>
                            <th class="col-md-3">Nature</th>
                            <th class="col-md-3">Norm</th>
                            <th class="col-md-3">Unité</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($analyses as $anal)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $anal->id_analyse }}</td>
                            <td class="col-md-3">{{ $anal->nom_analyse }}</td>
                            <td class="col-md-3">{{ $anal->norm_analyse }}</td>
                            <td class="col-md-3">{{ $anal->unite_analyse }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/analyse/get/{{ $anal->id_analyse }}">Editer</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="/analyse/remove/{{ $anal->id_analyse }}">Supprimer</a>
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