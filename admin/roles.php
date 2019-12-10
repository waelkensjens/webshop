<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
$role= Role::find_by_role_id($_SESSION['role_id']);
if ($role->rolename=='admin'){
    include ("./includes/sidebar-left.php");

$roles = role::find_all();


include("includes/sidebarcheck.php");
include("includes/content-top.php");

?>

    <div class="content-page">
        <!-- Start content -->
        <div class="content">



            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="widget-inline-box text-center">
                            <h3><i class="text-pink md md-account-child"></i> <?php echo count($roles); ?></h3>
                            <h4 class="text-muted">Total roles</h4>
                        </div>


                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table  table-striped">
                                        <thead>
                                        <tr>

                                            <th data-priority="1">#</th>
                                            <th   data-priority="1">rolename</th>



                                        </tr>

                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($roles as $role) :                ?>
                                            <tr>


                                                <td><?php echo $role->role_id; ?></td>


                                                <td><?php echo $role->rolename; ?></td>


                                            </tr>
                                        <?php endforeach;  ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->



    </div>








<?php
include("includes/footer.php");
}else{
   redirect("page-404.php");
}
?>