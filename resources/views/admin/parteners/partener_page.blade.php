@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $partener->name }}</h1>

        <div>
            @if($partener->logo)
                <img src="{{ asset('storage/' . $partener->logo) }}" alt="{{ $partener->name }}"
                     style="max-width: 200px;">
            @else
                No logo available.
            @endif
        </div>

        <div>
            <strong>Description:</strong>
            <p>{{ $partener->description ?: 'No description available.' }}</p>
        </div>

        <a href="{{ route('parteners.index') }}" class="btn btn-primary">Back to Parteners</a>
    </div>
@endsection
