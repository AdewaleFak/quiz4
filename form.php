<?php
require_once 'database.php';
require_once 'formclass.php';
require_once 'val.php';



if(isset($_POST['submit'])){
    //get form values and assign to local varaibles
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $postalcode = $_POST['postalcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $insurance = $_POST['insurance'];
    $db = Database::getDb();


    $a =  new Form();
    $count=$a->addForm($db,$id, $firstname, $lastname, $postalcode, $phone, $email, $insurance);

    header("Location: form.php");
    echo  $count. " Inserted " ;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database</title>

    <link href="form.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <form class="form-signin" action="form.php" method="post">
        <h1 class="form-signin-heading">Request For Information Form</h1>
        <h3>To recieve information on our products and services by email, please complete the form below</h3>

        <input type="hidden" class="form-control" name="id" /></br>
        <label>First Name:</label>
        <input type="text" class="form-control" name="firstname" placeholder="Firstname"
               value="<?php if (isset($_POST['firstname']))echo $_POST['firstname']; ?>"/><span style="color: red"> <?php echo $firstnameerr; ?></span>
        </br>
        <label>Last Name:</label>
        <input type="text" class="form-control" name="lastname" placeholder="Lastname"
               value="<?php if (isset($_POST['lastname']))echo $_POST['lastname']; ?>"/><span style="color: red"> <?php echo $lastnameerr; ?></span>
        </br>
        <label>Postal Code</label>
        <input type="text" class="form-control" name="postalcode" placeholder="Postalcode"
               value="<?php if (isset($_POST['postalcode']))echo $_POST['postalcode']; ?>"/><span style="color: red"> <?php echo $postalcodeerr; ?></span>
        </br>
        <label>Phone Number</label>
        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
               value="<?php if (isset($_POST['phone']))echo $_POST['phone']; ?>"/><span style="color: red"> <?php echo $phoneerr; ?></span>
        </br>
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email"
               value="<?php if (isset($_POST['email']))echo $_POST['email']; ?>"/><span style="color: red"> <?php echo $emailerr; ?></span>

        <br><br>
        <label>Please send me <br>information on <br> the following <br> product</label>
        <input type="radio" class="form-control"  name="insurance" value="Life Insurance"> Life Insurance<br>
        <input type="radio" class="form-control"  name="insurance" value="Health Insurance"> Health Insurance<br>
        <input type="radio" class="form-control"  name="insurance" value="Health Insurance"> Health Insurance<br>
        <input type="radio" class="form-control"  name="insurance" value="Travel Insurance"> Travel Insurance<br>

        <button name="submit" type="submit">Submit</button><br><br>


    </form>
</div>

</body>
</html>