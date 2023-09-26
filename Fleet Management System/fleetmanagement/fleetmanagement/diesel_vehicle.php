<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/jquery v3.6.1.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <div class="header">
        <nav class="nav">
            <div class="user">
                <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
            <div class="logout"><a href="logout.php"><button class="btn-logout">Logout</button></a></div>
        </nav>
    </div>
</body>
<div class="table-head">
    <h2>Diesel Vehicles</h2>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Current Driver</th>
            <th>Previous Driver</th>
            <th>Model</th>
            <th>Fuel Type</th>
            <th>Fuel Capacity</th>
            <th>Registration Number</th>
            <th>Branch</th>
            <th>Department</th>
            <th>Vehicle Type</th>
            <th>Make</th>
            <th>Written Off</th>

            <!-- for update button -->
            <th> </th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = getAllByAttribute($pdo, "fuel_type", "diesel");
        while ($row = $result->fetch()) {
            $id = htmlspecialchars($row["id"]);
            $r0 = htmlspecialchars($row["driver"]);
            $r1 = htmlspecialchars($row["pre_driver"]);
            $r2 = htmlspecialchars($row["model"]);
            $r3 = htmlspecialchars($row["fuel_type"]);
            $r4 = htmlspecialchars($row["fuel_capacity"]);
            $r5 = htmlspecialchars($row["registration_num"]);
            $r6 = htmlspecialchars($row["branch"]);
            $r7 = htmlspecialchars($row["depatment"]);
            $r8 = htmlspecialchars($row["vehicle_type"]);
            $r9 = htmlspecialchars($row["make"]);
            $r10 = (htmlspecialchars($row["written_off"]) == 1) ? "NO" : "YES";
            $toHeader = htmlspecialchars($_SERVER["PHP_SELF"]);
            echo <<< _END
                            <tr>
                                <td>$r0</td>
                                <td>$r1</td>
                                <td>$r2</td>
                                <td>$r3</td>
                                <td>$r4</td>
                                <td>$r5</td>
                                <td>$r6</td>
                                <td>$r7</td>
                                <td>$r8</td>
                                <td>$r9</td>
                                <td>$r10</td>
                                <td><form method="POST"action="update.php"><input type="hidden" name="id" value="$id"><button class="btn btn-update" type="submit">Update</button></form></td>
                                <td><form method="POST"action="driver_query.php"><input type="hidden" name="id" value="$id"><button class="btn btn-update" type="submit">Query</button></form></td>
                            </tr>
                        _END;
        }
        ?>
    </tbody>
</table>
<div class="bottom">
    <button type="button" class="btn-update cancel" onclick="goBack()">Back</button>
</div>


</html>