@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Category Details</h2>

        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $category->id }}</dd>

            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $category->name }}</dd>
        </dl>
        
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
