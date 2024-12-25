<?php

$conn=mysqli_connect("localhost","root","","db_mypro");



// Use prepared statements to avoid SQL injection

$query = 'SELECT * FROM user_registration';

$result = mysqli_query($conn, $query); // mysqli_query replaces mysql_query



if (!$result) {

    $message = 'ERROR: ' . mysqli_error($conn); // mysqli_error replaces mysql_error

    echo $message;

    return;

} else {

    echo '

    <html>

    <head>

        <style>

            table {

                width: 80%;

                border-collapse: collapse;

                margin: 50px auto;

                font-family: Arial, sans-serif;

                background-color: #f2f2f2;

            }

            th, td {

                border: 1px solid #ddd;

                padding: 12px;

                text-align: center;

            }

            th {

                background-color: #4CAF50;

                color: white;

            }

            tr:nth-child(even) {

                background-color: #f9f9f9;

            }

            tr:hover {

                background-color: #d1e0e0;

            }

            a {

                color: red;

                text-decoration: none;

            }

            a:hover {

                text-decoration: underline;

            }

        </style>

    </head>

    <body>

        <table>

            <tr>';



    // Fetch field names dynamically and create table headers

    $fields = mysqli_fetch_fields($result); // mysqli_fetch_fields replaces mysql_fetch_field

    foreach ($fields as $field) {

        echo '<th>' . ucfirst($field->name) . '</th>';

    }

    echo '<th>Delete</th></tr>';



    // Fetch table rows

    while ($row = mysqli_fetch_row($result)) { // mysqli_fetch_row replaces mysql_fetch_row

        echo '<tr>';

        $idval = $row[0]; // Assume the first column is the id

        foreach ($row as $cell) {

            echo '<td>' . htmlspecialchars($cell) . '</td>'; // Use htmlspecialchars to prevent XSS

        }

        echo '<td><a href="delete.php?id=' . $idval . '">Delete</a></td>';

        echo '</tr>';

    }



    echo '</table>

    </body>

    </html>';



    mysqli_free_result($result); // mysqli_free_result replaces mysql_free_result

}



mysqli_close($conn); // mysqli_close replaces mysql_close

?>

