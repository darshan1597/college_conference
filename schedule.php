<?php
    include ("header.php");
?>

    <!-- Sidebar Navigation -->
    <div class="d-flex">
        <?php
            include ("navBar.php");
        ?>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <section class="section">
                <div class="container">
                    <h3 class="text-center mb-4">Conference Schedule</h3>

                    <div class="table-responsive-mobile">
                        <table class="schedule-table">
                            <tr class="schedule-day"><td colspan="7">Day 1 - July 10</td></tr>
                            <tr>
                                <th>Time</th>
                                <th>Session No</th>
                                <th>Hall 1</th>
                                <th>Hall 2</th>
                                <th>Hall 3</th>
                                <th>Hall 4</th>
                                <th>Hall 5</th>
                            </tr>
                            <tr>
                                <td>8:00 AM - 9:00 AM</td>
                                <td colspan="6">Registration</td>
                            </tr>
                            <tr>
                                <td>10:00 AM - 11:00 AM</td>
                                <td>Session 1</td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1199, 1350, 1374</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1616, 1654</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">2345, 2346</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1099, 1102</span></td>
                                <td class="highlight">Emerging Trends<br><span class="subtext">1197, 1416</span></td>
                            </tr>
                            <tr>
                                <td>11:00 AM - 12:00 PM</td>
                                <td colspan="6">Invited Talk-1: <strong>Prof. XYZ</strong>, Professor at University of XYZ, X | Invited-Talk-2 [TBD]</td>
                            </tr>
                            <tr>
                                <td>12:00 PM - 1:00 PM</td>
                                <td colspan="6">Invited-Talk-3 [TBD] | Invited-Talk-4 [ITS]</td>
                            </tr>
                            <tr>
                                <td>12:00 PM - 01:00 PM</td>
                                <td colspan="6">Lunch</td>
                            </tr>
                            <tr>
                                <td>01:00 AM - 02:00 AM</td>
                                <td>Session 2</td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1199, 1350, 1374</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1616, 1654</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">2345, 2346</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1099, 1102</span></td>
                                <td class="highlight">Emerging Trends<br><span class="subtext">1197, 1416</span></td>
                            </tr>
                            <tr>
                                <td>02:00 AM - 03:00 AM</td>
                                <td>Session 3</td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1199, 1350, 1374</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1616, 1654</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">2345, 2346</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1099, 1102</span></td>
                                <td class="highlight">Emerging Trends<br><span class="subtext">1197, 1416</span></td>
                            </tr>
                            <!-- Add more rows if needed -->
                            <tr class="schedule-day"><td colspan="7">Day 2 - July 11</td></tr>
                            <tr>
                                <th>Time</th>
                                <th>Session No</th>
                                <th>Hall 1</th>
                                <th>Hall 2</th>
                                <th>Hall 3</th>
                                <th>Hall 4</th>
                                <th>Hall 5</th>
                            </tr>
                            <tr>
                                <td>8:00 AM - 9:00 AM</td>
                                <td colspan="6">Registration</td>
                            </tr>
                            <tr>
                                <td>10:00 AM - 11:00 AM</td>
                                <td>Session 1</td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1199, 1350, 1374</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1616, 1654</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">2345, 2346</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1099, 1102</span></td>
                                <td class="highlight">Emerging Trends<br><span class="subtext">1197, 1416</span></td>
                            </tr>
                            <tr>
                                <td>11:00 AM - 12:00 PM</td>
                                <td colspan="6">Invited Talk-1: <strong>Prof. XYZ</strong>, Professor at University of XYZ, X | Invited-Talk-2 [TBD]</td>
                            </tr>
                            <tr>
                                <td>12:00 PM - 1:00 PM</td>
                                <td colspan="6">Invited-Talk-3 [TBD] | Invited-Talk-4 [ITS]</td>
                            </tr>
                            <tr>
                                <td>12:00 PM - 01:00 PM</td>
                                <td colspan="6">Lunch</td>
                            </tr>
                            <tr>
                                <td>01:00 AM - 02:00 AM</td>
                                <td>Session 2</td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1199, 1350, 1374</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1616, 1654</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">2345, 2346</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1099, 1102</span></td>
                                <td class="highlight">Emerging Trends<br><span class="subtext">1197, 1416</span></td>
                            </tr>
                            <tr>
                                <td>02:00 AM - 03:00 AM</td>
                                <td>Session 3</td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1199, 1350, 1374</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1616, 1654</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">2345, 2346</span></td>
                                <td class="highlight">Signal Processing<br><span class="subtext">1099, 1102</span></td>
                                <td class="highlight">Emerging Trends<br><span class="subtext">1197, 1416</span></td>
                            </tr>
                            <!-- Add more rows if needed -->

                            <!-- Add more schedules if needed -->
                        </table>
                    </div>
                </div>
            </section>

            <!-- Footer -->
             <?php
                include ("footer.php");
             ?>