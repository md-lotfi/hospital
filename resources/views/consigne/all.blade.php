@extends('layouts.app')

@section('content')
    @include('layouts.confirm')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Consigne non reçue</h3>

                <table class="table">
                    <head>
                        <tr class="d-flex">
                            <th class="col-md-2">Patient</th>
                            <th class="col-md-2">Médecin</th>
                            <th class="col-md-2">Date</th>
                            <th class="col-md-5">Observation</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </head>

                    <body>
                    @foreach($consignes as $consigne)
                        <tr class="d-flex">
                            <td class="col-md-2">{{ $consigne->nom }} {{ $consigne->prenom }}</td>
                            <td class="col-md-2">{{ $consigne->name }} {{ $consigne->prenom_med }}</td>
                            <td class="col-md-2">{{ $consigne->created_at }}</td>
                            <td class="col-md-5">{{ $consigne->observation }}</td>
                            <td class="col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/consigne/received/{{ $consigne->id_consigne }}">Consigne reçue</a>
                                        <a class="dropdown-item" href="/patient/get/{{ $consigne->id_patient }}">Voire patient</a>
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