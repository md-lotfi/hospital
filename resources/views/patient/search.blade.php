@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form>
                <h5>Chercher un patient</h5>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">N° de salle</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="N° de sale">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">N° de lit</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="N° de lit">
                    </div>
                </div>
                <div class="input-group-append flex-row-reverse">
                    <button type="submit" class="btn btn-secondary">Recherche</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des patients<a href="patient/create" class="btn btn-warning float-right">Ajouter un patient</a></h1>
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
                                 <div class="dropdown-menu dropdown-menu-right">
                                     <a class="dropdown-item" href="patient/get/{{ $patient->id_patient }}">Détail</a>
                                     <a class="dropdown-item" href="patient/update/{{ $patient->id_patient }}">Editer</a>
                                     <a class="dropdown-item" href="#">Supprimer</a>
                                     <div class="dropdown-divider"></div>
                                     <a class="dropdown-item" href="admission/create?idp={{ $patient->id_patient }}">Admission</a>
                                     <a class="dropdown-item" href="/consigne/{{$patient->id_patient}}">Consigne</a>
                                     <a class="dropdown-item" href="#">Prescription</a>
                                     <a class="dropdown-item" href="/soin/{{$patient->id_patient}}">Voire les soins</a>
                                     <a class="dropdown-item" href="/prelevement/{{$patient->id_patient}}">Prélevements</a>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">Enregistrer soins</a>
                                         <ul class="dropdown-menu">
                                             <li class="dropdown-submenu">
                                             <li><a class="dropdown-item dropdown-toggle" href="#">Traitements</a>
                                                 <ul class="dropdown-menu">
                                                     <li><a class="dropdown-item" href="/soin/{{$patient->id_patient}}">Médicaments</a></li>
                                                     <li><a class="dropdown-item" href="/psychotrope/create/{{$patient->id_patient}}">Psycotropes</a></li>
                                                 </ul>
                                             </li>
                                             <li><a class="dropdown-item" href="/prelevement/create/{{$patient->id_patient}}">Prélevements</a></li>
                                         </ul>
                                     </li>
                                     <a class="dropdown-item" href="#">Sortie de patient</a>
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