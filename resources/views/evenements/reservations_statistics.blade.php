<!-- resources/views/evenements/reservations_statistics.blade.php -->

@extends('layouts.app')

@foreach ($statisticsData as $statisticsItem)
    <p>{{ $statisticsItem['evenement']->title }} - Total Reservations: {{ $statisticsItem['totalReservations'] }}</p>
    <!-- Add other statistics as needed -->
@endforeach
