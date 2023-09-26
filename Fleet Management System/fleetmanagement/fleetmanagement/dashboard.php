<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/jquery v3.6.1.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $r1 = sanitize_data($_POST["driver"]);
        $r2 = sanitize_data($_POST["pre_driver"]);
        $r3 = sanitize_data($_POST["model"]);
        $r4 = sanitize_data($_POST["fuel_type"]);
        $r5 = sanitize_data($_POST["fuel_capacity"]);
        $r6 = sanitize_data($_POST["registration_num"]);
        $r7 = sanitize_data($_POST["branch"]);
        $r8 = sanitize_data($_POST["depatment"]);
        $r9 = sanitize_data($_POST["vehicle_type"]);
        $r10 = sanitize_data($_POST["make"]);
        $r11 = 1;
        if (isset($_POST["written_off"])) {
            $r11 = 0;
        }

        $query =
            "INSERT INTO fleet VALUES(0,'$r1','$r2','$r3','$r4',$r5,$r6,'$r7','$r8','$r9','$r10',$r11);";
        try {
            $result = $pdo->query($query);
            echo <<<_END
                        <script>
                            alert("Vihecle registration successful!")
                        </script>
                    _END;
        } catch (PDOException $ex) {
            $err = $ex->getMessage();
            echo <<<_END
                        <script>
                            alert("$err")
                        </script>
                    _END;
        }
    }
    ?>

    <div class="header">
        <nav class="nav">
            <div class="user">
                <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
            <div class="logout"><a href="logout.php"><button class="btn-logout">Logout</button></a></div>
        </nav>
    </div>
    <section class="grid">
        <div class="table-head">
            <h2>Vehicle Records</h2>
        </div>
        <div class="options">
            <div class="left">
                <button type="button" class="btn-update btn-option opt1">Written
                    Off</button>
                <button type="button" class="btn-update btn-option opt2">Deisel
                    Vehicles</button>
            </div>
            <div class="right">
                <button type="button" class="btn-update btn-option"><a href="#addrecord">Add</a></button>
            </div>
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
                $result = getAllRecords($pdo, "fleet");
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
        <div class="form-popup">
            <h1 id="addrecord">Add Record</h1>
            <form method="POST" action="<?php $toHeader ?>" class="form-container">
                Current Driver<input type="text" name="driver" required>
                previours Driver<input type="text" name="pre_driver" required>
                Model<input type="text" name="model" required>
                Fuel Type<input type="text" name="fuel_type" required>
                FuelCapacity<input type="text" name="fuel_capacity" required>
                Registration Number<input type="text" name="registration_num" required>
                Branch<input type="text" name="branch" required>
                Department<input type="text" name="depatment" required>
                Vehicle Type: <select name="vehicle_type" id="" class="select">
                    <option value="coupe">coupe</option>
                    <option value="hatchback">hatchback</option>
                    <option value="suv">suv</option>
                    <option value="sedan">sedan</option>
                </select><br>
                Make <input type="text" name="make" required>
                Written Off <input type="checkbox" name="written_off" value="1">
                <button class="btn" type="submit" onclick="formReset()">Add</button>
            </form>
        </div>
    </section>
</body>

</html>