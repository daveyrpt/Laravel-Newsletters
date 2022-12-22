@extends('layouts.app')
@section('content')
<div class="container">
<script>
        function timedRefresh(timeoutPeriod) {
          setTimeout('location.reload(true);',timeoutPeriod);
        }
        window.onload = timedRefresh(10000);

    <div class="row justify-content-center ">
        <div class="col-md-8 ">
        @php
        $newsletters = $newsletters->reverse();
        @endphp
        @foreach($newsletters as $newsletter)
            <div class="card row mt-4">
              
                <div class="card-header"><big>{{ $newsletter->title }}</big></div>

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
        @endforeach
        </div>
    </div>
</div>
@endsection
