<?php 
    include("loginHeader.php"); 
    include("dataBase.php");
    include("functions.php");

    // Protect route if not logged in
    if(!isUser()) {
        header("Location: index.php#registration");
    }    
?>
<div class="d-flex">
    <?php 
        include("loginNavbar.php");
    ?>

    <!-- Main Content -->
    <div class="flex-grow-1">
        <!-- Toggle Buttons -->
        <div class="container text-center mt-5 mb-4 toggle-buttons">
            <button id="btn-about" class="btn btn-primary mx-2">About the Conference</button>
            <button id="btn-patron" class="btn btn-outline-primary mx-2">Patrons</button>
            <button id="btn-committee" class="btn btn-outline-primary mx-2">Organizing Committee</button>
        </div>

        <!-- About Section -->
        <section id="about-section" class="section">
            <div class="container" style="margin-left: 50px;">
                <h3>About B.M.S. College of Engineering</h3>

                <div class="row align-items-center mb-5">
                    <div class="col-md-4">
                        <img src="./images/aboutimg1.png" alt="Conference Image" class="img-fluid rounded shadow transform">
                    </div>
                    <div class="col-md-7" style="text-align: justify;">
                        <p>
                            The B.M.S. College of Engineering (BMSCE) was founded by a great visionary and hilanthropist Late <br> Sri. B. M. Sreenivasaiah (BMS) in the year 1946. After demise of the founder, Sri. B. S. Narayan the illustrious son of the Founder took over the reins of the College. Under his able leadership, the college grew from strength to strength. BMSCE is the first engineering college established in the country (preindependent India) by a private enterprise. The college is an aided institution (by Government of Karnataka) and affiliated to Visvesvaraya Technological University (VTU). BMSCE offers 13 UG, 12 PG & 15 Research programmes. BMSCE is proud to be the First and only Engineering Institute in Karnataka accredited with the Highest Grade in three consecutive cycles of NAAC accreditation. The College became an autonomous institution under VTU in the year 2008-09. In the year 2011, BMSCE was recognized as a QIP Centre in Engineering & Technology by All India Council for Technical Education (AICTE). BMSCE is the only partner institution from India along with the other universities located in Chile, China, Germany and USA for the Melton Foundation, USA. . The college has a strong alumni base.
                        </p>
                    </div>
                </div>

                <h3>About the Department of ECE</h3>

                <div class="row align-items-center mb-5">
                    <div class="col-md-4">
                        <img src="./images/aboutimg2.png" alt="Conference Image" class="img-fluid rounded shadow transform">
                    </div>
                    <div class="col-md-7" style="text-align: justify;">
                        <p>
                            The Department of Electronics and Communication Engineering (ECE) of BMSCE was established in 1971 with an initial intake of 60 students to the Under Graduate (UG) program and is enhanced to an intake of 420 students currently. The department offers three PG programs: Electronics (since 1986), Digital Communication Engineering (since 1996) and VLSI Design & Embedded Systems (since 2014). The department is also a recognized Research Centre (RC) by VTU from 2002 and is a recognized Quality Improvement Program (QIP) center by the AICTE from 2011. Department is accredited by NBA (Washington accord) for 3 years under TIER-1 (cycle-2) from 2023-2026.
                        </p>
                    </div>
                </div>


                <h3>About NEWS 2025</h3>

                <div class="row align-items-center mb-5">
                    <div class="col-md-4">
                        <img src="./images/aboutimg1.png" alt="Conference Image" class="img-fluid rounded shadow transform">
                    </div>
                    <div class="col-md-7" style="text-align: justify;">
                        <p>
                            The sixth edition of NEWS 2025 invites papers on diverse topics, including the next generation of wireless communication like 5G/6G, smart embedded systems, and cutting-edge applications in healthcare, industrial automation, and smart grids. Discussions will cover everything from secure blockchain networks and advanced VLSI design to novel quantum technologies and practical testbed deployments. This conference offers a vital platform for sharing groundbreaking ideas and fostering collaborations in these rapidly evolving fields. 
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Patrons Section -->
        <section id="patron-section" class="section" style="display: none;">
            <div class="container">
                <h3 class="text-center mb-5">Meet Our Patrons</h3>

                <?php
                    $sections = [
                        "Chief Patrons" => [
                            ["Dr. B.S. Ragini Narayan", "Donor Trustee", "patron/patron1.png"],
                            ["Dr. Dayanand Pai", "Chairman, BMSCE", "patron/patron2.png"]
                        ],
                        "Patrons" => [
                            ["Dr. Bheemsha Arya", "Principal, BMSCE", "patron/patron3.png"]
                        ],
                        "Advisors" => [
                            ["Dr. L. Ravikumar", "Vice -Principal(Aca), BMSCE", "patron/patron4.png"],
                            ["Dr. Seshachalam D", "Vice-Principal(Admin), BMSCE", "patron/patron5.png"]
                        ]
                    ];

                    foreach ($sections as $sectionTitle => $members) {
                        echo "<h5 class='mb-4'>$sectionTitle</h5><div class='row g-4 mb-5'>";
                        foreach ($members as [$name, $role, $image]) {
                            echo "
                                <div class='col-sm-6 col-md-3 text-center'>
                                    <img src='./images/$image' class='img-fluid rounded-circle mb-2' style='width: 200px; height: 200px; object-fit: cover;'>
                                    <h6>$name</h6>
                                    <p class='text-muted text-center'>$role</p>
                                </div>
                            ";
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        </section>

        <!-- Organizing Committee Section -->
        <section id="committee-section" class="section" style="display: none;">
            <div class="container">
                <h3 class="text-center mb-5">Meet Our Organizing Committee</h3>

                <?php
                    $sections = [
                        "General Chair" => [
                            ["Dr. K. P. Lakshmi", "Prof. & Head, ECE, BMSCE", "committee/committee16.png"]
                        ],
                        "Conveners" => [
                            ["Dr. Santosh R. Desai", "Professor, ECE, BMSCE", "committee/committee18.png"],
                            ["Dr Surendra H. H", "Assoc. Prof., ECE, BMSCE", "committee/committee17.png"]
                        ],
                        "Technical Program Committee" => [
                            ["Dr. Karthikeya G. S", "Asst. Prof., ECE, BMSCE", "committee/committee1.png"],
                            ["Dr. Feroz Morab", "Asst. Prof., ECE, BMSCE", "committee/committee2.png"]
                        ],
                        "Publication and Marketing Committee" => [
                            ["Dr. Lalitha S", "Assoc. Prof., ECE, BMSCE", "committee/committee4.png"],
                            ["Dr. Madhusudhan K. N", "Assoc. Prof., ECE, BMSCE", "committee/committee5.png"],
                            ["Mrs.Priyadarshini Jainapur", "Asst. Prof., ECE, BMSCE", "committee/committee23.png"],
                        ],
                        "Pre Conference Workshop Committee" => [
                            ["Dr. M. S. Suma", "Professor, ECE, BMSCE", "committee/committee7.png"],
                            ["Mrs. Pooja A. P.", "Asst. Prof., ECE, BMSCE", "committee/committee14.png"]
                        ],
                        "Finance Committee" => [
                            ["Prof. Radha R. C", "Asst. Prof., ECE, BMSCE", "committee/committee9.png"],
                            ["Prof Eesha D", "Asst. Prof., ECE, BMSCE", "committee/committee10.png"],
                            ["Dr. Shivkumar M", "Asst. Prof., ECE, BMSCE", "committee/committee11.png"]
                        ],
                        "Registration Committee" => [
                            ["Prof Sowmya Sunkara", "Asst. Prof., ECE, BMSCE", "committee/committee13.png"],
                            ["Prof Pooja A. P", "Asst. Prof., ECE, BMSCE", "committee/committee14.png"],
                            ["Dr. Shivkumar M.", "Asst. Prof., ECE, BMSCE", "committee/committee11.png"],
                            ["Mrs. Geeta", "Asst. Prof., ECE, BMSCE", "committee/committee12.png"]
                        ],
                        "Hospitality /Catering Coordinator" => [
                            ["Prof. Harish V. Mekali", "Asst. Prof., ECE, BMSCE", "committee/committee21.png"],
                            ["Mrs. K. Poornima Kamath", "Asst. Prof., ECE, BMSCE", "committee/committee8.png"]
                        ],
                        "Website Cordinator" => [
                            ["Prof . Suprith Kumar K. S.", "Asst. Prof., ECE, BMSCE", "committee/committee15.png"],
                            ["Mr. Syed Akram", "Asst. Prof., CSE, BMSCE", "committee/committee22.png"],
                            ["Mr. Darshan P(1BM21EC032)", "Dept of ECE, BMSCE", "committee/committee19.png"],
                            ["Miss. Rekha G(1BM21CV080)", "Dept of CIVIL, BMSCE", "committee/committee20.jpg"]
                        ]
                    ];

                    foreach ($sections as $sectionTitle => $members) {
                        echo "<h5 class='mb-4'>$sectionTitle</h5><div class='row g-4 mb-5'>";
                        foreach ($members as [$name, $role, $image]) {
                            echo "
                                <div class='col-sm-6 col-md-3 text-center'>
                                    <img src='./images/$image' class='img-fluid rounded-circle mb-2' style='width: 200px; height: 200px; object-fit: cover;'>
                                    <h6>$name</h6>
                                    <p class='text-muted text-center'>$role</p>
                                </div>
                            ";
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        </section>

        <?php include("loginFooter.php"); ?>
    </div>
</div>

<!-- JS for Toggle -->
<script>
    const btnAbout = document.getElementById("btn-about");
    const btnPatron = document.getElementById("btn-patron");
    const btnCommittee = document.getElementById("btn-committee");
    const aboutSection = document.getElementById("about-section");
    const patronSection = document.getElementById("patron-section");
    const committeeSection = document.getElementById("committee-section");
    btnAbout.addEventListener("click", () => {
        aboutSection.style.display = "block";
        patronSection.style.display = "none";
        committeeSection.style.display = "none";
        btnAbout.classList.replace("btn-outline-primary", "btn-primary");
        btnPatron.classList.replace("btn-primary", "btn-outline-primary");
        btnCommittee.classList.replace("btn-primary", "btn-outline-primary");
    });

    btnPatron.addEventListener("click", () => {
        aboutSection.style.display = "none";
        patronSection.style.display = "block";
        committeeSection.style.display = "none";
        btnAbout.classList.replace("btn-primary", "btn-outline-primary");
        btnPatron.classList.replace("btn-outline-primary", "btn-primary");
        btnCommittee.classList.replace("btn-primary", "btn-outline-primary");
    });

    btnCommittee.addEventListener("click", () => {
        aboutSection.style.display = "none";
        patronSection.style.display = "none";
        committeeSection.style.display = "block";
        btnAbout.classList.replace("btn-primary", "btn-outline-primary");
        btnPatron.classList.replace("btn-primary", "btn-outline-primary");
        btnCommittee.classList.replace("btn-outline-primary", "btn-primary");
    });
</script>