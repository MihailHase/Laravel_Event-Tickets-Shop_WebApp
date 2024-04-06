@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $event->name }}</h2>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text"><strong>Data:</strong> {{ $event->date }}</p>
                <p class="card-text"><strong>Locație:</strong> {{ $event->location }}</p>
                <p class="card-text"><strong>Sponsor:</strong> {{ $event->sponsors }}</p>
                <p class="card-text"><strong>Parteneri:</strong> {{ $event->partners }}</p>

                <a href="{{ route('agenda.index', ['event_name' => $event->name]) }}" class="btn btn-primary">Vezi
                    Agenda</a>

                <h3 class="mt-4">Bilete disponibile:</h3>
                @if(count($tickets) > 0)
                    <ul class="list-group">
                        @foreach ($tickets as $ticket)
                            <li class="list-group-item">
                                <strong>Tip bilet:</strong> {{ $ticket->type }},
                                <strong>Preț:</strong> {{ $ticket->price }},
                                <strong>Disponibilitate:</strong> {{ $ticket->availability }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('cumpara-bilete', ['event_name' => $event->name]) }}"
                       class="btn btn-primary mt-3">Cumpără bilete</a>
                @else
                    <p class="mt-3">Nu există bilete disponibile pentru acest eveniment.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
