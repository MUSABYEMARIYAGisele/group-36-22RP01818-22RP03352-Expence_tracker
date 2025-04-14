@extends('layouts.app')

@section('title', 'Create Category - Expense Tracker')

@section('content')
<div class="form-container">
    <h2>Create Category</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" id="category_name" name="category_name" value="{{ old('category_name') }}" required>
            @error('category_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-link">Cancel</a>
        </div>
    </form>
</div>
@endsection 