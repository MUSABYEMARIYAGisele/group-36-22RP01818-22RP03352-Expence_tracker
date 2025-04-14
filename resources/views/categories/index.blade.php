@extends('layouts.app')

@section('title', 'Categories - Expense Tracker')

@section('content')
<div class="categories">
    <div class="header">
        <h2>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    @if($categories->isEmpty())
        <p>No categories found. <a href="{{ route('categories.create') }}">Create your first category</a>.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Expenses Count</th>
                    <th>Total Expenses</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->expenses->count() }}</td>
                    <td>${{ number_format($category->expenses->sum('amount'), 2) }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-link">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection 