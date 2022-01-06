<div class="Page">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn3.iconfinder.com/data/icons/elastic-search-line/128/Elastic_Search_-_Line-05-512.png">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        $query = ("SELECT *
                    FROM apartment");

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
            echo "0 results";
        }

        CloseCon($conn);
        ?>
    </div>

    <a href="../index.html" class="button">Home</a>
</div>