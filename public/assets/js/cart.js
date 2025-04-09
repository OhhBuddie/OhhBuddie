<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
         function toggleText(element) {
            if (element.textContent === "Go To Bag") {
                // Redirect to /addtocart
                window.location.href = "/addtocart";
            } else {
                // Change text to "Go To Bag"
                element.textContent = "Go To Bag";
                localStorage.setItem("bagButtonText", "Go To Bag"); // Store state in localStorage
            }
        }
        
        // Reset text when the page reloads
        window.onload = function() {
            let button = document.querySelector(".addtobag");
            if (button) {
                button.textContent = "Add to Bag"; // Reset text on reload
            }
        };
    </script>
    <script>

         document.addEventListener("scroll", () => {
          const contentDiv = document.getElementById("contentDiv");
          const navbar = document.getElementById("bottomNavbar");
        
          // Get the position of the content div relative to the viewport
          const contentRect = contentDiv.getBoundingClientRect();
          const contentBottom = contentRect.bottom;
        
          // Check if the bottom of the content div is above the viewport bottom
          if (contentBottom <= window.innerHeight) {
            // If the content is scrolled past, make the navbar static
            navbar.classList.add("unfixed");
          } else {
            // If the content is visible, keep the navbar fixed
            navbar.classList.remove("unfixed");
          }
        });


        // Accordian 
        
        document.addEventListener("DOMContentLoaded", () => {
          const accordionHeaders = document.querySelectorAll(".accordion-header");
        
          accordionHeaders.forEach(header => {
            header.addEventListener("click", () => {
              const content = header.nextElementSibling;
              const icon = header.querySelector("i");
        
              // Toggle content visibility
              const isVisible = content.style.display === "block";
              content.style.display = isVisible ? "none" : "block";
        
              // Toggle icon rotation
              icon.classList.toggle("rotate", !isVisible);
            });
          });
        });
        
        
    </script>

    
        <script>
        // Toggle wishlist icon color
        function toggleWishlist(icon) {
            icon.classList.toggle('selected');
        }
    </script>
    
    
        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function enforceLength(input) {
            let value = input.value;
    
            // Remove non-numeric characters (for safety)
            value = value.replace(/\D/g, '');
    
            // Enforce max length of 6
            if (value.length > 6) {
                value = value.slice(0, 6);
            }
    
            input.value = value;
        }
    
        function validatePincode() {
            let pincode = document.getElementById("pincode").value;
            let errorMessage = document.getElementById("error-message");
            let successMessage = document.getElementById("success-message");
    
            if (pincode.length !== 6) {
                errorMessage.style.display = "flex";
                successMessage.style.display = "none";
                return;
            }
    
            // AJAX request to check pincode
            $.ajax({
                url: "{{ route('check.pincode') }}",  // Laravel route to check pincode
                type: "GET",
                data: { pincode: pincode },
                success: function(response) {
                    if (response.valid) {
                        successMessage.style.display = "flex";
                        successMessage.textContent = "Valid Pincode";
                        errorMessage.style.display = "none";
                    } else {
                        errorMessage.style.display = "flex";
                        errorMessage.textContent = "Pincode Not Valid";
                        successMessage.style.display = "none";
                    }
                },
                error: function() {
                    errorMessage.style.display = "flex";
                    errorMessage.textContent = "Error checking pincode";
                    successMessage.style.display = "none";
                }
            });
        }
    </script>
        <script>
            function selectSize(button, size) {
                // Update hidden input with selected size
                document.getElementById("selectedSizeInput").value = size;
        
                // Update displayed selected size text
                document.getElementById("selectedSize").innerText = size;
        
                // Remove active class from all buttons and add to clicked button
                document.querySelectorAll(".btn-outline-secondary").forEach(btn => btn.classList.remove("btn-primary"));
                button.classList.add("btn-primary");
            }
        </script>
        <script>
            function selectSize(button, size) {
                // Remove active class from all buttons
                document.querySelectorAll('.btn-outline-secondary').forEach(btn => {
                    btn.classList.remove('active');
                });
            
                // Add active class to the clicked button
                button.classList.add('active');
            }

        </script>