<div class="Page">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon"
          href="https://cdn3.iconfinder.com/data/icons/elastic-search-line/128/Elastic_Search_-_Line-05-512.png">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        $query = ("SELECT DISTINCT consumption_year, apartment_id, 
                (SELECT MIN(amount) FROM consumption cons_1 WHERE cons_2.apartment_id = cons_1.apartment_id) AS minimum, 
                (SELECT ROUND(AVG(amount), 2) FROM consumption cons_1 WHERE cons_2.apartment_id = cons_1.apartment_id) AS average,
                (SELECT MAX(amount) FROM consumption cons_1 WHERE cons_2.apartment_id = cons_1.apartment_id) AS maximum
                FROM consumption cons_2
                ORDER BY apartment_id; ");

        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            echo "<table>
                      <tr>
                        <th>YEAR</th>
                        <th>APARTMENT_ID</th>
                        <th>MINIMUM</th>
                        <th>AVERAGE</th>
                        <th>MAXIMUM</th>
                      </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['consumption_year'] . "</td>
                        <td>" . $row['apartment_id'] . "</td>
                        <td>" . $row['minimum'] . "</td>
                        <td>" . $row['average'] . "</td>
                        <td>" . $row['maximum'] . "</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<h1> 0 results </h1>";
        }

        CloseCon($conn);
        ?>
    </div>

    <a href="../index.html" class="button">Home</a>
</div>