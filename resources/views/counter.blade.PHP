<!-- resources/views/counter.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="2">
</head>
<body>
    <h1>Counter: {{ $counter }}</h1>
    <script>
        setInterval(function () {
            fetch('/send-auto-whatsapp')
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not OK");
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Message status:', data.status);
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        }, 60000); // 1 minute interval
    </script>

</body>
</html>
