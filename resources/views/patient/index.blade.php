@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form>
                <h5>Recherche par nom et prénom</h5>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom du patient">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Prénom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prénom du patient">
                    </div>
                </div>
                <div class="input-group-append flex-row-reverse">
                    <button type="submit" class="btn btn-secondary">Recherche</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form>
                <h5>Filtrage</h5>
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Date de naissance</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="date de naissance">
                    </div>
                </div>
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
                    <button type="submit" class="btn btn-secondary">Fitrer</button>
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
                                     <a class="dropdown-item" href="#">Consigne</a>
                                     <a class="dropdown-item" href="#">Prescription</a>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">Enregistrer soins</a>
                                         <ul class="dropdown-menu">
                                             <li class="dropdown-submenu">
                                             <li><a class="dropdown-item dropdown-toggle" href="#">Traitements</a>
                                                 <ul class="dropdown-menu">
                                                     <li><a class="dropdown-item" href="#">Médicaments</a></li>
                                                     <li><a class="dropdown-item" href="#">Psycotropes</a></li>
                                                 </ul>
                                             </li>
                                             <li><a class="dropdown-item" href="#">Prélevements</a></li>
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