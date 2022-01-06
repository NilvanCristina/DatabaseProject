<div class="Page">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn3.iconfinder.com/data/icons/elastic-search-line/128/Elastic_Search_-_Line-05-512.png">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        $query = ("SELECT *
                    FROM landlord");

        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            echo "<table>
                      <tr>
                        <th>LANDLORD_ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE_NUMBER</th>
                      </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['landlord_id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone_number'] . "</td>
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