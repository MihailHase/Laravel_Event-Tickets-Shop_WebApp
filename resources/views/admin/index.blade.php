@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Adaugă Eveniment Nou</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.events.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nume eveniment:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descriere:</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Data evenimentului:</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="location">Locație:</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="speakers">Speakeri:</label>
                        <input type="text" name="speakers" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="sponsors">Sponsori:</label>
                        <input type="text" name="sponsors" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="partners">Parteneri:</label>
                        <input type="text" name="partners" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Adaugă Eveniment</button>
                </form>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-12">
                <h1>Adaugă Bilet Nou</h1>
                <form action="{{ route('admin.tickets.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="event_name">Numele evenimentului:</label>
                        <input type="text" name="event_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipul biletului:</label>
                        <input type="text" name="type" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Prețul biletului:</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="availability">Disponibilitate:</label>
                        <input type="text" name="availability" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Adaugă Bilet</button>
                </form>

            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h1>Sterge Eveniment</h1>
            <form action="{{ route('admin.events.delete') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="event_name">Numele evenimentului de șters:</label>
                    <input type="text" name="event_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-danger">Șterge Eveniment</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <h1>Adaugă Sponsor Nou</h1>
                <form action="{{ route('admin.sponsors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nume sponsor:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="description">Descriere:</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Adaugă Sponsor</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <h1>Adaugă Partener Nou</h1>
                <form action="{{ route('admin.parteners.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nume partener:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="description">Descriere:</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Adaugă Partener</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="mt-4">Adaugă Detalii Agendă</h1>

        <form action="{{ route('admin.agenda.create') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="event_name">Nume eveniment:</label>
                <input type="text" name="event_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="session">Sesiune:</label>
                <input type="text" name="session" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="workshop">Workshop:</label>
                <input type="text" name="workshop" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start_time">Ora de început:</label>
                <input type="datetime-local" name="start_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_time">Ora de sfârșit:</label>
                <input type="datetime-local" name="end_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="speaker">Speaker:</label>
                <input type="text" name="speaker" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="topic">Subiect:</label>
                <input type="text" name="topic" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="room">Sală:</label>
                <input type="text" name="room" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Adaugă Detalii Agendă</button>
        </form>
    </div>
@endsection
