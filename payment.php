<?php
    include ("dataBase.php");
    include ("functions.php");
    
    $query = "
        SELECT * FROM user
        WHERE user_id = '".$_SESSION["userId"]."'
    ";
    $result = $connection->query($query);   
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Conference Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">

<style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      color: #333;
    }

    .payment-container {
        max-width: 500px;
        margin: 60px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        padding: 40px;
        text-align: center;
    }

    .payment-container h2 {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .info-text {
        color: #555;
        font-size: 0.95rem;
        margin-bottom: 20px;
    }

    .btn-primary {
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 500;
    }

    .btn-outline-secondary {
        margin-top: 20px;
        border-radius: 25px;
    }
    form#payment-form .form-label {
        font-weight: 500;
        color: #444;
        margin-bottom: 6px;
    }

    form#payment-form .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px 15px;
        font-size: 0.95rem;
        transition: border-color 0.3s ease;
    }

    form#payment-form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
        outline: none;
    }

    form#payment-form .mb-3 {
        margin-bottom: 20px;
    }

    /* .payment-category{
        font
    } */
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
            <a href="index.php#registration">
                <img src="./images/logo.png" alt="Conference Logo" class="logo-top">
            </a>

            <!-- NEWS Logo -->
            <a href="index.php#registration">
                <img src="./images/news-nobg.png" alt="NEWS Logo" class="logo-top" style="margin:0; max-width:150px">
            </a>
        </div>
    </div>

    <?php
        $amount = convertData($_GET["amount"],'decrypt');
        $cat = convertData($_GET["cat"],'decrypt');
        if($amount == 700 || $amount == 900 || $amount == 1000 || $amount == 600 || $amount == 750 || $amount == 1){
    ?>
            <div class="payment-container">
                <h2>Register for Conference</h2>
                <?php
                    
                ?>
                <!-- User Input Form -->
                 
                <?php 
                    foreach($result as $row){
                ?>
                        <form id="payment-form" class="mt-4">
                            <div class="mb-3 text-start">
                                <label for="userName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $row['user_name']; ?>" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label for="userEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="userEmail" name="userEmail" value="<?php echo $row['user_email']; ?>" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label for="userContact" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="userContact" name="userContact" pattern="[0-9]{10}" value="<?php echo $row['phone_number']; ?>" required>
                            </div>
                        </form>
                <?php
                    }
                ?>

                <p class="info-text">Click below to make a secure payment</p>

                <h3>Amount: ₹<span id="payment-amount"> <?php echo $amount ?> </span></h3>
                <h5>Category: </h5><span id="payment-category" class="payment-category"> <?php echo $cat ?> </span>

                <button id="pay-button" class="btn btn-primary mt-4">Pay with Razorpay</button>

                <a href="index.php#registration" class="btn btn-outline-secondary d-block mt-4">Back to Home</a>
            </div>

            <!-- footer -->
            <footer class="bg-dark text-white text-center py-3">
                <p>&copy; <?php echo date('Y'); ?> BMSCE. All Rights Reserved.</p>
            </footer>
    <?php
        }
        else{
            header('Location:index.php#registration');
        }
    ?>

    <script>
        // Preloader
        window.addEventListener("load", function () {
            const preloader = document.getElementById("preloader");
            preloader.style.display = "none";
        });

        //razorpay
        document.getElementById("pay-button").onclick = function (e){
            e.preventDefault();

            const name = document.getElementById("userName").value.trim();
            const email = document.getElementById("userEmail").value.trim();
            const contact = document.getElementById("userContact").value.trim();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; //emial validator
            const phoneRegex = /^[6-9]\d{9}$/; //phone validator

            if (!name || !email || !contact) {
                alert("Please fill in all the fields before proceeding.");
                return;
            }

            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return;
            }

            if (!phoneRegex.test(contact)) {
                alert("Please enter a valid 10-digit mobile number.");
                return;
            }

            const amount = "<?php echo $amount; ?>";
            const finalAmountPaisa = parseInt(amount) * 100;

            const options = {
                key: "rzp_live_6KIcnyRadaDCv0", // Replace with your Razorpay Test Key
                amount: finalAmountPaisa,
                currency: "INR",
                name: "BMSCE",
                description: "Conference Registration",
                image: "./images/logo.png",
                handler: function (response) {
                    alert("✅ Payment Successful!\nPayment ID: " + response.razorpay_payment_id);

                    window.location.href = "paymentSuccess.php?cat=<?php echo $_GET["cat"]?>&amount=<?php echo $_GET["amount"]?>&mode=<?php echo $_GET["mode"]?>&pid=" + response.razorpay_payment_id; //Payment successful redirect
                },
                prefill: {
                    name: name,
                    email: email,
                    contact: contact
                },
                theme: {
                    color: "#007bff"
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();
            document.getElementById("pay-button").disabled = true;
            document.getElementById("pay-button").textContent = "Processing...";

        };
    </script>

</body>
</html>
