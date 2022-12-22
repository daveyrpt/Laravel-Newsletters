@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
       
            <div class="card row mt-4">
              
                <div class="card-header">
                    {{ $newsletter->title }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $newsletter->content }}
                    <br>          
                </div>
            </div>
              <p>Publish status : {{ $newsletter->published ? 'Yes' : 'No' }}</p>

              <div class="btn-group" >     
                  <a href="{{ route('newsletters.userindex') }}"><button class="btn btn-primary">Newsletters</button></a>
               </div>

        
        </div>
    </div>
</div>
@endsection