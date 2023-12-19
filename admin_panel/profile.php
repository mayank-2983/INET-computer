

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        body {
            background: linear-gradient(#e66465, #9198e5);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: rgb(101, 173, 236)
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 13px;
            font-weight: 500;
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: transparent !important;
            opacity: 1;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .ImgContainer {
            display: flex;
            align-items: center;
        }

        @media screen and (max-width : 567px) {
            .container {
                margin: 0 !important;
            }
        }
    </style>
</head>

<body>
    <?php
        include "connect.php";
		include "header.php";
	
	$id = $_SESSION['admin'];
	$query = "SELECT * FROM `admin` WHERE `id` = '$id'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
    ?>
    <div class="main-container">
			<div class="pd-ltr-20">
    <div class="card-box mb-30">
				
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold"><?= $row["UserName"]?></span>
                        <span class="text-black-50"><?= $row["Email"]?></span>
                        <span class="mt-4"
                            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: red;">(
                            Inet Computer Admin )</span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control" name="FirstName" value="<?= $row["First_Name"]?>" id="FirstName"
                                    placeholder="First Name" disabled required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Last Name</label>
                                <input type="text" class="form-control" name="LastName" value="<?= $row["Last_Name"]?>" id="LastName"
                                    placeholder="Last Name" disabled required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Mobile Number</label>
                                <input type="number" class="form-control" name="MobileNo" value="<?= $row["Phone_no"]?>" id="MobileNo"
                                    placeholder="Enter Mobile Number" disabled required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels">Address</label>
                                <input type="text" class="form-control" disabled name="Address" value="<?= $row["Address"]?>" id="Address"
                                    placeholder="Enter Address" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels">Email ID</label>
                                <input type="text" class="form-control" disabled name="Email" value="<?= $row["Email"]?>" id="Email"
                                    placeholder="Enter Email" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels">Country</label>
                                <?php
                                    $c_id = $row['Country_id'];
                                    $country = mysqli_query($con,"SELECT * FROM `countries` WHERE `id`='$c_id'");
                                    $carr = mysqli_fetch_array($country);
                                ?>
                                <input type="text" class="form-control" id="crt-ctr" disabled value="<?= $carr['name'] ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">State/Region</label>
                                <?php
                                        $s_id = $row['State_id'];
                                        $states = mysqli_query($con,"SELECT * FROM `states` WHERE `id`='$s_id'");
                                        $sarr = mysqli_fetch_array($states);
                                    ?>
                                <input type="text" class="form-control" id="crt-st" disabled value="<?= $sarr['name'] ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="labels">City</label>
                                <?php
                                    $city_id = $row['City_id'];
                                    $city_sql = mysqli_query($con,"SELECT * FROM `cities` WHERE `id`='$city_id'");
                                    $city = mysqli_fetch_array($city_sql);
                                ?>
                                <input type="text" class="form-control" id="crt-city" disabled value="<?= $city['name'] ?>">
                                    
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 ImgContainer">
                    <div class="p-3 py-5">
                        <img src="./vendors/images/adminProfileDashboard.jpg" alt="Admin Image" style="height: 100%;width: 100%;">
                    </div>
                </div>
            </div>
        </form>
    </div>
            </div>
    </div>
    
</body>
</html>