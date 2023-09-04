<?php
// Include your database connection
use Classes\DbConnector;
require 'vendor\autoload.php';


function fetchReportTypesFromDatabase(): array
{
    $db = new DbConnector();
    $conn = $db->getConnection();
    $query = "SELECT test_id, test_name, test_price FROM tests";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $reportTypes = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $reportTypes[] = array(
            'id' => $row['test_id'],
            'name' => $row['test_name'],
            'price' => $row['test_price']
        );
    }

    return $reportTypes;
}


