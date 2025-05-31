<!DOCTYPE html>
<html>
<head>
    <title>Auto WhatsApp Sender</title>
</head>
<body>

    <h2>Auto WhatsApp Sender Running...</h2>

    <script>
        console.log("Script loaded");

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
        }, 60000); // 60,000 ms = 1 minute
    </script>

</body>
</html>
