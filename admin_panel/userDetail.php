<?php include("connect.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendors/styles/style.css">
    <!-- Site favicon -->
    <title>Inet Computer Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon/favicon-16x16.png" />
    <link rel="manifest" href="vendors/images/favicon/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

</head>

<body>
    <?php
    //   include headers 
    include("header.php");
    ?>

    <div class="main-container">
        <div class="pd-ltr-20">


            <div class="card-box mb-30">
                <h2 class="h4 pd-20">User Detail</h2>
                <div class="d-flex justify-content-end align-items-center mb-3 px-3">

                    <div class="add-search">
                        <!-- <form> -->
                        <div class="form-group mb-0 position-relative">
                            <i class="dw dw-search2 search-icon"></i>
                            <input type="text" class="form-control search-input" id="user-search" placeholder="Search Here" autocomplete="off">
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
                <table class="data-table table nowrap" id="table-user">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>First Name</th>
                            <th class="no-mobile">Last Name</th>
                            <th>EmailAddress</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $user = mysqli_query($con, "SELECT * FROM user");
                        while ($row = mysqli_fetch_array($user)) {
                        ?>

                            <tr>

                                <td><?= $row['UserName'] ?></td>
                                <td><?= $row['FirstName'] ?></td>
                                <td class="no-mobile"><?= $row['LastName'] ?></td>
                                <td><?= $row['EmailAddress'] ?></td>


                            </tr>

                        <?php
                        }

                        ?>


                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
<script type="text/javascript">
    $(document).ready(function() {


        // live search 
        $("#user-search").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "user-search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-user").html(data);
                }
            });
        });
    });
</script>

</html>