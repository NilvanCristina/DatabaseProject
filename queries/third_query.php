<div class="Page">
    <link rel="stylesheet" href="../style.css">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit'])) {
            if (isset($_GET['go'])) {
                $address = $_POST['address'];
                $month = $_POST['month'];
                $year = $_POST['year'];

                $query = ("SELECT address, apartment_number, landlord_id, value
                        FROM apartment JOIN receipt USING(apartment_id)
                        WHERE address = '" . $address . "' AND DATE_FORMAT(receipt_date, '%b') = '" . $month . "' AND
                        DATE_FORMAT(receipt_date, '%Y') = '" . $year . "'; ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>ADDRESS</th>
                                <th>APARTMENT_NUMBER</th>
                                <th>LANDLORD_ID</th>
                                <th>VALUE</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['address'] . "</td>
                                <td>" . $row['apartment_number'] . "</td>
                                <td>" . $row['landlord_id'] . "</td>
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
    <a href="../forms/third_query_form.html" class="button">Back</a>
</div>