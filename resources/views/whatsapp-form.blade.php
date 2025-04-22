<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send WhatsApp Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .alert {
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        .loading {
            display: none;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h2>Send WhatsApp Message</h2>
    
    <form id="whatsappForm">
        <div class="form-group">
            <label for="phone">Phone Number (with country code):</label>
            <input type="text" id="phone" name="phone" placeholder="91XXXXXXXXXX" required>
            <small>Example: 918123456789 (no spaces or special characters)</small>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <button type="submit">Send Message</button>
    </form>

    <div id="loading" class="loading">
        Sending message, please wait...
    </div>

    <div id="result" style="display: none;"></div>

    <script>
        document.getElementById('whatsappForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Get form values
            const phone = document.getElementById('phone').value.trim();
            const message = document.getElementById('message').value;
            
            // Simple validation for phone number
            const phoneRegex = /^\d+$/;
            if (!phoneRegex.test(phone)) {
                showAlert('Phone number should contain only digits (no spaces, +, or other characters)', 'error');
                return;
            }

            // Show loading indicator
            document.getElementById('loading').style.display = 'block';
            
            // Hide previous results
            document.getElementById('result').style.display = 'none';

            // Send the request
            fetch('https://ohhbuddie.com/api/send-whatsapp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'include',
                body: JSON.stringify({ phone, message }),
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('loading').style.display = 'none';
                
                if (data.status === 'Message sent successfully!') {
                    showAlert('Message sent successfully!', 'success');
                    // Clear the form
                    document.getElementById('whatsappForm').reset();
                } else {
                    showAlert('Failed to send message: ' + (data.error ? JSON.stringify(data.error) : 'Unknown error'), 'error');
                }
            })
            .catch(error => {
                document.getElementById('loading').style.display = 'none';
                showAlert('Error connecting to the server. Please check your network connection and try again.', 'error');
                console.error('Error:', error);
            });
        });

        function showAlert(message, type) {
            const resultDiv = document.getElementById('result');
            resultDiv.className = 'alert alert-' + type;
            resultDiv.textContent = message;
            resultDiv.style.display = 'block';
        }
    </script>
</body>
</html>