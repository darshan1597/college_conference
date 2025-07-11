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

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Registration -->
            <section class="section" id="brochure">
                <div class="container py-5">
                    <h3 class="mb-4 text-center">Our Brochure</h3>

                    <!-- Embedded PDF Viewer -->
                    <div class="mb-4 text-center">
                        <iframe src="brochure/brochure.pdf" width="100%" height="600px" style="border: 1px solid #ccc;"></iframe>
                    </div>

                    <!-- Download Button -->
                    <div class="text-center">
                        <a href="brochure/brochure.pdf" download class="btn btn-primary">
                             Download Brochure
                        </a>
                    </div>
                </div>
            </section>


            <!-- Footer -->
             <?php
                include ("footer.php");
             ?>