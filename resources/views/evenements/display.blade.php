<!-- resources/views/evenements/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file, adjust this according to your setup -->

@section('content')
    <div class="container">
        <div class="row">
            @foreach($evenements as $evenement)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $evenement->image) }}" class="card-img-top" alt="{{ $evenement->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evenement->title }}</h5>
                            <p class="card-text">{{ $evenement->description }}</p>
                            <p class="card-text"><strong>Start Date:</strong> {{ $evenement->start_date }}</p>
                            <p class="card-text"><strong>End Date:</strong> {{ $evenement->end_date }}</p>
                            <p class="card-text"><strong>Location:</strong> {{ $evenement->location }}</p>
                            <p class="card-text"><strong>Number of Places:</strong> {{ $evenement->number_places }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $evenement->category->name }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $evenement->status }}</p>
                            <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
