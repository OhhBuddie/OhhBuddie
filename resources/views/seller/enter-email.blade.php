@extends('seller.layout')

@section('content')
<h2 class="text-center">Enter Email</h2>
<p class="text-center text-muted">Please enter your email address.</p>
<form action="{{ route('seller.submit.email') }}" method="POST">
    @csrf
    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
    </div>
    <button type="submit" class="btn btn-danger w-100">Continue</button>
</form>
@endsection
