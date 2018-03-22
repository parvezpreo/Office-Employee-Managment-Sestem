<?php
    include 'db.php';

    if ( isset($_POST['submit'])) {
        $re_email = $_POST['re_email'];
        $re_pass = $_POST['re_pass'];
        $results = $conn->query("SELECT * FROM registrations WHERE re_email = '$re_email' AND re_pass = '$re_pass'");
        $row = $results->fetch_array(MYSQLI_BOTH);

        session_start();
        $_SESSION['re'] = $row['re'];
        $_SESSION['re_email'] = $row['re_email'];
        $_SESSION['re_name'] = $row['re_name'];
        $_SESSION['re_image'] = $row['re_image'];
        $_SESSION['re_status'] = $row['re_status'];

        echo '<h2 style="display:block;position:absolute;text-align:center;top:40%;left:35%;">wellcome <span style="color:red;font-size:40px;text-transform:uppercase;">'. $_SESSION['re_name'] .' </span>you\'re loged in</h2>';
        header("Refresh:2; index.php");
        
    }

?>