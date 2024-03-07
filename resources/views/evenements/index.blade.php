<!-- resources/views/evenements/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('evenements.create') }}" class="btn btn-success btn-sm mb-2">Create Evenement</a>
        
        <table class="table table-sm mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Num of Places</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($evenements as $evenement)
                    <tr>
                        <td>{{ $evenement->title }}</td>
                        <td>{{ $evenement->description }}</td>
                        <td>{{ $evenement->location }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $evenement->image) }}" alt="{{ $evenement->title }}" width="50"  class="img-thumbnail">
                        </td>
                        <td>{{ $evenement->number_places }}</td>
                        <td>{{ $evenement->status }}</td>
                        <td>{{ $evenement->category->name }}</td>
                        <td>{{ $evenement->start_date }}</td>
                        <td>{{ $evenement->end_date }}</td>
                        <td>
                            <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No evenements found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
