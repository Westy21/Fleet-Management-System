<?php
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

    <div class="form-popup">
        <h1>Update Record</h1>

        <?php
        $id = 0;

        //showvalues
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $result = getRecord($pdo, $_POST["id"]);
            if ($row = $result->fetch()) {
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
                $r10 = htmlspecialchars($row["written_off"]);

                //checkbox checked || not checked
                $is_checked = ($r10 == 0) ? "checked='checked'" : "";


                $toheader = htmlspecialchars($_SERVER["PHP_SELF"]);
                echo <<<_END
                        <form method="POST" action="$toheader" class="form-container">
                            <input type="hidden" name="id" value="$id" required>
                            <input type="hidden" name="update" value="yes">
                            Current Driver<input type="text" name="driver" value="$r0" required>
                            previours Driver<input type="text" name="pre_driver" value="$r1" required>
                            Model<input type="text" name="model" value="$r2" required>
                            Fuel Type<input type="text" name="fuel_type" value="$r3" required>
                            FuelCapacity<input type="text" name="fuel_capacity" value="$r4" required>
                            Registration Number<input type="text" name="registration_num" value="$r5" required>
                            Branch<input type="text" name="branch" value="$r6" required>
                            Department<input type="text" name="depatment" value="$r7" required>
                            Vehicle Type: <select name="vehicle_type" class="select">
                            
                    _END;
                //Selected option for Vehicle_type
                $Vehicle_Types = array("coupe", "hatchback", "suv", "sedan");
                $index = 0;
                foreach ($Vehicle_Types as $type) {
                    $index++;
                    if ($r8 == $type) {
                        echo ("<option value='$type' selected='selected'>$type</option>");
                    } else {
                        echo ("<option value='$type'>$type</option>");
                    }
                }
                echo <<<_END
                        </select><br>
                        Make <input type="text" name="make" value="$r9" required>
                        Written Off <input type="checkbox" name="written_off" value="1" $is_checked>
                        <button class="btn" type="submit" onclick="formReset()" >Update</button>
                        <button type="button" class="cancel btn" onclick="goBack()">Cancel</button>
                    </form>
                    _END;
            }
        } else {
            //what is the user doing here if not id in $_POST
            echo <<<_END
                    <script>
                        window.location.replace("dashboard.php")
                    </script>
                _END;
        }
        //update values
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["update"])) {
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
                $r11 = 1; // default not selected
                if (isset($_POST["written_off"])) {
                    $r11 = 0;
                }
                $query =
                    "UPDATE `fleet` SET `driver` = '$r1', `pre_driver` = '$r2', `model` = '$r3', `fuel_type` = '$r4',
                     `fuel_capacity` = '$r5', `registration_num` = '$r6', `branch` = '$r7', `depatment` = '$r8',
                      `vehicle_type` = '$r9', `make` = '$r10', `written_off` = '$r11' WHERE `fleet`.`id` = $id;";
                try {
                    $pdo->query($query);
                    echo <<<_END
                        <script>
                            alert("Update Successfull!")
                            window.location.replace("dashboard.php")
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
        }
        ?>

    </div>

</body>

</html>