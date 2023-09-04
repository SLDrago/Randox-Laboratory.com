<?php
// Include your database connection
require_once 'dbh.php';

function fetchReportTypesFromDatabase(): array
{
    global $conn;

    $query = "SELECT test_id, test_name, test_price FROM tests";
    $result = $conn->query($query);

    $reportTypes = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reportTypes[] = array(
                'id' => $row['test_id'],
                'name' => $row['test_name'],
                'price' => $row['test_price']
            );
        }
    }

    return $reportTypes;
}


