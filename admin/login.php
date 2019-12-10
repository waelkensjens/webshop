<?php require_once("includes/header.php");

$the_message = '';


if($session->is_signed_in()) {
    redirect("index.php");
}

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);



    //methode check database als de user bestaat
    $user_found = User::verify_user($username, $password);

    if($user_found){

        $session->login($user_found);
        $session->is_admin($user_found);
        redirect("index.php");







    }else{
        $the_message = "INCORRECT username/mail and or password!";
    }
}else{
    $username = "";
    $user_mail= "";
    $password = "";
}








?>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Sign In to <strong class="text-custom">Gamerz<i class="md md-gamepad"></i></strong> </h3>
        </div>
        <h5 class="bg-danger">  <?php echo $the_message; ?> </h5>

        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="" method="POST">

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input type="text" class="form-control form-control-user" name="username" id="username" value="<?php echo htmlentities($username) ;?>" aria-describedby="emailHelp" placeholder="Enter username or mail...">

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password" class="form-control form-control-user" name="password" id="password" value="<?php echo htmlentities($password);?>" placeholder="Password">

                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button  type="submit" name="submit" value="Login" class="btn btn-pink btn-block  waves-effect waves-light">Log In</button>

                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="page-recoverpw.php" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>


</div>



    <?php require_once("includes/footer.php");?>

