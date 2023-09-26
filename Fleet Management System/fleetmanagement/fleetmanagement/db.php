<?php
// Enter your host tableName, database username, password, and database tableName.
// If you have not set database password on localhost then set empty.
try {
    $pdo = new PDO("mysql:host=localhost;dbname=fleetdatabase;charset=utf8mb4", "root", "mysql", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $ex) {
    throw new PDOException($ex->getMessage(), (int)$ex->getCode());
}

// common functions

//returns results of a select * query of primary-key [id]
function getRecord($pdo, $id)
{
    $query    = "SELECT * FROM `fleet` WHERE id=$id;";
    return $pdo->query($query);
}

function getAllRecords($pdo, $tableName)

{
    $query = "SELECT * FROM `$tableName`;";
    return $pdo->query($query);
}

function getAllByAttribute($pdo, $attr, $value)
{
    $query = "SELECT * FROM `fleet` WHERE $attr='$value';";
    return $pdo->query($query);
}

function sanitize_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}