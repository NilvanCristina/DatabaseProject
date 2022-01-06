<div class="Page">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn3.iconfinder.com/data/icons/elastic-search-line/128/Elastic_Search_-_Line-05-512.png">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        $query = ("SELECT *
                    FROM receipt");

        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            echo "<table>
                      <tr>
                        <th>RECEIPT_NUMBER</th>
                        <th>RECEIPT_DATE</th>
                        <th>APARTMENT_ID</th>
                        <th>VALUE</th>
                      </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['receipt_number'] . "</td>
                        <td>" . $row['receipt_date'] . "</td>
                        <td>" . $row['apartment_id'] . "</td>
                        <td>" . $row['value'] . "</td>
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