<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OhhBuddie | OTP Verification</title>
    <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/login+page_new.png') no-repeat center center;
            background-size: cover;
        }
        .container {
            text-align: center;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
        }
        .container img {
            width: 100px;
            margin-bottom: 15px;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        p {
            font-size: 14px;
            color: white;
            margin-bottom: 20px;
        }
        .otp-input {
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        .otp-input input {
            width: 40px;
            height: 50px;
            text-align: center;
            font-size: 1.5rem;
            border: 2px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }
        .otp-input input:focus {
            border-color: #EFC475;
        }
        .signin {
            margin-top: 15px;
            padding: 10px 20px;
            background: #EFC475;
            width: 100%;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 3px 5px 6px #5f5f5f; /* Right and bottom shadow */
        }

        .resend-container {
            display: flex;
            justify-content: space-between;
            margin-top: 19px;
            padding: 0px 9px;
        }
        .resend-container a {
            font-size: 14px;
            /*color: #8d4a32;*/
            text-decoration: none;
        }
        .white{
            color:white;
        }
    </style>
</head>
<body>
    <div class="container">
     
        <h2 class="white">Enter Verification Code</h2>

        <p>Code has been sent to ****{{ substr($phone, -4) }} on WhatsApp</p>
        
        
        <form method="POST" action="{{ route('otp.getlogin') }}">

                        @csrf
                        <input type="hidden" name="user_id" value="{{$user_id}}" />
                        
						<div class="input-group">

                                <input type="hidden" name="otp" id="otp" class="@error('otp') is-invalid @enderror" value="{{ old('otp') }}" />
                            
                                <div class="otp-input">
                                    <input type="number" min="0" max="9" required oninput="moveNext(this, 1)" maxlength="1">
                                    <input type="number" min="0" max="9" required oninput="moveNext(this, 2)" maxlength="1">
                                    <input type="number" min="0" max="9" required oninput="moveNext(this, 3)" maxlength="1">
                                    <input type="number" min="0" max="9" required oninput="moveNext(this, 4)" maxlength="1">
                                    <input type="number" min="0" max="9" required oninput="moveNext(this, 5)" maxlength="1">
                                    <input type="number" min="0" max="9" required oninput="moveNext(this, 6)" maxlength="1">
                                </div>
  

                                @error('otp')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror
						</div>
                            <div class="resend-container">
                                <a href="#" class="resend white">Send Otp In Sms</a>
                                <a href="#" class="resend white">Resend Otp</a>
                            </div>
						<button class="signin">
							Sign in
						</button>

			</form>
			
		



    </div>

    <script>
          const inputs = document.querySelectorAll('.otp-input input');
         

          inputs.forEach((input, index) => {
              input.addEventListener('input', (e) => {
                  if (e.target.value.length > 1) {
                      e.target.value = e.target.value.slice(0, 1);
                  }
                  if (e.target.value.length === 1) {
                      if (index < inputs.length - 1) {
                          inputs[index + 1].focus();
                      }
                  }
              });

              input.addEventListener('keydown', (e) => {
                  if (e.key === 'Backspace' && !e.target.value) {
                      if (index > 0) {
                          inputs[index - 1].focus();
                      }
                  }
                  if (e.key === 'e') {
                      e.preventDefault();
                  }
              });
          });

          
    </script>
    
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let otpInputs = document.querySelectorAll('.otp-input input');
        let hiddenOtpInput = document.getElementById('otp');

        // Prefill OTP input boxes if old value exists
        let oldOtp = hiddenOtpInput.value;
        if (oldOtp.length === 6) {
            otpInputs.forEach((input, index) => {
                input.value = oldOtp[index] || '';
            });
        }

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function () {
                // Move to next input if a digit is entered
                if (this.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }

                // Combine OTP values and set hidden input
                let otpValue = Array.from(otpInputs).map(i => i.value).join('');
                hiddenOtpInput.value = otpValue;
            });

            // Handle backspace to move to previous input
            input.addEventListener('keydown', function (e) {
                if (e.key === "Backspace" && this.value === "" && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });
    });
</script>
</body>
</html>
