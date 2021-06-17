<?php 
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
        <title>Register</title>
        <!-- Bootstrap core CSS -->
        <link href="/application/frontend/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/application/frontend/css/sign-in.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-signin" method="post" action="/register/">
            
            <h1 class="h3 mb-3 font-weight-normal">Register a new account</h1>

            <span style="color:red;text-align:center;"><?php 
                include('../api/errors.php');
            ?></span>
            
            <label for="exampleInputEmail2">Email address</label>
            <input name="email" value="<?php echo $email; ?>" type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email" required/>

            <label for="exampleInputUsername">Username</label>
            <input name="username" value="<?php echo $username; ?>" type="text" class="form-control" id="exampleInputUsername" placeholder="Enter username" required/>

            <label for="exampleInputPhone">Phone number (optional)</label>
            <input name="phone" type="tel" class="form-control" id="exampleInputPhone" placeholder="Enter phone number"/>

            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required/>

            <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" required=""/>

            <label class="form-check-label" for="invalidCheck1">
                Agree to terms and conditions
            </label>
            <label for="inputEmail" class="sr-only">Email address</label>
            <label for="inputPassword" class="sr-only">Password</label>
            <button name="reg_user" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <p>
                Already a member? <a href="/login/">Sign in</a> </p>
            <p class="mt-5 mb-3 text-muted">© 2020</p>
        </form>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/application/frontend/js/jquery.min.js"></script>
        <script src="/application/frontend/js/popper.js"></script>
        <script src="/application/frontend/js/bootstrap.min.js"></script>
    </body>
</html>
