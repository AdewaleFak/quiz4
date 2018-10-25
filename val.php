<?php
$firstnameerr = $firstname = $lastnameerr = $lastname = $postalcodeerr = $postalcode = $phoneerr = $phone = $emailerr = $email  = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $valid = true;
    if (isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $postalcode = $_POST['postalcode'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $pattern = "/[a-zA-Z]/";
        $postalpattern = "/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/";
        $phonepattern = "/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/";

        if (empty($firstname)) {
            $firstnameerr = "*required field";
            $valid=false;

        } elseif (!preg_match($pattern, $firstname)) {
            $firstnameerr = "Letters Only";
            $valid=false;

        } else {
            $firstnameerr = "";
        }

        if (empty($lastname)) {
            $lastnameerr = "*required field";
            $valid=false;

        } elseif (!preg_match($pattern, $lastname)) {
            $lastnameerr = "Letters Only";
            $valid=false;

        } else {
            $lastnameerr = "";
        }

        if (empty($postalcode)) {
            $postalcodeerr = "*required field";
            $valid=false;

        } elseif (!preg_match($postalpattern, $postalcode)) {
            $postalcodeerr = "Postal code Only";
            $valid=false;

        } else {
            $postalcodeerr = "";
        }

        if (empty($phone)) {
            $phoneerr = "*required field";
            $valid=false;

        } elseif (!preg_match($phonepattern, $postalcode)) {
            $phoneerr = "Postal code Only";
            $valid=false;

        } else {
            $phoneerr = "";
        }

        if (empty($email)) {
            $emailerr = "*required field";
            $valid=false;

        } elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Please enter valid email";
            $valid=false;


        } else {
            $emailerr = "";
        }


        if($valid){
            header('location:action.php');
            exit();
        }

    }
}




?>