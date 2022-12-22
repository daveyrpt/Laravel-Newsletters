@extends('layouts.app')


@section('content')
<div class="container">

    <script>
        function timedRefresh(timeoutPeriod) {
          setTimeout('location.reload(true);',timeoutPeriod);
        }
        window.onload = timedRefresh(10000);
    </script>

    <div class="row justify-content-center ">
        <div class="col-md-8 ">
        <a href="{{ route('newsletters.create') }}"><button class="btn btn-success">Create newsletters</button></a>
        <a href="{{ route('newsletters.restoreView') }}"><button class="btn btn-secondary">Check trash</button></a>
        
        @php
          $newsletters = $newsletters->reverse();
        @endphp


        @foreach($newsletters as $newsletter)
        @php
          $currentDateTime = (new DateTime())->format('Y-m-d H:i:s');
          $dateTimeCreated = (new DateTime($newsletter->created_at))->format('Y-m-d H:i:s');
          $expiredDateTime = (new DateTime($newsletter->created_at))->add(new DateInterval('PT2M'))->format('Y-m-d H:i:s');


        @endphp
            <div class="card row mt-4">
              
                <div class="card-header">
                    <big>{{ $newsletter->title }}</big><br><br>
                    Created on {{ $dateTimeCreated }}<br>
                    Expired in {{ $expiredDateTime }}<br>
                    <!-- Currently at {{ $currentDateTime }} -->
                    @if ($expiredDateTime < $currentDateTime)
                        <p>Status: Expired</p>
                            <form action="{{ route('newsletters.destroy', $newsletter) }}" method="post">
                            @csrf
                              @method('delete')
                              <button class="btn btn-danger" id="submit-button" type="submit">Delete</button>
                            </form>
                            <script>
                                document.getElementById('submit-button').click();
                          </script>
                    @else
                        <p>Status: Available</p>
                    @endif
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
                    
                    <!-- Edit Button  -->
                    <a href="{{ route('newsletters.edit', $newsletter) }}" class=""><button class="btn btn-secondary" type="submit">Edit</button></a>

                    <!-- Delete Button  -->
                    <a href="#" onclick="return confirmation()">
                    <form action="{{ route('newsletters.destroy', $newsletter) }}" class="mx-2" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>  
                    </a>
                  <!-- Model Delete Confirmation -->
                  <script type="text/javascript">
                        function confirmation() {
                        return confirm('Are you sure you want to remove this newsletter?');
                        }
                   </script>  
               </div>

        @endforeach
        </div>
    </div>
</div>
@endsection