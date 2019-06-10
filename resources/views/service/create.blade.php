@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form action="{{ url('service') }}" method="post">
        
          {{ csrf_field() }}

            <div class="form-group">
            <label for="">nom</label>
            <input type="text" name="nom" class="from-control">
            </div>

            <div class="form-group">
            <input type="submit" class="from-control" btn btn-danger value="Enregistrer">
            </div>

        </form>
        </div>
    </div>
</div>

@endsection