@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agenda</h1>

        @foreach($agenda as $detail)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Event Name: {{ $detail->event_name }}</h5>
                    <p class="card-text"><strong>Session:</strong> {{ $detail->session }}</p>
                    <p class="card-text"><strong>Workshop:</strong> {{ $detail->workshop }}</p>
                    <p class="card-text"><strong>Start Time:</strong> {{ $detail->start_time }}</p>
                    <p class="card-text"><strong>End Time:</strong> {{ $detail->end_time }}</p>
                    <p class="card-text"><strong>Speaker:</strong> {{ $detail->speaker }}</p>
                    <p class="card-text"><strong>Topic:</strong> {{ $detail->topic }}</p>
                    <p class="card-text"><strong>Room:</strong> {{ $detail->room }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
