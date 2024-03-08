{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Management</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_organisateur ? 'Organisateur' : 'User' }}</td>
                        <td>
                            <form action="{{ route('users.switchRole', $user) }}" method="post" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Switch Role</button>
                            </form>

                            <form action="{{ route('users.softDelete', $user) }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Soft Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
