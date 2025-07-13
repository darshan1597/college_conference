<?php
    session_start();
    include("dataBase.php");
    include("functions.php");

    // Protect route if not logged in
    if(!isUser()) {
        header("Location: index.php#registration");
    }
?>

<?php 
    include("loginHeader.php"); 
?>
<div class="d-flex">
    <?php 
        include("loginNavbar.php");
    ?>

    <!-- Main Content -->
    <div class="flex-grow-1">


            
            

        <?php include("footer.php"); ?>
    </div>
</div>