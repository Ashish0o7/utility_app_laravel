@extends('app')

@section('content')
<div class="container"> <div class="row justify-content-center"> <div class="col-md-8">
    <div class="card">
    <div class="card-header">
    <h1 class="mb-0">{{ isset($contact) ? 'Edit Contact' : 'Add Contact' }}</h1>
    </div>
    <div class="card-body">
    <form action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.store') }}"
        method="POST">
        @csrf
        @if (isset($contact))
        @method('PUT')
        @endif
        <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ isset($contact) ? $contact->name : '' }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ isset($contact) ? $contact->email : '' }}">
        </div>
        <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" name="phone" value="{{ isset($contact) ? $contact->phone : '' }}">
</div>
<div class="text-center">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection