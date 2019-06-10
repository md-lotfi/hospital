@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form action="{{ url('salle') }}" method="post">

        {{ csrf_field() }}

            <div class="form-group">
            <label for="">num salle</label>
            <input type="text" name="numSalle" class="from-control">
            </div>

            <input type="hidden" name="idadm" value="<?= $_GET['idadm'] ?>"/>
       
            <div class="form-group">
            
            <input type="submit" class="from-control" btn btn-primary value="Envoyer">
            </div>
        </form>
        
        
        </div>
    </div>
</div>

@endsection