@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
              <h1> La liste des patients</h1>

              <table class="table">
                <head>
                  <tr>
                      <th>titre</th>
                      <th>presentation</th>
                      <th>actions</th>
                  </tr>
                 </head>

                 <body>
                  @foreach($cvs as $cv)
                     <tr>
                         <td>{{ $cvs->titre }}</td>
                         <td>{{ $cvs->presentation }}</td>
                    @endforeach
                         <td>
                    
                             <a href="" class="btn btn-primary">Details</a>
                             <a href="" class="btn btn-default">Edit</a>
                             <a href="" class="btn btn-danger">supprimer</a>
                        </td>
                     </tr>
                    
                 </body>
              </table>


        
        </div>
    </div>
</div>


@endsection