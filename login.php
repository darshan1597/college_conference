<?php

    include("dataBase.php");
    include("functions.php");
    $msg = '';

	if(isset($_POST["loginBtn"])){
		$formdata = array();

		if(empty($_POST["loginID"])){
			$msg .= '<li>Email Address is required</li>';
		}
		else{
			if(!filter_var(trim($_POST["loginID"]), FILTER_VALIDATE_EMAIL)){
				$msg .= '<li>Invalid Email Address</li>';
			}
			else{
				$formdata['loginID'] = $_POST['loginID'];
			}
		}

		if(empty($_POST['loginPassword'])){
			$msg .= '<li>Password is Required</li>';
		}
		else{
			$formdata['loginPassword'] = $_POST['loginPassword'];
		}

        if($msg == ''){
            $data = array(
                ':loginID' => $formdata['loginID']
            );
            $query = "
			SELECT * FROM user 
			WHERE user_email = :loginID
			";

            $statement = $connection->prepare($query);
            $statement->execute($data);

            if($statement->rowCount() > 0){
                foreach($statement->fetchAll() as $row){
                    if($row['password'] == $formdata['loginPassword']){
                        $_SESSION['userId']         = $row['user_id'];
                        $_SESSION['userName']       = $row['user_name'];
                        $_SESSION['userEmail']      = $row['user_email'];
                        $_SESSION['userId']         = $row['user_id'];
                        $_SESSION['phoneNum']       = $row['phone_number'];
                        if ($row['payment_status'] === 'paid') {
                            if($row['form_status'] === 'submitted'){
                                header("Location: userProfile.php");
                            }
                            if($row['form_status'] != 'submitted'){
                                header("Location: https://docs.google.com/forms/d/e/1FAIpQLSexTRjCTC-fdhtfflRmWEMNv4g05KPwXNmNF4vxptlpm_OEoQ/viewform?pid=" . $_GET['pid']);
                            }
                        }
                        else {
                            header('location:index.php#registration');
                        }
                    }
                    else{
                        $msg = '<li>Incorrect Password</li>';
                    }
                }
			}
            else{
                $msg = '<li>Email Address not Registered</li>';
            }
		}
		else{
			$msg = '<li>Invalid Email Address</li>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f8;
    }

    .auth-wrapper {
        max-width: 500px;
        margin: 60px auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        padding: 40px;
    }

    .toggle-btns {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }

    .toggle-btns button {
        width: 100%;
        padding: 10px;
        font-weight: 500;
        border-radius: 25px;
    }

    .form-label {
        font-weight: 500;
        color: #444;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px 15px;
        font-size: 0.95rem;
    }

    .btn-primary {
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 500;
        margin-top: 15px;
    }

    .btn-outline-primary1{
        border: 1px solid #007bff;
        color: #007bff;
    }

    .btn-outline-primary1:hover{
        background-color: #007bff;
        color:rgb(255, 255, 255);
    }

    .center{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .alert-danger{
        margin-top: 10px;
        padding: 0px 50px 0px 50px;
        margin-bottom: 10px;
        padding-top: 10px;
        border-radius: 50px;
        background-color:rgb(252, 92, 92);
        font-weight: bold;
    }
    </style>
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
    <div class="top-header bg-light">
        <div class="logo-left">
            <!-- College Logo -->
            <a href="index.php">
                <img src="./images/logo.png" alt="Conference Logo" class="logo-top">
            </a>

            <!-- NEWS Logo -->
            <a href="index.php">
                <img src="./images/news-nobg.png" alt="NEWS Logo" class="logo-top" style="margin:0; max-width:150px">
            </a>
        </div>

        <div class="upload-right d-flex align-items-center" style="display: flex; flex-direction: column;">
            <!-- Desktop only -->
            <a href="index.php#registration" class="upload-btn d-none d-md-inline-block">Register</a>
        </div>
    </div>

    <div class="auth-wrapper">
        <div class="toggle-btns">
            <button id="show-login" class="btn btn-outline-primary1">Login</button>
        </div>

        <?php 
            if($msg != ''){
                echo '
                    <div class="center">
                        <div class="alert alert-dismissible fade show alert-danger" role="alert">
                        <ul class="list-unstyled">'.$msg.'</ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                ';
            }
        ?>

        <!-- Login Form -->
        <div id="login-section" class="form-section">
            <h4 class="mb-3 text-primary ">Login</h4>
            <form id="login-form" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email or Phone</label>
                    <input type="text" class="form-control" name="loginID" id="loginID" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="loginPassword" id="loginPassword" required>
                </div>
                <input type="submit" name="loginBtn" class="btn btn-primary w-100" value="Login">
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> BMSCE. All Rights Reserved.</p>
    </footer>

    <script>
        // Preloader
        window.addEventListener("load", function () {
            const preloader = document.getElementById("preloader");
            preloader.style.display = "none";
        });
    </script>
    <script src="asset/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="asset/js/scripts.js"></script>
    <script src="asset/js/simple-datatables@latest.js" crossorigin="anonymous"></script>
    <script src="asset/js/datatables-simple-demo.js"></script>


</body>
</html>