@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
        <button class="btn btn-success float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="icon-search"></i>
        </button>
        </div>
    </div>
    <div class="row collapse" id="collapseExample">
        <div class="col-md-6">
            <form action="{{ url('patient/form/search') }}" method="post">
                {{ csrf_field() }}
                <h5>Recherche par nom et prénom</h5>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Nom</label>
                    <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom du patient">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Prénom</label>
                    <div class="col-sm-10">
                        <input name="prenom" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prénom du patient">
                    </div>
                </div>
                <div class="input-group-append flex-row-reverse">
                    <button type="submit" class="btn btn-secondary">Recherche</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ url('patient/form/locate') }}" method="post">
                {{ csrf_field() }}
                <h5>Filtrage</h5>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-3 col-form-label">N° de salle</label>
                    <div class="col-sm-9">
                        <input type="text" name="nom_salle" class="form-control" id="exampleInputPassword1" placeholder="N° de sale">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-3 col-form-label">N° de lit</label>
                    <div class="col-sm-9">
                        <input type="text" name="nom_lit" class="form-control" id="exampleInputPassword1" placeholder="N° de lit">
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
            <h1>Liste des patients</h1>
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
                    @if( $patients->count() > 0 )
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
                                            <a class="dropdown-item" href="/patient/get/{{ $patient->id_patient }}">Détail</a>
                                            @if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE )
                                                <a class="dropdown-item" href="/patient/edit/{{ $patient->id_patient }}">Editer</a>
                                                <a class="dropdown-item" href="/patient/delete/{{ $patient->id_patient }}">Supprimer</a>
                                            @endif
                                            <!--@if( \Illuminate\Support\Facades\Auth::user()->type === \SP\User::SECRETAIRE_TYPE || \Illuminate\Support\Facades\Auth::user()->type === \SP\User::MEDECIN_TYPE || \Illuminate\Support\Facades\Auth::user()->type === \SP\User::INFERMIERE_TYPE )
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/detail/soin/{{$patient->id_adm}}">Voire les soins</a>
                                        @endif-->
                                        <!--<a class="dropdown-item" href="/prelevement/{{$patient->id_adm}}">Prélevements</a>
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
                                     <a class="dropdown-item" href="#">Sortie de patient</a>-->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-info text-center">
                            <p>Pas de patients trouver.</p>
                        </div>
                    @endif
                 </body>
              </table>
        </div>
    </div>
</div>
@endsection