<?php
    include ("header.php");
    include ("functions.php");

    $message = '';
?>

    <!-- Sidebar Navigation -->
    <div class="d-flex" style="min-height: 100vh;">
        <?php
            include ("navBar.php");
        ?>

        <?php 
            if($message != ''){
                echo '
                    <div class="center">
                        <div class="alert alert-dismissible fade show alert-danger" role="alert">
                        <ul class="list-unstyled">'.$message.'</ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                ';
            }
		?>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Hero Section -->
            <section class="hero text-white d-flex align-items-center justify-content-center text-center">
                <div>
                    <h2>Welcome to <br> Networking Embedded Wireless System <br> (NEWS 2025)</h2>
                    <!-- <p>Join us from July 10–12 in Bengaluru, India</p> -->
                    <a href="#registration" class="btn btn-primary">Register Now</a>
                </div>
            </section>

            <!-- Welcome Section -->
            <section class="py-5 text-center bg-white">
                <div class="container">
                    <h2 class="mb-4 fw-bold">
                        Welcome to Networking Embedded Wireless System <br> (NEWS 2025)
                    </h2>
                    <div class="info-box mx-auto">
                        <p class="text-muted mb-4">
                            The sixth edition of NEWS 2025 invites papers on diverse topics, including the next generation of wireless communication like 5G/6G, smart embedded systems, and cutting-edge applications in healthcare, industrial automation, and smart grids. Discussions will cover everything from secure blockchain networks and advanced VLSI design to novel quantum technologies and practical testbed deployments. This conference offers a vital platform for sharing groundbreaking ideas and fostering collaborations in these rapidly evolving fields.
                        </p>
                    </div>
                    <a href="about.php" class="btn btn-primary px-4 py-2 rounded fw-semibold">Learn More</a>
                </div>
            </section>

            <!-- Registration -->
            <section class="section" id="registration">
                <div class="container">
                    <h3 class="text-center mb-5">Conference 2025 Registration</h3>

                    <!-- Offline Mode(In-Person) -->
                    <div class="row g-3 mt-5">
                        <h4>Offline Presentation(In-Person)</h4>
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card h-100 text-center p-4 border">
                                <h5 class="fw-bold">ISOI members(Student-UG/PG/Research Scholars)</h5>
                                <h2 class="text-primary my-3">₹ 700</h2>
                                <?php
                                echo'
                                    <a href="register.php?amount='.convertData(string: 700).'&mode=offline&cat='.convertData('ISOI members(Student-UG/PG/Research Scholars)') .'" class="btn btn-outline-primary">Register Now</a>
                                    ';
                                ?>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card h-100 text-center p-4 border">
                                <h5 class="fw-bold">Non-ISOI members(Students-UG/PG/Research Scholars)</h5>
                                <h2 class="text-primary my-3">₹ 900</h2>
                                <?php
                                echo'
                                    <a href="register.php?amount='.convertData(900).'&mode=offline&cat='.convertData('Non-ISOI members(Students-UG/PG/Research Scholars)') .'" class="btn btn-outline-primary">Register Now</a>
                                    ';
                                ?>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card h-100 text-center p-4 border">
                                <h5 class="fw-bold">Faculty/Industry Persons</h5>
                                <h2 class="text-primary my-3">₹ 1000</h2>
                                <?php
                                echo'
                                    <a href="register.php?amount='.convertData(1000).'&mode=offline&cat='.convertData('Faculty/Industry Persons') .'" class="btn btn-outline-primary">Register Now</a>
                                    ';
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Online Mode(In-Person) -->
                    <div class="row g-3">
                        <h4>Online Presentation(Virtual)</h4>
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card h-100 text-center p-4 border">
                                <h5 class="fw-bold">ISOI members(Student-UG/PG/Research Scholars)</h5>
                                <h2 class="text-primary my-3">₹ 600</h2>
                                <?php
                                echo'
                                    <a href="register.php?amount='.convertData(600).'&mode=online&cat='.convertData('ISOI members(Student-UG/PG/Research Scholars)') .'" class="btn btn-outline-primary">Register Now</a>
                                    ';
                                ?>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card h-100 text-center p-4 border">
                                <h5 class="fw-bold">Non-ISOI members(Students-UG/PG/Research Scholars)</h5>
                                <h2 class="text-primary my-3">₹ 750</h2>
                                <?php
                                echo'
                                    <a href="register.php?amount='.convertData(750).'&mode=online&cat='.convertData('Non-ISOI members(Students-UG/PG/Research Scholars)') .'" class="btn btn-outline-primary">Register Now</a>
                                    ';
                                ?>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card h-100 text-center p-4 border">
                                <h5 class="fw-bold">Faculty/Industry Persons</h5>
                                <h2 class="text-primary my-3">₹750</h2>
                                <?php
                                echo'
                                    <a href="register.php?amount='.convertData(750).'&mode=online&cat='.convertData('Faculty/Industry Persons') .'" class="btn btn-outline-primary">Register Now</a>
                                    ';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
             <?php
                include ("footer.php");
             ?>