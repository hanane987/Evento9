@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Event') }}</div>

                    <div class="card-body">
                        <!-- Add your form fields and validation errors handling here -->
                        <form method="POST" action="{{ route('evenements.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}:</label>
                                <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="start_date">{{ __('Start Date') }}:</label>
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">{{ __('End Date') }}:</label>
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="location">{{ __('Location') }}:</label>
                                <input type="text" class="form-control" name="location" value="{{ old('location') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Image') }}:</label>
                                <input type="file" class="form-control-file" name="image" accept="image/*" required>
                            </div>

                            <div class="form-group">
                                <label for="number_places">{{ __('Number of Places') }}:</label>
                                <input type="number" class="form-control" name="number_places" value="{{ old('number_places') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __('Status') }}:</label>
                                <select class="form-control" name="status" required>
                                    <option value="manual">{{ __('Manual') }}</option>
                                    <option value="auto">{{ __('Auto') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_id">{{ __('Category') }}:</label>
                                <select class="form-control" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Add other fields as needed -->

                            <button type="submit" class="btn btn-primary">{{ __('Create Event') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
