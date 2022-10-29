<?php
session_start();
include "db_conn.php";

if (isset($_POST['loginName']) && isset($_POST['loginPassword'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $loginName = validate($_POST['loginName']);
    $loginPassword = validate($_POST['loginPassword']);

    if (empty($loginName)) {
        header("Location: login-register.php?error=User Name is required");
        exit();
    } else if (empty($loginPassword)) {
        header("Location: login-register.php?error=Password is required");
        exit();
    } else {
        // hashing the password
        $loginPassword = md5($loginPassword);

        $sql = "SELECT * FROM users WHERE user_name='$loginName' AND password='$loginPassword'";

        $result = mysqli_query($conn, $sql);
        // echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $loginName && $row['password'] === $loginPassword) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: login-register.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: login-register.php?error=Incorect User name or password");
            exit();
        }
    }
} else {
    header("Location: login-register.php");
    exit();
}