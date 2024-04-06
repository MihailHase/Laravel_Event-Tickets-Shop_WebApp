@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $sponsor->name }}</h1>

        <div>
            @if($sponsor->logo)
                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}"
                     style="max-width: 200px;">
            @else
                No logo available.
            @endif
        </div>

        <div>
            <strong>Description:</strong>
            <p>{{ $sponsor->description ?: 'No description available.' }}</p>
        </div>

        <a href="{{ route('sponsors.index') }}" class="btn btn-primary">Back to Sponsors</a>
    </div>
@endsection
