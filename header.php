<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Important Dates - Conference 2025</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-wrapper">
            <img src="./images/logo.png" alt="Loading..." class="preloader-logo" />
            <div class="spinner-ring"></div>
        </div>
    </div>

    <!-- Header -->
    <div class="top-header bg-light px-3 py-2 d-flex justify-content-between align-items-center">
        <!-- Left: Logo -->
        <div class="logo-left d-flex align-items-center">
            <!-- College Logo -->
            <a href="index.php">
                <img src="./images/logo.png" alt="Conference Logo" class="logo-top">
            </a>

            <!-- NEWS Logo -->
            <a href="index.php">
                <img src="./images/news-nobg.png" alt="NEWS Logo" class="logo-top" style="margin:0; max-width:150px">
            </a>
        </div>

        <!-- Center (Desktop only): Slogan -->
        <div class="header-text slogan-text d-none d-md-block text-center flex-grow-1">
            <h4 class="m-0">Shaping Tomorrow Through Knowledge</h4>
        </div>

        <!-- Right: Desktop = button, Mobile = ☰ -->
        <div class="upload-right d-flex align-items-center" style="display: flex; flex-direction: column;">
            <!-- Desktop only -->
            <a href="index.php#registration" class="upload-btn d-none d-md-inline-block">Register</a>
            <a href="login.php" class="upload-btn d-none d-md-inline-block">Login If Registered</a>

            <!-- Mobile only -->
            <button id="toggleSidebar" class="hamburger d-md-none ms-3" aria-label="Toggle Sidebar">
                <span id="hamburgerIcon">&#9776;</span>
            </button>
        </div>
    </div>

