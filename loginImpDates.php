<?php
    include ("loginHeader.php");
    include("dataBase.php");
    include ("functions.php");

    // Protect route if not logged in
    if(!isUser()) {
        header("Location: index.php#registration");
    }    
?>

    <!-- Sidebar Navigation -->
    <div class="d-flex" style="min-height: 100vh;">
        <?php
            include ("loginNavbar.php");
        ?>

        <!-- Main Content -->
        <div class="flex-grow-1">

            <section class="section" id="conference-schedule">
                <div class="container">
                    <h3 class="text-center mb-4 mt-4 text-primary">Conference Timeline</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>Event</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Conference Launch, Call for Papers (CFP)</td>
                                    <td>14 July 2025</td>
                                </tr>
                                <tr>
                                    <td>Paper Submission Opens</td>
                                    <td>1 Aug 2025</td>
                                </tr>
                                <tr>
                                    <td>Last Date for Paper Submission</td>
                                    <td>15 Sept. 2025</td>
                                </tr>
                                <tr>
                                    <td>Acceptance Notification</td>
                                    <td>10 Oct. 2025</td>
                                </tr>
                                <tr>
                                    <td>Author Registrations</td>
                                    <td>13 - 15 Oct. 2025</td>
                                </tr>
                                <tr>
                                    <td>Camera-Ready Paper (Revised)</td>
                                    <td>25 Oct. 2025</td>
                                </tr>
                                <tr>
                                    <td>Final Presentation Schedule</td>
                                    <td>31 Oct. 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


            <!-- Footer -->
             <?php
                include ("loginFooter.php");
             ?>