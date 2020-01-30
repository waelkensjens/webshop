<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
$addresses = Address::find_all();




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
                            <h3><i class="text-pink md md-account-child"></i> <?php echo count($addresses); ?></h3>
                            <h4 class="text-muted">Total addresses</h4>
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
                                            <th data-priority="1">address</th>
                                            <th data-priority="1">postal</th>
                                            <th data-priority="3">City</th>
                                            <th data-priority="6">Country</th>
                                            <th data-priority="6">User</th>



                                        </tr>

                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($addresses as $address) :
                                            $user = User::find_by_id($address->user_id);
                                        ?>
                                            <tr>


                                                <td><?php echo $address->address_id; ?></td>
                                                <td><?php echo $address->address; ?></td>
                                                <td><?php echo $address->postal; ?></td>
                                                <td><?php echo $address->city ; ?></td>
                                                <td><?php echo $address->country ; ?></td>



                                                <td><?php echo $user->username ; ?></td>

                                                <td><a class="btn btn-danger rounded-0" href="edit_user.php?id=<?php echo $address->address_id; ?>" ><i class=" ti-pencil-alt"></i></a></td>
                                                <td><a class="btn btn-danger rounded-0" href="delete_user.php?id=<?php echo $address->address_id; ?>" ><i class="ion-trash-a"></i></a></td>


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