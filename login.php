<?php
include_once ('includes/header.php');
include("../Webshop/includes/content-top.php");
$the_message = '';


if(isset($_POST['login-submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    /*Methode check de db of de user bestaat*/
    $user_found = User::verify_user($username, $password);

    if($user_found){
        $session->login ($user_found);
        //$msg = 'ingelogd'   ;


        //echo "<script type='text/javascript'>alert('$msg');</script>";
        echo "<script type='text/javascript'> document.location = 'shop.php'; </script>";

    }else{
        $the_message = "Your password of username FAILED";

    }
}else{
    $username = "";
    $password = "";
}
?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container mt_30">
        <div class="col-sm-8 col-lg-9 mtb_20">
            <!-- contact  -->
            <div class="row">
                <div class="col-md-12 col-md-offset-3">
                    <div class="panel-login panel">
                        <div class="panel-heading">
                            <div class="row mb_20">
                                <div class="col-xs-12 text-center">
                                    <a href="#"  id="login-form-link">Login</a>
                                </div>

                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="bg-danger">  <?php echo $the_message; ?> </h5>
                                    <!--login-->
                                    <form id="login-form" action="" method="POST">

                                        <div class="form-group">
                                            <input type="text" name="username" id="username1" tabindex="1" class="form-control" placeholder="Enter username or email..." value="<?php echo htmlentities($username) ;?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Enter Password..." value="<?php echo htmlentities($password);?>">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Single Blog  -->
  <!-- End Blog   -->
  <!-- =====  CONTAINER END  ===== -->
<?php include("./includes/footer.php"); ?>