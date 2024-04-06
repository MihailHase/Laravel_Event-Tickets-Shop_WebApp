<!-- resources/views/admin/sponsors/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Sponsor</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('sponsors.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" name="logo" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Sponsor</button>
        </form>
    </div>
@endsection
