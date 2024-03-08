<!-- resources/views/evenements/reservations_statistics.blade.php -->

@extends('layouts.app')

@section('content')

@foreach ($evenements as $evenement)
    <p>Event Title: {{ $evenement->title }}</p>
    <p>Number of Reservations: {{ $evenement->reservation_count }}</p>
@endforeach

@endsection