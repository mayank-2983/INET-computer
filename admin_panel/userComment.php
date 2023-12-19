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
                <h2 class="h4 pd-20">User Comments</h2>

                <table class="data-table table nowrap" id="table-user">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Comments</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $user = mysqli_query($con, "SELECT * FROM contact");
                        while ($row = mysqli_fetch_array($user)) {
                        ?>

                            <tr>

                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['comment'] ?></td>


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