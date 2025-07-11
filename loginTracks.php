<?php
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
            <section class="section" id="tracks">
                <div class="container">
                    <h3 class="text-center mb-5">Conference Tracks</h3>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="track-box">Track 1: Artificial Intelligence</div>
                        </div>
                        <div class="col-md-4">
                            <div class="track-box">Track 2: Internet of Things (IoT)</div>
                        </div>
                        <div class="col-md-4">
                            <div class="track-box">Track 3: Cybersecurity</div>
                        </div>
                        <div class="col-md-4">
                            <div class="track-box">Track 4: Cloud Computing</div>
                        </div>
                        <div class="col-md-4">
                            <div class="track-box">Track 5: Communication Systems</div>
                        </div>
                        <div class="col-md-4">
                            <div class="track-box">Track 6: Embedded Systems</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
             <?php
                include ("loginFooter.php");
             ?>