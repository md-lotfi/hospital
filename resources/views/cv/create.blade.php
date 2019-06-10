@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form action="{{ url('cvs') }}" method="post">

        {{ csrf_field() }}

            <div class="form-group">
            <label for="">Titre</label>
            <input type="text" name="titre" class="from-control">
            </div>

            <div class="form-group">
            <label for="">Presentation</label>
            <textarea name="presentation" class="from-control"></textarea> 
            </div>
      

        

       
            <div class="form-group">
            
            <input type="submit" class="from-control" btn btn-primary value="Envoyer">
            </div>
        </form>
        
        
        </div>
    </div>
</div>

@endsection