@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">{{ $evenement->title }}</h2>

        <div class="card">
            <img src="{{ asset('storage/' . $evenement->image) }}" class="card-img-top" alt="{{ $evenement->title }}" style="max-height: 300px; object-fit: cover;">
            <div class="card-body">
                <p class="card-text">{{ $evenement->description }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Start Date:</strong> {{ $evenement->start_date }}</li>
                    <li class="list-group-item"><strong>End Date:</strong> {{ $evenement->end_date }}</li>
                    <li class="list-group-item"><strong>Location:</strong> {{ $evenement->location }}</li>
                    <li class="list-group-item"><strong>Number of Places:</strong> {{ $evenement->number_places }}</li>
                    <li class="list-group-item"><strong>Category:</strong> {{ $evenement->category->name }}</li>
                    <li class="list-group-item"><strong>Status:</strong> {{ $evenement->status }}</li>
                </ul>

                <!-- Add any additional details or features specific to the event show page -->

                <a href="{{ route('evenements.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
            </div>
        </div>
    </div>
@endsection
