@extends('layouts.account')
@section('content')
    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    
 <style>
 
    body {
        background-color: #f0f2f5;
        font-family: sans-serif;
        color: black;
    }

    a {
        text-decoration: none;
    }

    .profile-container {
        background: black;
        padding: 0px 25px 29px;
        padding-bottom: 13vh;
    }
    
    .list-group-item {
        font-size: 16px;
        padding: 17px 6px;
        border: none; /* Removes the border lines */
        display: flex;
        align-items: center;
        background-color:black;
 
        justify-content: space-between;
        position: relative; /* For better control over icon placement */
    }

    .list-group-item i {
        font-size: 18px;
        margin-right: 0; /* Remove unnecessary margin */
        margin-left: -8px; /* Push icon further to the left */
        color: white;
    }
    
    .list-group-item img{
        width: 25px;
        height: 25px;
    }

    .list-group-item a {
        flex-grow: 1;
        padding-left: 12px; /* Add padding between icon and text */
        color: white;
        text-decoration: none;
    }

    .list-group-item .bi-chevron-right {
        margin-left: 0px; /* Moves the chevron to the far right */
        font-size: 12px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.8;
    }

    .logout-btn {
        background-color: #efc475;
        color: black;
        border-radius: 6px;
        height: 40px;
    }

    .logout-btn:hover {
        background-color: var(--secondary-color);
    }

    .flex-grow-1 {
        color: black;
    }

    /* Cover photo styling */
    .cover-photo {
        width: 100%;
        height: 240px;
        overflow: hidden;
        margin-top: -60px;
        object-fit: fill;
    }

    .cover-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Profile header styling */
    .profile-header {
        background-color: black;
        padding: 20px;
        margin-top: -80px;
        height: 200px; /* Slight overlap with the cover photo */
    }

    .profile-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid black; /* To highlight the profile picture */
    }

    .profile-header p {
        font-size: 16px;
        margin-top: -2px;
        color: white;
    }
    
    .row{
        background: #1f1f1f;
    }
</style>
<style>
    .profile-img {
        width: 150px; /* Adjust as needed */
        height: 150px;
        border-radius: 50%;
        display: block;
    }

    .edit-icon {
        position: absolute;
        bottom: 5px;  /* Fixed to bottom */
        right: 5px;   /* Fixed to right */
        background-color: #1f1f1f;
        color: white;
        border-radius: 50%;
        padding: 8px;
        font-size: 14px;
    }

    .edit-icon i {
        font-size: 14px;
    }
</style>
<style>
    .icon-bg {
      width: 25px; /* Adjust as needed */
      height: 25px;
      background: rgba(255, 255, 255, 0.3); /* White with low opacity */
      border-radius: 50%; /* Makes it a circle */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .icon-bg i {
      color: black; /* Ensures the icon is visible */
      font-size: 20px; /* Adjust size as needed */
    }

</style>
 <div class="cover-photo">
    <!--<img src="{{ asset('public/assets/images/banners/cover_photo.jpg') }}" alt="Cover Photo" class="cover-img">-->
    
   
    
    <video width="430" height="360"  playsinline autoplay muted loop style="width: -webkit-fill-available;"><source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/user/user_cover.mp4" type="video/mp4" class="cover-img" ></video>
 </div>
 
<div class="profile-header text-center">
    <div class="position-relative d-inline-block">
        @if(Auth::user()->profile_photo == null)
            <img src="https://cdn-icons-png.flaticon.com/128/3177/3177440.png" class="profile-img">
        @else
            <img src="{{ Auth::user()->profile_photo }}" class="profile-img">

        @endif
    
        <!-- Edit Icon -->
        <a href="/profileedit/{{ Auth::user()->id }}" class="edit-icon">
            <i class="fas fa-edit"></i> <!-- FontAwesome Edit Icon -->
        </a>
    </div>

    <p style="margin-bottom:0px;">{{Auth::user()->name}}</p>
    <p>{{Auth::user()->email}}<br></p>
    <br>
</div>



<div class="profile-container">
    <ul class="list-group">
        <li class="list-group-item">
            <!--<i class="bi bi-basket"></i>-->
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/bag.png">
            <a href="/order" class="flex-grow-1">My Orders</a>
             <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/ARROW.png">

        </li>
        <li class="list-group-item">
            <!--<i class="bi bi-box-seam"></i>-->
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/hanger.png">
            <a href="/Mytryout" class="flex-grow-1">My Tryout Orders</a>

            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/ARROW.png">

        </li>
        <li class="list-group-item">
            <!--<i class="bi bi-heart"></i>-->
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/card.png">
            <a href="/Mypayment" class="flex-grow-1">My Payment</a>
              <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/ARROW.png">
        </li>
        <li class="list-group-item">
            <!--<i class="bi bi-geo-alt"></i>-->
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/wallet+card.png">
            <a href="/Mywallet" class="flex-grow-1">My Wallet</a>
             <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/ARROW.png">
        </li>
        <li class="list-group-item">
            <!--<i class="bi bi-wallet"></i>-->
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/location.png">
            <a href="/Myaddress" class="flex-grow-1">My Addresses</a>
              <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/ARROW.png">
        </li>
        <li class="list-group-item">
            <!--<i class="bi bi-ticket"></i>-->
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/cart.png">
            <a href="/wishlist" class="flex-grow-1">My Wishlist</a>
              <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/ARROW.png">
        </li>
        <li class="list-group-item">
            <!--<i class="bi bi-chat-dots"></i>-->
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/support.png">
            <a href="/Mysupport" class="flex-grow-1">My Support Ticket</a>
              <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/SVG+Icons/ARROW.png">
        </li>
        
    </ul>
    <div class="text-center mt-4 px-2">
        <a href="/logout" class="btn logout-btn w-100" style="font-size:20px;">Logout</a>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection