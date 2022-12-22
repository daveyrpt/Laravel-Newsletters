@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body mb-1">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        @if (Auth::user()->role == "admin")
                            <a href="{{ route('newsletters.adminindex') }}">Newsletters</a><br>
                            <a href="{{ route('newsletters.restoreView') }}">Restore Deleted Newsletters</a>
                        @else
                            <a href="{{ route('newsletters.userindex') }}">Newsletters</a>
                        @endif
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
