<?php 
    session_start(); 
    if(isset($_SESSION['username'])){header("Location: /dashboard/");}
    include('../api/server.php');
    ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/application/frontend/images/icon_black.png"> 
        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="/application/frontend/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/application/frontend/css/sign-in.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-signin" method="post" action="/login/">

            <?php include('../api/errors.php'); ?>
            
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <label for="inputUsername" class="sr-only">Username</label>
            <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login_user">Sign in</button>

            <p>
                Not yet a member? <a href="/register/">Sign up</a>
            </p>
            <p class="mt-5 mb-3 text-muted">&copy; 2020</p>

        </form>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/application/frontend/js/jquery.min.js"></script>
        <script src="/application/frontend/js/popper.js"></script>
        <script src="/application/frontend/js/bootstrap.min.js"></script>
    </body>
</html>
