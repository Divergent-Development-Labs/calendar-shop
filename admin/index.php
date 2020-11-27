<?php 
    session_start();
    if(isset($_SESSION["username"]) && ($_SESSION["username"] == 'Admin')){
        header('Location: dashboard.php');
    }
?>
<!Doctype html>
<html>
    <head>  
        <title>Login | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <body>
        <!-- <div class="home-btn d-none d-sm-block">
            <a href="index.php" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div> -->
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.php">
                                        <div class="avatar-lg h-auto mb-4 profile-user-wid w-lg">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.png" alt="" class="rounded-circle w-100" height="90">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" id="loginForm" action="backend/login-backend.php" method="post">        
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password" required>
                                        </div>
                                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="loginBtn">Log In</button>
                                        </div>
                                        <?php 
                                            if(isset($_SESSION["msg"])) {
                                                ?>
                                                <div class="alert alert-danger mt-2"><i class="fa fa-warning mr-2"></i><?php  echo $_SESSION["msg"]; unset($_SESSION["msg"]); ?></div>
                                                <?php 
                                                
                                                } 
                                        ?>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>                            
                                <p>© 2020 Calendar Shop. <a href="https://kvncloud.com/" target="_blank" style="color: #74788d;" >Developed by KVN Cloud</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>