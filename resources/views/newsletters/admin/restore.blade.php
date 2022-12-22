@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center ">
        <div class="col-md-8 ">

        <a href="{{ route('newsletters.adminindex') }}"><button class="btn btn-secondary">Back to newsletters</button></a>
        @php
          $trashNewsletters = $trashNewsletters->reverse();
        @endphp
        @foreach($trashNewsletters as $trashNewsletter)

        @php
          $currentDateTime = (new DateTime())->format('Y-m-d H:i:s');
          $dateTimeCreated = (new DateTime($trashNewsletter->created_at))->format('Y-m-d H:i:s');
          $expiredDateTime = (new DateTime($trashNewsletter->created_at))->add(new DateInterval('PT2M'))->format('Y-m-d H:i:s');
        @endphp
        
            <div class="card row mt-4">
              
                <div class="card-header">
                    {{ $trashNewsletter->title }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $trashNewsletter->content }}
                    <br>          
                </div>
                
            </div>
            <p>Publish status : {{ $trashNewsletter->published ? 'Yes' : 'No' }}</p>

            <form method="POST" action="{{ route('newsletters.store', $trashNewsletter) }}">
                @csrf
                <input type="hidden" name="title" value="{{ $trashNewsletter->title }}">
                <input type="hidden" name="content" value="{{ $trashNewsletter->content }}">
                <input type="hidden" name="published" value="{{ $trashNewsletter->published }}">
                <button type="submit" class="btn btn-primary">Restore</button>
            </form>            

        @endforeach
        </div>
    </div>
</div>
@endsection

