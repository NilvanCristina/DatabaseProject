<div class="Page">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon"
          href="https://cdn3.iconfinder.com/data/icons/elastic-search-line/128/Elastic_Search_-_Line-05-512.png">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        $query = "SELECT ap_1.apartment_id AS ap_id_1, ap_1.address AS address_ap_1, ap_2.apartment_id AS ap_id_2, ap_2.address AS address_ap_2
                FROM apartment ap_1 INNER JOIN apartment ap_2 
                    ON (ap_1.landlord_id = ap_2.landlord_id AND ap_1.address <> ap_2.address AND ap_1.apartment_id < ap_2.apartment_id); ";

        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            echo "<table>
                      <tr>
                        <th>AP_ID_1</th>
                        <th>ADDRESS_AP_1</th>
                        <th>AP_ID_2</th>
                        <th>ADDRESS_AP_2</th>
                      </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['ap_id_1'] . "</td>
                        <td>" . $row['address_ap_1'] . "</td>
                        <td>" . $row['ap_id_2'] . "</td>
                        <td>" . $row['address_ap_2'] . "</td>
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