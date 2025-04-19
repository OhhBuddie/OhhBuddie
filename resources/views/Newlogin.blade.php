<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Coming Soon....</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black; /* Adjust if needed */
        }
        .full-screen-img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: 100vh;
            object-fit: fill; /* Ensures the full image is visible */
            /*zoom:95%;*/
            /*margin-left:20px;*/
        }
        
         .lunch-button {
            position: absolute;
            bottom: 20px;
            background-color: #efc475;
            color: #000;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
        }
        .lunch-button:hover {
            background-color: #e5b960;
        }
    </style>
</head>
<body>

    <img src="{{ $pic }}" alt="Coming Soon" class="full-screen-img">
    
     <a href="/" class="lunch-button">Lunch Now</a>

</body>
</html>


