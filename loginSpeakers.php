<?php
    session_start();
    include("database.php");
    include("functions.php");

    // Protect route if not logged in
    if(!isUser()) {
        header("Location: index.php#registration");
    }
?>
<?php
    include ("loginHeader.php");
?>

    <div class="d-flex">
        <!-- Sidebar -->
        <?php
            include ("loginNavbar.php");
        ?>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <section class="section">
                <!-- Speakers -->
                <div class="container">
                    <h3 class="mb-5">Speakers</h3>
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <img src="./images/hero.jpg" alt="Speaker 1" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/speaker2.jpg" alt="Speaker 2" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/speaker3.jpg" alt="Speaker 3" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                    </div>
                </div>
                <!-- Invited talk speakers -->
                <div class="container">
                    <h3 class="mb-5 mt-5">Invited talk Speakers</h3>
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <img src="./images/aboutimg1.png" alt="Speaker 1" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/speaker2.jpg" alt="Speaker 2" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/speaker3.jpg" alt="Speaker 3" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                    </div>
                </div>
                <!-- Other speakers -->
                <div class="container">
                    <h3 class="mb-5 mt-5">Other Speakers</h3>
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <img src="./images/logo.png" alt="Speaker 1" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/speaker2.jpg" alt="Speaker 2" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/speaker3.jpg" alt="Speaker 3" class="img-fluid rounded shadow mb-3" style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;">
                            <h5>XYZ</h5>
                            <p>Profession</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
             <?php
                include ("loginFooter.php");
             ?>