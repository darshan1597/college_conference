<?php
    
    include ("loginHeader.php");
    include ("dataBase.php");
    include ("functions.php");

    if(isset($_SESSION['userId'])) {
        $query = "
            UPDATE user 
            SET form_status = 'submitted' 
            WHERE user_id = :userId
        ";

        $statement = $connection->prepare($query);
        $statement->execute([':userId' => $_SESSION['userId']]);
    }
    else {
        header("Location: index.php");
        exit();
    }

    // Protect route if not logged in
    if(!isUser()) {
        header("Location: index.php#registration");
    }

    // Fetch user details
    $query = "
        SELECT * FROM user 
        WHERE user_id = :userId
        LIMIT 1
    ";
    $statement = $connection->prepare($query);
    $statement->execute([':userId' => $_SESSION["userId"]]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
?>
<style>
    .center{
        display: flex;
        justify-content: center;
    }
    .container {
        max-width: 800px;
        margin: 60px auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        padding: 40px;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-header h2 {
        font-weight: bold;
        color: #007bff;
    }

    .profile-section {
        margin-bottom: 20px;
    }

    .profile-label {
        font-weight: 500;
        color: #555;
    }

    .profile-value {
        font-size: 1rem;
        color: #333;
    }

    .btn-logout {
        float: right;
    }
</style>
    <div class="d-flex bg-light" style="min-height: 100vh;">
        <?php
            include ("loginNavbar.php")
        ?>
        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Registration -->
            <section class="section">
                <div class="container">
                    <h2 class="text-center">Welcome, <?php echo strtoupper(htmlspecialchars($user['user_name'])); ?> 👋</h2>
                     <p class="text-muted text-center mb-5">Here are your details</p>
                    <div class="profile-section row">
                        <div class="col-md-6 mb-3">
                            <label class="profile-label"><strong>Full Name</strong></label>
                            <div class="profile-value"><?php echo ucwords(strtolower(htmlspecialchars($user['user_name']))); ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="profile-label"><strong>Email Address</strong></label>
                            <div class="profile-value"><?php echo strtolower(htmlspecialchars($user['user_email'])); ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="profile-label"><strong>Phone Number</strong></label>
                            <div class="profile-value"><?php echo ucwords(strtolower(htmlspecialchars($user['phone_number']))); ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="profile-label"><strong>Presentation Mode</strong></label>
                            <div class="profile-value"><?php echo ucwords(strtolower(htmlspecialchars($user['mode']))); ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="profile-label"><strong>Category</strong></label>
                            <div class="profile-value"><?php echo ucwords(strtolower(htmlspecialchars($user['category']))); ?></div>
                        </div>
                        <div class="col-md-6">
                            <label class="profile-label"><strong>Payment Status</strong></label>
                            <div class="profile-value">
                                <?php echo ($user['payment_status'] === 'paid') ? '✅ Paid' : '❌ Pending'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>    
            
            <?php
                include ("footer.php")
            ?>