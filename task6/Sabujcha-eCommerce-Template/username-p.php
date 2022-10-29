<?php
session_start();
include "db_conn.php";

if (isset($_POST['username'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $loginName = validate($_POST['loginName']);
    if (empty($username)) {
        header("Location: username.php?error=User Name is required");
        exit();
        $sql = "SELECT * FROM users WHERE user_name='$loginName' AND password='$loginPassword'";
    }
}