@extends('seller.layout')

@section('content')
<h2 class="text-center">Login/SignUp</h2>
<p class="text-center text-muted">Online shopping destination for your family's Fashion & Lifestyle needs.</p>
<form action="{{ route('seller.submit.phone') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        
        <input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" required>
    </div>
    <button type="submit" class="btn btn-danger w-100">Continue</button>
</form>
<div class="text-center my-3">OR</div>
<button class="btn btn-light w-100 mb-2">📩 Continue with Email</button>
<div class="d-flex justify-content-between">
    <button class="btn btn-light w-48"><i class="fa-brands fa-facebook-f"></i> Facebook</button>
    <button class="btn btn-light w-48"><i class="fa-brands fa-google"></i> Google</button>
</div>
<p class="text-center mt-3 text-muted">
    By creating an account or logging in, you agree with our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.
</p>
<p class="text-center mt-2">
    Don't have an account? <a href="#">Register Now</a>
</p>
@endsection
