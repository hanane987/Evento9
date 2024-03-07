@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Event') }}</div>

                    <div class="card-body">
                        <!-- Add your form fields and validation errors handling here -->
                        <form method="POST" action="{{ route('evenements.update', $evenement->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $evenement->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}:</label>
                                <textarea class="form-control" name="description" required>{{ old('description', $evenement->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="start_date">{{ __('Start Date') }}:</label>
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $evenement->start_date) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">{{ __('End Date') }}:</label>
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date', $evenement->end_date) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="location">{{ __('Location') }}:</label>
                                <input type="text" class="form-control" name="location" value="{{ old('location', $evenement->location) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Image') }}:</label>
                                <input type="file" class="form-control-file" name="image" accept="image/*">
                                <small class="form-text text-muted">{{ __('Leave blank to keep the current image.') }}</small>
                            </div>

                            <div class="form-group">
                                <label for="number_places">{{ __('Number of Places') }}:</label>
                                <input type="number" class="form-control" name="number_places" value="{{ old('number_places', $evenement->number_places) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __('Status') }}:</label>
                                <select class="form-control" name="status" required>
                                    <option value="manual" {{ old('status', $evenement->status) === 'manual' ? 'selected' : '' }}>{{ __('Manual') }}</option>
                                    <option value="auto" {{ old('status', $evenement->status) === 'auto' ? 'selected' : '' }}>{{ __('Auto') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_id">{{ __('Category') }}:</label>
                                <select class="form-control" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $evenement->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Add other fields as needed -->

                            <button type="submit" class="btn btn-primary">{{ __('Update Event') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
