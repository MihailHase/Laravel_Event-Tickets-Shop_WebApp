@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="mb-4">{{ __('You are logged in!') }}</h4>

                        @if ($latestEvent)
                            <div class="card border-primary mb-3">
                                <div class="card-header bg-primary text-white">Last Event Information</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Name: {{ $latestEvent->name }}</h5>
                                    <p class="card-text">Description: {{ $latestEvent->description }}</p>
                                    <p class="card-text">Date: {{ $latestEvent->date }}</p>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                No events available.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
