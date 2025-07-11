<?php
    session_start();
    include("dataBase.php");

    // Get payment ID from Razorpay
    $paymentId = isset($_GET['pid']) ? $_GET['pid'] : '';

    // Fetch user details using session user ID
    $query = "SELECT user_name, user_email, phone_number FROM user WHERE user_id = :uid";
    $stmt = $connection->prepare($query);
    $stmt->execute([':uid' => $_SESSION['userId']]);
    $user = $stmt->fetch();

    if($user){
        $name = urlencode($user['user_name']);
        $email = urlencode($user['user_email']);
        $phone = urlencode($user['phone_number']);
        $payment = urlencode($paymentId);

        // Replace with your actual Google Form prefill URL with the correct field entry IDs
        $googleFormUrl = "https://docs.google.com/forms/d/e/1FAIpQLSexTRjCTC-fdhtfflRmWEMNv4g05KPwXNmNF4vxptlpm_OEoQ/viewform?usp=header";

        header("Location: $googleFormUrl");
        exit();
    }
    else {
        echo "User not found.";
    }
?>
