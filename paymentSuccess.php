<?php
    include("dataBase.php");
    include("functions.php");

    if(isset($_SESSION['userId'])) {
        $amount = convertData($_GET["amount"],'decrypt');
        $cat = convertData($_GET["cat"],'decrypt');
        $mode = $_GET["mode"];

        $data = array(
            ':amount'   => $amount,
            ':category' => $cat,
            ':mode'     => $mode,
            ':userId'   => $_SESSION['userId']
        );

        $query = "
            UPDATE user 
            SET 
                payment_status = 'paid',
                amount = :amount,
                category = :category,
                mode = :mode
            WHERE user_id = :userId
        ";

        $statement = $connection->prepare($query);
        
        $statement->execute($data);

        // Redirect to google form with payment id
        header("Location: https://docs.google.com/forms/d/e/1FAIpQLSexTRjCTC-fdhtfflRmWEMNv4g05KPwXNmNF4vxptlpm_OEoQ/viewform?pid=" . $_GET['pid']);
        exit();
    }
    else {
        header("Location: index.php");
        exit();
    }
?>
