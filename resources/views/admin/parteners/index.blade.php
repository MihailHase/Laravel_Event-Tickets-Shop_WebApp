@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Parteners</h1>


        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(count($parteners) > 0)
            <table class="table mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($parteners as $partener)
                    <tr>
                        <td>{{ $partener->id }}</td>
                        <td>{{ $partener->name }}</td>
                        <td>
                            @if($partener->logo)
                                <img src="{{ asset('storage/' . $partener->logo) }}" alt="{{ $partener->name }}"
                                     style="max-width: 50px;">
                            @else
                                No logo
                            @endif
                        </td>
                        <td>{{ $partener->description }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No parteners available.</p>
        @endif
    </div>
@endsection
