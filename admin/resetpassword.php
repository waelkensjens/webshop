<?php
include("includes/header.php");

if (!isset($_GET["code"])){
    redirect("page-404.php");
}

$code = $_GET["code"];
if (!Resetpassword::verify_code($code)){
    redirect("page-404.php");
}

$user_mail = Resetpassword::verify_mail_by_code($code);

$update = User::find_by_mail($user_mail->user_mail);
if (isset($_POST['update_password'])){
    if ($_POST['password1'] == $_POST['password2']) {
    $update->password = $_POST['password1'];
    $update->update();

    if ($update){
        Resetpassword::delete_code($code);
       redirect("login.php");
    }else{
        echo "something went wrong";
    }



    }
}
?>




<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Reset Password </h3>
        </div>

        <div class="panel-body">
            <form method="POST" class="form-horizontal" role="form">

                <div class="form-group">
                    <label for="password1" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password1"  placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password2" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password2" class="form-control"  placeholder="Retype Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox2" type="checkbox">
                            <label for="checkbox2">
                                Check me out !
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" name="update_password" class="btn btn-inverse btn-custom btn-rounded waves-effect waves-light">Update Password</button>

                    </div>
                </div>
            </form>
        </div>
    </div>


</div>



<?php
include("includes/footer.php");
?>