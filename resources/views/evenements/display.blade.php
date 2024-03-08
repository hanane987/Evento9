<!-- resources/views/evenements/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file, adjust this according to your setup -->

@section('content')
    <div class="container">
       <div class="mb-4">
            <form action="{{ route('evenements.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by title..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        
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
                            <form action="{{ route('evenements.reserve', $evenement->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Make Reservation</button>
                    </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
     <div class="d-flex justify-content-center">
            {{-- {{ $evenements->appends(request()->except('page'))->links() }} --}}
        </div>
    </div>
@endsection
