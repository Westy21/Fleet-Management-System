<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <?php
    function get_post($pdo, $var)
    {
        return $pdo->quote($var);
    }

    require('db.php');
    session_start();

    // When form submitted, check and create user session.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = sanitize_data($_REQUEST['username']);    // removes backslashes
        $password = sanitize_data($_REQUEST['password']);
        // Check user is exist in the database
        $query    = "SELECT * FROM `administrators` WHERE username='$username'
                     AND password='" . $password . "'";
        $result = $pdo->query($query);

        if ($row = $result->fetch()) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form-popup'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }
    ?>
    <!--Login Form -->
    <div class="form-popup login">
        <form method="post" class="form-container" autocomplete="off"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1 class="login-title">Login</h1>
            <input type="text" name="username" placeholder="Username" autocomplete="false" />
            <input type="password" name="password" placeholder="Password" autocomplete="new-password" />
            <input type="submit" value="Login" name="submit" class="btn" onclick="formReset()" />
        </form>
    </div>
    <script>
    formReset()
    </script>
</body>

</html>