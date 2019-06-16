@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-12">

            <h2>Liste des gardes malades<a href="/gardem/create" class="btn btn-warning float-right">Ajouter un garde malade</a></h2>

            <table class="table">
                <head>
                    <tr class="d-flex">
                        <th class="col-md-1">N°</th>
                        <th class="col-md-3">Nom</th>
                        <th class="col-md-3">Lien P.</th>
                        <th class="col-md-2">Adresse</th>
                        <th class="col-md-2">Tél</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                </head>

                <body>
                @foreach($gardems as $gardem)
                    <tr class="d-flex">
                        <td class="col-md-1">{{ $gardem->id_gardem }}</td>
                        <td class="col-md-3">{{ $gardem->nom }} {{ $gardem->prenom }}</td>
                        <td class="col-md-3">{{ $gardem->lien_parent }}</td>
                        <td class="col-md-2">{{ $gardem->adr }}</td>
                        <td class="col-md-2">{{ $gardem->tel }}</td>
                        <td class="col-md-1">
                            <form action="{{ url('gardemAdm') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_gardem" value="{{$gardem->id_gardem}}">
                                <input type="hidden" name="id_adm" value="{{$id_adm}}">
                                <button class="btn btn-success">Lier</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </body>
            </table>
        </div>
    </div>
</div>

@endsection