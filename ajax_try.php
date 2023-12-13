<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Example</title>
    <style>
        /* Styles for the overlay background */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Styles for the overlay background */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* semi-transparent black background */
            align-items: center;
            justify-content: center;
        }

        /* Styles for the modal */
        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Button to trigger the popup -->
<button onclick="openPopup()">Open Popup</button>

<!-- The overlay and modal -->
<div class="overlay" id="overlay">
    <div class="modal">
        <p>This is a popup content.</p>
        <button onclick="closePopup()">Close</button>
    </div>
</div>

<script>
    // Function to open the popup
    function openPopup() {
        document.getElementById('overlay').style.display = 'flex';
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
    }
</script>

</body>
</html>
