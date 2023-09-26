<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/query_page_style.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/jquery v3.6.1.js"></script>
    <script src="js/script.js"></script>
    <style>

    </style>
</head>

<body>
    <?php
    //include auth_session.php file on all user panel pages
    require('db.php');
    include("auth_session.php");
    ?>
    <div class="header">
        <nav class="nav">
            <div class="user">
                <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
            <div class="logout"><a href="logout.php"><button class="btn-logout">Logout</button></a></div>
        </nav>
    </div>
    <h3>Query Form</h3>

    <div class="container">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            <input type="submit" value="Submit">
            <input class="cancel" type="button" value="Cancel" onclick="goBack()">
        </form>
    </div>

</body>

</html>