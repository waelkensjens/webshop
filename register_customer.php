<?php include_once ("./includes/header.php");?>
<?php include ("../Webshop/includes/content-top.php") ?>

<?php
$the_message = '';


if(isset($_POST['submit'])){
    $new_user = new User();
    $new_address = new Address();

    $address = array();
    $user = array();

    $new_user->username = $_POST['username'];
    $new_user->password = $_POST['password'];
    $new_user->first_name = $_POST['first_name'];
    $new_user->last_name = $_POST['last_name'];
    $new_user->role_id = 4 ;
    $new_user->user_mail = $_POST['mail'];

    $new_address->address = $_POST['street'];
    $new_address->postal= $_POST['postal'];
    $new_address->city= $_POST['city'];
    $new_address->country= $_POST['country'];




    if($new_user->user_exist()) {
        $new_user->set_file($_FILES['file']);
        $new_user->save_user_and_image();

         $new_address->user_id = $new_user->id;
        $new_address = $new_address->item_exist();
        if(empty($new_address->id)){
            $new_address->save_address();
        }
       // $msg = 'Geslaagd u kan zich nu aanmelden met dit account'   ;

        echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        //echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    else{
        $msg = 'Username or e-mail already in use';
        echo "<script type='text/javascript'>alert('$msg');</script>";

    }
}
?>

    <div class="container mt_30">


        <div class="col-sm-8 col-lg-9 mtb_20">
          <!-- contact  -->
          <div class="row">
            <div class="col-md-12 col-md-offset-3">
              <div class="panel-login panel">
                <div class="panel-heading">
                  <div class="row mb_20">
                    <div class="col-xs-12 text-center">
                      <a href="#"  id="Register-form-link">Register</a>
                    </div>

                  </div>
                  <hr>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                        <h5 class="bg-danger">  <?php echo $the_message; ?> </h5>
                                <!--Register-->
                      <form  action="#" method="post" data-parsley-validate novalidate enctype="multipart/form-data">
                          <div class="form-group col-sm-12">
                              <label for="username"></label>
                              <input type="text" name="username" class="form-control" placeholder="Username" value="">
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="mail"></label>
                              <input type="email" name="mail"   class="form-control" placeholder="Email Address" value="">
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="password"></label>
                              <input type="password" name="password"  class="form-control" placeholder="Password">
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="confirm-password"></label>
                              <input type="password" name="confirm-password"   class="form-control" placeholder="Confirm Password">
                          </div>
                          <div class="form-group col-sm-6">
                              <label for="first_name"></label>
                              <input type="text" name="first_name"   class="form-control " placeholder="First Name" value="">
                          </div>
                          <div class="form-group col-sm-6">
                              <label for="last_name"></label>
                              <input type="text" name="last_name"  class="form-control " placeholder="Last Name" value="">
                          </div>
                          <div class="form-group col-sm-7">
                              <label for="country"></label>
                              <input type="text" name="country"   class="form-control" placeholder="Country" value="">
                          </div>
                          <div class="form-group col-sm-7">
                              <label for="city"></label>
                              <input type="text" name="city"   class="form-control" placeholder="City" value="">
                          </div>
                          <div class="form-group col-sm-5">
                              <label for="postal"></label>
                              <input type="text" name="postal"   class="form-control" placeholder="Postal" value="">
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="street"></label>
                              <input type="text" name="street"  class="form-control" placeholder="Street + number" value="">
                          </div>
                          <div class="form-group">
                              <label for="file"></label>
                              <input type="file" name="file"   class="form-control" placeholder="Profile Image" value="">
                          </div>
                         <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-6 col-sm-offset-3">
                                      <button type="submit" name="submit"   class="form-control btn btn-register" value="Register Now">Register Now
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
<?php include_once ("./includes/footer.php");?>