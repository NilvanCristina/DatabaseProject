<div class="Page">
    <link rel="stylesheet" href="../style.css">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit'])) {
            if (isset($_GET['go'])) {
                $address = $_POST['address'];
                $area = $_POST['area'];

                $query = ("SELECT *
                    FROM apartment
                    WHERE address LIKE '" . $address . "' AND area = '" . $area . "'
                    ORDER BY address DESC, apartment_number; ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>APARTMENT_ID</th>
                                <th>ADDRESS</th>
                                <th>APARTMENT_NUMBER</th>
                                <th>AREA</th>
                                <th>LANDLORD_ID</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['apartment_id'] . "</td>
                                <td>" . $row['address'] . "</td>
                                <td>" . $row['apartment_number'] . "</td>
                                <td>" . $row['area'] . "</td>
                                <td>" . $row['landlord_id'] . "</td>
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
    <a href="../forms/first_query_form.html" class="button">Back</a>
</div>