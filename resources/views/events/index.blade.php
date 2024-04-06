@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Evenimente</h1>

        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <h6 class="card-text">Data: {{ $event->date }}</h6>
                            <h6 class="card-text">Locatie: {{ $event->location}}</h6>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Detalii</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
