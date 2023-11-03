<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Asistance++</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- Include custom CSS styles -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>

<!-- Top Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #4CAF50, #9C27B0);">
    <div class="container">
        <a class="navbar-brand" href="{{ route('contacts.index') }}">Assistance++</a>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link btn btn-dark mx-2" href="{{ route('contacts.index') }}">Contacts</a>
            <a class="nav-item nav-link btn btn-dark mx-2" href="{{ route('contacts.create') }}">Add Contact</a>
            <a class="nav-item nav-link btn btn-dark mx-2" href="{{ route('expenditures.index') }}">Expenditure</a>
            <a class="nav-item nav-link btn btn-dark mx-2" href="{{ route('expenditures.create') }}">Add Expenditure</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
