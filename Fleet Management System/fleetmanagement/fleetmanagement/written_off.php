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
    <div class="table-head">
        <h2>Vehicles Written-Off</h2>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Registration Number</th>
                    <th>Make</th>
                    <!-- for update button -->
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = getAllByAttribute($pdo, "written_off", 0);
                while ($row = $result->fetch()) {
                    $id = htmlspecialchars($row["id"]);
                    $r2 = htmlspecialchars($row["model"]);
                    $r5 = htmlspecialchars($row["registration_num"]);
                    $r9 = htmlspecialchars($row["make"]);
                    $toHeader = htmlspecialchars($_SERVER["PHP_SELF"]);

                    echo <<< _END
                            <tr>
                                <td>$r2</td>
                                <td>$r5</td>
                                <td>$r9</td>
                                <td><form method="POST"action="update.php"><input type="hidden" name="id" value="$id">
                                <button class="btn btn-update" type="submit">Update</button>
                                </form></td>
                                <td><form method="POST"action="driver_query.php"><input type="hidden" name="id" value="$id">
                                <button class="btn btn-update" type="submit">Query</button>
                                </form></td>
                            </tr>
                        _END;
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="bottom">
        <button type="button" class="btn-update cancel" onclick="goBack()">Back</button>
    </div>

</body>

</html>