<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inet Conputer | 404 </title>

    <!-- Site favicon -->
    <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="img/favicon/apple-touch-icon.png"
  />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="img/favicon/favicon-32x32.png"
  />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="img/favicon/favicon-16x16.png"
  />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        div.container{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
    </style>
</head>

<body >
    <div class="container">
        <div class="row">
            <div class="col-sm-6 d-flex flex-column justify-content-center">
                <img src="img/404-error.avif" alt="" height="auto" max-width="100%">
            </div>
            <div class="col-sm-6 d-flex flex-column justify-content-center">
                <h4 class="mb-3">Error Code: <span class="text-primary">404</span></h4>
                <h1 class="mb-4">Looks Like you're Lost</h1>
                <p>Sorry buddy but the page you're trying to open dosen't exist here may be you go to space and then it become visible.</p>
                <button class="btn btn-primary rounded mt-3" onclick="goBack()">Go Back to Home Page</button>
            </div>
        </div>
    </div>

    <script>
        function goBack(){
            window.history.back();
        }
    </script>
</body>

</html>