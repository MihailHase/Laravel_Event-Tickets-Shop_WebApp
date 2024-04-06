@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Bilete disponibile pentru cumpărare</h2>

                @if(count($tickets) > 0)
                    <ul class="list-group">
                        @foreach ($tickets as $ticket)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">Nume eveniment: {{ $ticket->event_name }}</h5>
                                        <p class="mb-1">Tip bilet: {{ $ticket->type }}</p>
                                        <p class="mb-1">Preț: {{ $ticket->price }}</p>
                                        <p class="mb-1">Disponibilitate: {{ $ticket->availability }}</p>
                                    </div>
                                    <div>
                                        <form action="{{ route('cumpara-bilet', ['ticket_id' => $ticket->id]) }}"
                                              method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="quantity{{ $ticket->id }}">Cantitate:</label>
                                                <input type="number" name="quantity" id="quantity{{ $ticket->id }}"
                                                       value="1" min="1" class="form-control" style="width: 70px;">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Adaugă în coș</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="mt-3">Nu există bilete disponibile pentru cumpărare în acest moment.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

