<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Picker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .custom-dropdown {
            width: 200px;
            position: relative;
        }

        .dropdown-btn {
            width: 120%;
            padding: 10px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .color-box {
            width: 15px;
            height: 15px;
            border: 1px solid #000;
            margin-right: 8px;
        }

        .dropdown-list {
            position: absolute;
            top: 100%;
            left: 0;
            width: 250px;
            background: white;
            border: 1px solid #ccc;
            display: none;
            list-style: none;
            padding: 5px;
            margin: 0;
            z-index: 10;
            /*max-height: 200px;*/
            /*overflow-y: auto;*/
            /*overflow-x:none;*/
        }

        .dropdown-list li {
            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .dropdown-list li:hover {
            background: #f0f0f0;
        }

        .search-box {
            width: calc(100% - 20px);
            padding: 5px;
            margin: 5px;
            border: 1px solid #ccc;
        }

        #colorBoxPreview {
            width: 50px;
            height: 50px;
            border: 1px solid #000;
            margin-top: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <div class="custom-dropdown">
        <div class="dropdown-btn" id="selectedColor">
            <div class="color-box"></div>
            <span>Select a Color</span>
        </div>
        <div class="dropdown-list" id="dropdownContainer">
            <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
            <ul id="colorList">
                @foreach($colors as $clr)
                <li data-color="{{ $clr->hex_code }}">
                    <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>



    <label for="category">Select Category:</label>
    <select id="category">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label for="sizes">Select Size:</label>
    <select id="sizes">
        <option value="">Select Size</option>
    </select>

    <!-- Color Preview Box -->
    <div id="colorBoxPreview" hidden></div>

    <script>
        const dropdownBtn = document.getElementById("selectedColor");
        const dropdownContainer = document.getElementById("dropdownContainer");
        const colorList = document.getElementById("colorList");
        const colorBoxPreview = document.getElementById("colorBoxPreview");
        const searchBox = document.getElementById("searchColor");

        // Toggle dropdown visibility
        dropdownBtn.addEventListener("click", function() {
            dropdownContainer.style.display = dropdownContainer.style.display === "block" ? "none" : "block";
        });

        // Handle color selection
        document.querySelectorAll("#colorList li").forEach(item => {
            item.addEventListener("click", function() {
                let selectedColor = this.getAttribute("data-color");
                let colorName = this.innerText.trim();

                // Update dropdown button
                dropdownBtn.innerHTML = `<div class="color-box" style="background: ${selectedColor};"></div> ${colorName}`;

                // Update preview box
                colorBoxPreview.style.backgroundColor = selectedColor;

                // Hide dropdown list
                dropdownContainer.style.display = "none";
            });
        });

        // Search function
        searchBox.addEventListener("input", function() {
            let filter = searchBox.value.toLowerCase();
            let items = document.querySelectorAll("#colorList li");

            items.forEach(item => {
                let text = item.innerText.toLowerCase();
                if (text.includes(filter)) {
                    item.style.display = "flex";
                } else {
                    item.style.display = "none";
                }
            });
        });

        // Close dropdown if clicked outside
        document.addEventListener("click", function(event) {
            if (!dropdownBtn.contains(event.target) && !dropdownContainer.contains(event.target)) {
                dropdownContainer.style.display = "none";
            }
        });
    </script>




    <script>
    $(document).ready(function() {
    $("#category").change(function() {
        let categoryId = $(this).val();


        // If no category is selected, reset sizes dropdown
        if (categoryId === "") {
            $("#sizes").html('<option value="">Select Size</option>');
            return;
        }

        $.ajax({
            url: "/get-sizes/" + categoryId, // Laravel route
            type: "GET",
            success: function(response) {
                let options = '<option value="">Select Size</option>';
                response.forEach(size => {
                    options += `<option value="${size}">${size}</option>`;
                });
                $("#sizes").html(options);
            }
        });
    });

    // Event delegation for color selection
    $("#colorList").on("click", "li", function() {
        let selectedColor = $(this).data("color");
        let colorName = $(this).text().trim();

        // Update dropdown button
        $("#selectedColor").html(
            `<div class="color-box" style="background: ${selectedColor};"></div> ${colorName}`
        );

        // Update preview box
        $("#colorBoxPreview").css("background-color", selectedColor).show();

        // Hide dropdown list
        $("#dropdownContainer").hide();
    });

    // Toggle dropdown visibility
    $("#selectedColor").click(function(event) {
        event.stopPropagation(); // Prevent click from closing it immediately
        $("#dropdownContainer").toggle();
    });

    // Search function
    $("#searchColor").on("input", function() {
        let filter = $(this).val().toLowerCase();
        $("#colorList li").each(function() {
            $(this).toggle($(this).text().toLowerCase().includes(filter));
        });
    });

    // Close dropdown if clicked outside
    $(document).click(function(event) {
        if (!$(event.target).closest(".custom-dropdown").length) {
            $("#dropdownContainer").hide();
        }
    });
});

    </script>
</body>
</html>