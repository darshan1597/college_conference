<?php

    include("dataBase.php");
    include("functions.php");

    $encryptedAmount = isset($_GET['amount']);
    $decryptedAmount = convertData($_GET["amount"],'decrypt');
    $mode = isset($_GET['mode']);
    $cat = $_GET["cat"];
    $message = '';

	if(isset($_POST['regBtn'])){
		$formData = array();

		if(empty($_POST["userEmail"])){
			$message .= '<li>Email Address is required</li>';
		}
		else{
			if(!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)){
				$message .= '<li>Invalid Email Address</li>';
			}
			else{
				$formData['userEmail'] = $_POST['userEmail'];
			}
		}

		if(empty($_POST['userName'])){
			$message .= '<li>user Name is Required</li>';
		}
		else{
			$formData['userName'] = $_POST['userName'];
		}

		if(empty($_POST['phoneNum'])){
			$message .= '<li>Phone number is required</li>';
		}
		else{
			$formData['phoneNum'] = $_POST['phoneNum'];
		}

		if(empty($_POST['password'])){
			$message .= '<li>Password is Required</li>';
		}
		else{
			$formData['password'] = $_POST['password'];
		}

		if($message == ''){
			$data = array(
				':userEmail' => $formData['userEmail'],
                ':phoneNum'     => $formData['phoneNum']
			);

			$query = "
				SELECT user_name FROM user 
				WHERE user_email = :userEmail
                OR phone_number = :phoneNum
			";

			$statement = $connection->prepare($query);
			$statement->execute($data);

			if($statement->rowCount() > 0){
				$message = '<li>User Already Exist</li>';
			}	
			else{
                $data = array(
                    ':userEmail'			=>	$formData['userEmail'],
                    ':userName'			    =>	$formData['userName'],
                    ':phoneNum'			    =>	$formData['phoneNum'],
                    ':password'	            =>	$formData['password'],
                );

                $query = "
                    INSERT INTO user 
                    (user_email, password, user_name, phone_number) 
                    VALUES (:userEmail, :password, :userName, :phoneNum)
			    ";

                $statement = $connection->prepare($query);
                $statement->execute($data);
                
                $redirectAmt = $_GET["amount"];
                $redirectMode = $_GET["mode"];
                $redirectCat = $_GET["cat"];
                header('location:register.php?login=1&amount='.$redirectAmt.'&mode='.$redirectMode.'&cat='.$cat.'');
            }
		}
	}

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
                    if(isset($_GET["amount"]) && isset($_GET["mode"]) && isset($_GET["cat"])){
                        $redirectAmt = $_GET["amount"];
                        $redirectMode = $_GET["mode"];
                        $redirectCat = $_GET["cat"];
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
                                header('location:payment.php?amount='.$redirectAmt.'&mode='.$redirectMode.'&cat='.$redirectCat.'');
                            }
                        }
                        else{
                            $msg = '<li>Incorrect Password</li>';
                        }
                    }
                }
			}
		}
		else{
			$msg = '<li>Wrong Email Address</li>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register</title>
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
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .toggle-btns button {
        width: 48%;
        padding: 10px;
        font-weight: 500;
        border-radius: 25px;
    }

    .form-section {
        display: none;
    }

    .form-section.active {
        display: block;
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
            <a href="index.php"><img src="./images/logo.png" alt="Conference Logo" class="logo-top"></a>
        </div>
    </div>

    <div class="auth-wrapper">        
        <div class="toggle-btns">
            <button id="show-login" class="btn btn-outline-primary1">Login</button>
            <button id="show-register" class="btn btn-primary">Register</button>
        </div>
        

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

        <!-- Register Form -->
        <div id="register-section" class="form-section active">
            <h4 class="mb-3 text-primary">Create Account</h4>
            <form id="register-form" method="POST">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="userName" id="userName" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="userEmail" id="userEmail" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phoneNum" id="phoneNum" pattern="[0-9]{10}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" value="<?php echo convertData($cat, "decrypt"); ?>" style="cursor: not-allowed;" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="text" class="form-control" value="<?php echo $decryptedAmount; ?>" style="cursor: not-allowed;" readonly>
                </div>
                <input type="submit" name="regBtn" class="btn btn-primary w-100" value="Register">
            </form>
        </div>

        <!-- Login Form -->
        <div id="login-section" class="form-section">
            <h4 class="mb-3 text-primary ">Login</h4>
            <form id="login-form" method="POST">
                <div class="mb-3">
                    <input type="hidden" name="amount" id="amount" value="<?php echo $encryptedAmount; ?>">
                    <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>">
                    <input type="hidden" name="cat" id="cat" value="<?php echo $cat; ?>">
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

            // Auto-switch to login tab if redirected from successful register
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get("login") === "1") {
                showLogin.classList.replace('btn-outline-primary1', 'btn-primary');
                showRegister.classList.replace('btn-primary', 'btn-outline-primary1');
                loginSection.classList.add('active');
                registerSection.classList.remove('active');
            }
        });

        // Tab toggle styling
        const showLogin = document.getElementById('show-login');
        const showRegister = document.getElementById('show-register');
        const loginSection = document.getElementById('login-section');
        const registerSection = document.getElementById('register-section');

        showLogin.addEventListener('click', () => {
            showLogin.classList.replace('btn-outline-primary1', 'btn-primary');
            showRegister.classList.replace('btn-primary', 'btn-outline-primary1');
            loginSection.classList.add('active');
            registerSection.classList.remove('active');
        });

        showRegister.addEventListener('click', () => {
            showRegister.classList.replace('btn-outline-primary1', 'btn-primary');
            showLogin.classList.replace('btn-primary', 'btn-outline-primary1');
            registerSection.classList.add('active');
            loginSection.classList.remove('active');
        });
    </script>
    <script src="asset/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="asset/js/scripts.js"></script>
    <script src="asset/js/simple-datatables@latest.js" crossorigin="anonymous"></script>
    <script src="asset/js/datatables-simple-demo.js"></script>


</body>
</html>