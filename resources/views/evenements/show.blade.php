<!-- resources/views/evenements/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $evenement->title }}</h2>
        <p><strong>Description:</strong> {{ $evenement->description }}</p>
        <p><strong>Start Date:</strong> {{ $evenement->start_date }}</p>
        <p><strong>End Date:</strong> {{ $evenement->end_date }}</p>

        <a href="{{ route('evenements.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
