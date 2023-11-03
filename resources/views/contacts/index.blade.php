@extends('app')

@section('content')
<div class="container mt-4"> <!-- Tabs for Contacts and Expenditures --> <ul class="nav nav-tabs" id="myTabs"
    role="tablist">
    <li class="nav-item">
    <a class="nav-link active" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts"
    aria-selected="true">Contacts</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" id="expenditures-tab" data-toggle="tab" href="{{ route('expenditures.index') }}#expenditures" role="tab"
    aria-controls="expenditures" aria-selected="false">Expenditures</a>
    </li>
    </ul> <!-- Tab Content -->
    <div class="tab-content" id="myTabContent"> <!-- Contacts Tab --> <div class="tab-pane fade show active"
        id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <h1>Contacts</h1>
        <!-- Search Form -->
        <form action="{{ route('contacts.index') }}" method="GET" class="mb-3">
            <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search contacts" value="{{
            request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
            </form>
            <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ route('contacts.index')
            }}'">Clear</button>

            <!-- Contact Cards -->
            <div class="row">
            @foreach ($contacts as $contact)
            <div class="col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $contact->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $contact->phone }}</p>
                </div>
                <div class="card-footer">
                <a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger delete-contact">Delete</button>
                </form>
            </div>
            </div>
            </div>
            @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
            {{ $contacts->links() }}
    </div>

    <!-- Add Contact Button -->
    <a class="btn btn-success" href="{{ route('contacts.create') }}">Add Contact</a>
</div>



@endsection