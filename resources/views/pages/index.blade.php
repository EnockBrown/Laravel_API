@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTYpuxcsX2PuGIY_trAiZCCnIoUTeZJuHDxXtSesctxtGAA8SI7"  class="rounded float-left" alt="...">
            <button type="button" class="btn btn-light"><h1>{{$tittle}}</h1></button>
          <p class="lead text-muted">Something short and leading about the collection below—its
              contents, the creator, etc. Make it short and sweet, but not too short so folks don’t
              simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>

      </section>

      <div class="card-footer">
        <a>Footer</a>
    </div>
@endsection


