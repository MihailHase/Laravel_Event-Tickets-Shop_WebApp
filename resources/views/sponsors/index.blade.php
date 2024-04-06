@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sponsors</h1>

        <a href="{{ route('sponsors.create') }}" class="btn btn-primary">Create Sponsor</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(count($sponsors) > 0)
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
                @foreach($sponsors as $sponsor)
                    <tr>
                        <td>{{ $sponsor->id }}</td>
                        <td>{{ $sponsor->name }}</td>
                        <td>
                            @if($sponsor->logo)
                                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}"
                                     style="max-width: 50px;">
                            @else
                                No logo
                            @endif
                        </td>
                        <td>{{ $sponsor->description }}</td>
                        <td>
                            <!-- Add more actions as needed -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No sponsors available.</p>
        @endif
    </div>
@endsection

