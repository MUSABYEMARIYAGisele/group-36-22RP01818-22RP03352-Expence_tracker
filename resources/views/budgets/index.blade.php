@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Budgets</h2>
                    <a href="{{ route('budgets.create') }}" class="btn btn-primary">Add New Budget</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Spent</th>
                                <th>Remaining</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($budgets as $budget)
                                <tr>
                                    <td>{{ $budget->category->category_name }}</td>
                                    <td>${{ number_format($budget->amount, 2) }}</td>
                                    <td>${{ number_format($budget->category->expenses->sum('amount'), 2) }}</td>
                                    <td>${{ number_format($budget->amount - $budget->category->expenses->sum('amount'), 2) }}</td>
                                    <td>
                                        <a href="{{ route('budgets.edit', $budget) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No budgets found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 