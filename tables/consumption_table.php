<div class="Page">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn3.iconfinder.com/data/icons/elastic-search-line/128/Elastic_Search_-_Line-05-512.png">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        $query = ("SELECT *
                    FROM consumption");

        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            echo "<table>
                      <tr>
                        <th>APARTMENT_ID</th>
                        <th>CONSUMPTION_YEAR</th>
                        <th>CONSUMPTION_MONTH</th>
                        <th>NO_PEOPLE</th>
                        <th>AMOUNT</th>
                        <th>VALUE</th>
                        <th>WATER_PRICE</th>
                      </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['apartment_id'] . "</td>
                        <td>" . $row['consumption_year'] . "</td>
                        <td>" . $row['consumption_month'] . "</td>
                        <td>" . $row['no_people'] . "</td>
                        <td>" . $row['amount'] . "</td>
                        <td>" . $row['value'] . "</td>
                        <td>" . $row['water_price'] . "</td>
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