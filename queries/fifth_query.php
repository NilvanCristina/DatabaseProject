<div class="Page">
    <link rel="stylesheet" href="../style.css">

    <div class="Content">
        <?php
        include '../db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit'])) {
            if (isset($_GET['go'])) {
                $month = $_POST['month'];
                $year = $_POST['year'];

                $query = ("SELECT DISTINCT amount AS amount
                        FROM consumption
                        WHERE consumption_month = '" . $month . "' AND consumption_year = 2021 AND value >= ALL (
                                                                        SELECT value
                                                                        FROM consumption 
                                                                        WHERE consumption_month = '" . $month . "' AND consumption_year = '" . $year . "'); ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>AMOUNT</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['amount'] . "</td>
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
    <a href="../forms/fifth_query_form.html" class="button">Back</a>
</div>