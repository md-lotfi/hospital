@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Service pediatrie</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('patient')}}">Mes patients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('patient/create')}}">Admission</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Consigne</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Prescrire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Enregistrer soins</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Ficher
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="service/create">service</a>
          <a class="dropdown-item" href="{{ url('medecin/create')}}">Médecins</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">infirmières</a>
        </div>
      </li>
    </form>
  </div>
</nav>
@endsection
