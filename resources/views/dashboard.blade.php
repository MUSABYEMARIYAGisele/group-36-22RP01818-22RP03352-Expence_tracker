@extends('layouts.app')

@section('title', 'Dashboard - Expense Tracker')

@section('content')
<div class="dashboard">
    <h2>Welcome, {{ Auth::user()->username }}!</h2>

    <div class="dashboard-stats">
        <div class="stat-card">
            <h3>Total Expenses</h3>
            <p class="stat-value">${{ number_format(Auth::user()->expenses->sum('amount'), 2) }}</p>
        </div>

        <div class="stat-card">
            <h3>Total Budget</h3>
            <p class="stat-value">${{ number_format(Auth::user()->budgets->sum('amount'), 2) }}</p>
        </div>

        <div class="stat-card">
            <h3>Categories</h3>
            <p class="stat-value">{{ Auth::user()->categories->count() }}</p>
        </div>
    </div>

    <div class="recent-expenses">
        <h3>Recently Expenses</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Auth::user()->expenses->sortByDesc('date')->take(5) as $expense)
                <tr>
                    <td>{{ $expense->date->format('Y-m-d') }}</td>
                    <td>{{ $expense->category->category_name }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>${{ number_format($expense->amount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 