<div class="Page">
    <link rel="stylesheet" href="../style.css">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit'])) {
            if (isset($_GET['go'])) {
                $landlord_name = $_POST['landlord_name'];

                $query = ("SELECT name
                        FROM landlord 
                        WHERE landlord_id IN (
                            SELECT DISTINCT landlord_id
                            FROM apartment
                            WHERE area >= ANY (SELECT area 
                                                FROM apartment 
                                                WHERE landlord_id = (SELECT landlord_id 
                                                                        FROM landlord
                                                                        WHERE name = '" . $landlord_name . "'
                                                                     )
                                               )
                                              ) AND name <> '" . $landlord_name . "'; ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>NAME</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['name'] . "</td>
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
    <a href="../forms/sixth_query_form.html" class="button">Back</a>
</div>