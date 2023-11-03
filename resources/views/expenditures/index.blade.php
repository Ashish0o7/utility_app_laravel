@extends('app')

@section('content')
<div class="container mt-4"> <h1>Expenditures</h1> <!-- Display a table of expenditures --> <table class="table
    table-bordered table-striped"> <thead>
        
    <tr>
    <th>Description</th>
    <th>Amount</th>
    <th>Category</th>
    <th>Date</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($expenditures as $expenditure)
        <tr>
        <td>{{ $expenditure->description }}</td>
        <td>{{ $expenditure->amount }}</td>
        <td>{{ $expenditure->category }}</td>
        <td>{{ $expenditure->date }}</td>
        <td>
        <a class="btn btn-primary" href="{{ route('expenditures.edit', $expenditure->id) }}">Edit</a>
        <form action="{{ route('expenditures.destroy', $expenditure->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger delete-expenditure">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $expenditures->links() }}
            </div>

            <!-- Add Expenditure Button -->
            <a class="btn btn-success" href="{{ route('expenditures.create') }}">Add Expenditure</a>
</div>
@endsection