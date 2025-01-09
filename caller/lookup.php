<?php
// Get the phone number from the URL query string
if (isset($_GET['phone_number'])) {
    $phone_number = $_GET['phone_number']; // Ensure the phone number is set
} else {
    die("Phone number is missing.");
}

// Your NumVerify API key (replace with your actual API key from your account)
$api_key = '11a8ade467f934c2ca8183c0fa408de2';  // Replace with your NumVerify API key

// Prepare the URL for the NumVerify API request
$url = "http://apilayer.net/api/validate?access_key=$api_key&number=$phone_number&country_code=ZA&format=1";

// Send the request to the API and get the response
$response = file_get_contents($url);

// Check if the request was successful
if ($response === FALSE) {
    die('Error occurred while fetching data from NumVerify API');
}

// Decode the JSON response
$details = json_decode($response, true);

// Start HTML structure
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Number Lookup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        .info {
            margin-top: 20px;
        }
        .info div {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fafafa;
        }
        .info div strong {
            color: #4CAF50;
        }
        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        .form {
            text-align: center;
            margin-top: 20px;
        }
        .form input[type="text"] {
            padding: 8px;
            width: 250px;
            font-size: 16px;
            margin-right: 10px;
        }
        .form input[type="submit"] {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Phone Number Lookup</h1>

    <?php
    // Check if the response is valid and display details
    if ($details['valid']) {
        echo '<div class="info">';
        echo '<div><strong>Phone Number:</strong> ' . $details['international_format'] . '</div>';
        echo '<div><strong>Country:</strong> ' . $details['country_name'] . '</div>';
        echo '<div><strong>Location:</strong> ' . $details['location'] . '</div>';
        echo '<div><strong>Line Type:</strong> ' . $details['line_type'] . '</div>';
        echo '<div><strong>Carrier:</strong> ' . (isset($details['carrier']) ? $details['carrier'] : 'N/A') . '</div>';
        echo '</div>';
    } else {
        echo '<p class="error">No information found for this number.</p>';
    }
    ?>
    
    <div class="form">
        <form action="" method="get">
            <input type="text" name="phone_number" placeholder="Enter phone number" required>
            <input type="submit" value="Lookup">
        </form>
    </div>
</div>

</body>
</html>
