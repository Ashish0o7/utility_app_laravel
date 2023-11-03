@extends('app')

@section('content')
<div class="container mt-4"> <h1 class="mb-4">Add New Expenditure</h1> <!-- Expenditure form with improved design -->
    <form action="{{ route('expenditures.store') }}" method="POST"> @csrf <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" placeholder="Enter a description" required>
</div>

<div class="form-group">
    <label for="amount">Amount</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">$</span>
        </div>
        <input type="number" name="amount" class="form-control" placeholder="Enter the amount" required>
    </div>
</div>

<div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control">
         <option value="shopping">Shopping</option>
        <option value="clothes">Clothes</option>
        <option value="food">Food</option>
        <option value="entertainment">Entertainment</option>
            <option value="transportation">Transportation</option>
                <option value="education">Education</option>
                <option value="healthcare">Healthcare</option>
                <option value="travel">Travel</option>
                <option value="electronics">Electronics</option>
                <option value="home-improvement">Home Improvement</option>
                <option value="gifts">Gifts</option>
                <option value="hobbies">Hobbies</option>
                <option value="utilities">Utilities</option>
                <option value="subscriptions">Subscriptions</option>
                <option value="charity">Charity</option>
                <option value="sports">Sports</option>
                <option value="pets">Pets</option>
                <option value="books">Books</option>
                <option value="beauty">Beauty</option>
                <option value="furniture">Furniture</option>
                <option value="jewelry">Jewelry</option>
                <option value="other">Other</option>
        <!-- Add more categories here -->
    </select>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
@endsection