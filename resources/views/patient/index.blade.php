@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
              <h1> La liste des patients</h1>

              <table class="table">
                <head>
                  <tr>
                      <th>nom</th>
                      <th>prenom</th>
                      <th>datenai</th>
                      <th>prenompere</th>
                      <th>nommere</th>
                      <th>prenommere</th>
                      <th>adresse</th>
                      <th>actions</th>
                  </tr>
                 </head>

                 <body>
                  @foreach($patients as $patient)
                     <tr>
                         <td>{{ $patient->nom }}</td>
                         <td>{{ $patient->prenom }}</td>
                         <td>{{ $patient->datenai }}</td>
                         <td>{{ $patient->prenompere }}</td>
                         <td>{{ $patient->nommere }}</td>
                         <td>{{ $patient->prenommere }}</td>
                         <td>{{ $patient->adresse }}</td>
                         <td>
                             <!--<a href="" class="btn btn-primary">Details</a>
                             <a href="" class="btn btn-default">Edit</a>
                             <a href="" class="btn btn-danger">supprimer</a>-->
                             <div class="btn-group">
                                 <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Action
                                 </button>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="#">Détail</a>
                                     <a class="dropdown-item" href="#">Editer</a>
                                     <a class="dropdown-item" href="#">Supprimer</a>
                                     <div class="dropdown-divider"></div>
                                     <a class="dropdown-item" href="#">Admission</a>
                                     <a class="dropdown-item" href="#">Consigne</a>
                                     <a class="dropdown-item" href="#">Prescription</a>
                                     <a class="dropdown-item" href="#">Infèrmière</a>
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