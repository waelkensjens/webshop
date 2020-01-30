<?php
include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}

/*functie om user weg te schrijven naar de database */
$user = new User();  // hier creer je variabele user om een nieuwe user weg te schrijven naar database

//hier start de functie door op submit knop te drukken tussen de rechte haken ['name van de button']
if (isset($_POST['submit'])) {
    if ($user) {
        $user->username = $_POST['username'];/*hier start je dus met new user->naam van de kolom in de db = de post van de naam in u form tussen rechte haken       */
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->user_mail = $_POST['user_mail'];
        $user->password = $_POST['password'];
        $user->role_id = $_POST['role_id'];

        $user->set_file($_FILES['user_image']);  /*dit is voor de image gaat hij eerst naar een andere functie om te controleren op dubbels enz..*/
        $user->save_user_and_image(); /*hier slaat hij de user op in de db dmv functie in User.php*/
    }
}
//$users = user::find_all();


include("includes/sidebarcheck.php");
include("includes/content-top.php");

?>



    <div class="content-page">
    <div class="content">
        <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Add User</b></h4>
                <p class="text-muted font-13 m-b-30">
                    Create New User
                </p>

                <form method="POST" data-parsley-validate novalidate enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">User Name*</label>
                        <input type="text" name="username" parsley-trigger="change" required placeholder="Enter user name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name*</label>
                        <input type="text" name="first_name" parsley-trigger="change" required placeholder="Enter user name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name*</label>
                        <input type="text" name="last_name" parsley-trigger="change" required placeholder="Enter user name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="user_mail">Email address*</label>
                        <input type="email" name="user_mail" parsley-trigger="change" required placeholder="Enter email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password*</label>
                        <input name="password" type="password" placeholder="Password" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role Id*</label>
                        <input type="text" name="role_id" parsley-trigger="change" required placeholder="Enter Role Id" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="user_image">User Image</label>
                        <input type="file" name="user_image" class="form-control">
                    </div>



                    <div class="form-group text-right m-b-0">
                        <input type="submit" name="submit" value="Add User" class="btn btn-primary">

                    </div>

                </form>
            </div>
        </div>


    </div>
        </div>
    </div>
    </div>

<?php
include ("includes/footer.php");

?>}