<div class="Page">
    <link rel="stylesheet" href="../style.css">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit'])) {
            if (isset($_GET['go'])) {
                $apartment_id = $_POST['apartment_id'];

                $query = ("SELECT value
                    FROM receipt
                    WHERE apartment_id = '" . $apartment_id . "'
                    ORDER BY receipt_date; ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>VALUE</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['value'] . "</td>
                              </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<h1> 0 results </h1>";
                }
            }
        }

        CloseCon($conn);
        ?>
    </div>

    <a href="../index.html" class="button">Home</a>
    <a href="../forms/second_query_form.html" class="button">Back</a>
</div>