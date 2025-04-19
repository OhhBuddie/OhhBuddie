<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Redirecting to PayU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2>Please do not refresh this page...</h2>
        <div class="spinner-border text-primary my-4" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>You will be redirected to PayU payment gateway in a moment.</p>
        
        <form id="payuForm" action="{{ $payuUrl }}" method="post">
            @foreach ($payuData as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('payuForm').submit();
            }, 1500);
        });
    </script>
</body>
</html>