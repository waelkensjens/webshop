<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
$users = User::find_all();



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
                            <h3><i class="text-pink md md-account-child"></i> <?php echo count($users); ?></h3>
                            <h4 class="text-muted">Total users</h4>
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
                                            <th data-priority="1">Username</th>
                                            <th data-priority="1">street</th>
                                            <th data-priority="3">Number</th>
                                            <th data-priority="3">City</th>
                                            <th data-priority="6">Country</th>



                                        </tr>

                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($addresses as $address) :                ?>
                                            <tr>


                                                <td><?php echo $address->id; ?></td>
                                                <td><?php echo $address->username; ?></td>
                                                <td><?php echo $address->street ; ?></td>
                                                <td><?php echo $address->number; ?></td>
                                                <td><?php echo $address->city ; ?></td>
                                                <td><?php echo $address->country ; ?></td>

                                                <td><a class="btn btn-danger rounded-0" href="edit_user.php?id=<?php echo $address->id; ?>" ><i class=" ti-pencil-alt"></i></a></td>
                                                <td><a class="btn btn-danger rounded-0" href="delete_user.php?id=<?php echo $address->id; ?>" ><i class="ion-trash-a"></i></a></td>


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
?>