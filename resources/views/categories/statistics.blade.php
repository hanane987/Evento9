<!-- resources/views/categories/statistics.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Category Statistics</h2>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Total Events</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->evenements_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No categories found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
