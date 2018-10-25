<?php

class Form{

    public function addForm($db, $id,$firstname, $lastname, $postalcode, $phone, $email, $insurance)
    {

        $sql = "INSERT INTO insrequests (id, firstname, lastname, postalcode, phone, email, insurance)
            VALUES (:id, :firstname, :lastname, :postalcode, :phone, :email, :insurance)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $id, PDO::PARAM_STR);
        $pdostm->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $pdostm->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $pdostm->bindValue(':postalcode', $postalcode, PDO::PARAM_STR);
        $pdostm->bindValue(':phone', $phone, PDO::PARAM_STR);
        $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
        $pdostm->bindValue(':insurance', $insurance, PDO::PARAM_STR);

        $count  = $pdostm->execute();
        return $count;
        //header("Location: form.php");
    }
}