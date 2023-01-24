<!DOCTYPE html>
<html>

    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="/app.js"></script>

    </head>
    <body>
    <script>function encodeEmail(email) {
    // Encode the email address using base64 encoding
    var encodedEmail = btoa(email);
    console.log('Encoding email: ' + email);
console.log('Encoded email: ' + btoa(email));
    return encodedEmail;
}</script>
    <?php

// Connect to the database
$conn = mysqli_connect('127.0.0.1', 'root', '', 'naltis','3306');

// Check the connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Select the data from the table
$sql = "SELECT last_name, first_name, email FROM naltis";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table>";

    // Set the counter to 0
    $counter = 0;

    // Loop through the results
    while ($row = mysqli_fetch_assoc($result)) {
        // Increment the counter
        $counter++;

        // Set the background color based on the counter value
        if ($counter % 2 == 0) {
            $bgcolor = "#ffffff";
        } else {
            $bgcolor = "#dddddd";
        }

        // Generate the table row
        echo "<tr style='background-color: $bgcolor'>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
    echo "No results found";
}

// Close the connection
mysqli_close($conn);

?>
<a href="mailto:<?php echo encodeEmail(); ?>">Contact us</a> 

</body>
<script>

</script>

<!-- Use the encodeEmail function to encode the email address -->
</html>

