<?php
$users = User::find_all();
$products = Product::find_all();



?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                        <ul class="dropdown-menu drop-menu-right" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>


                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>

                    <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Welcome to Ubold admin panel !</p>


                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="bar-widget">
                            <div class="table-box">
                                <div class="table-detail">
                                    <div class="iconbox bg-info">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>

                                <div class="table-detail">
                                    <h4 class="m-t-0 m-b-5"><b>Users</b></h4>
                                    <h5 class="text-muted m-b-0 m-t-0"><?php echo count($users); ?></h5>
                                </div>
                                <div class="table-detail text-right">
                                    <span data-plugin="peity-bar" data-colors="#34d3eb,#ebeff2" data-width="120" data-height="45">5,3,9,6,5,9,7,3,5,2,9,7,2,1</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="bar-widget">
                            <div class="table-box">
                                <div class="table-detail">
                                    <div class="iconbox bg-custom">
                                        <i class="icon-trophy"></i>
                                    </div>
                                </div>

                                <div class="table-detail">
                                    <h4 class="m-t-0 m-b-5"><b>Products</b></h4>
                                    <h5 class="text-muted m-b-0 m-t-0"><?php echo count($products); ?></h5>
                                </div>
                                <div class="table-detail text-right">
                                    <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="bar-widget">
                            <div class="table-box">
                                <div class="table-detail">
                                    <div class="iconbox bg-danger">
                                        <i class="icon-close"></i>
                                    </div>
                                </div>

                                <div class="table-detail">
                                    <h4 class="m-t-0 m-b-5"><b>Lost</b></h4>
                                    <h5 class="text-muted m-b-0 m-t-0">85 Deals</h5>
                                </div>
                                <div class="table-detail text-right">
                                    <span data-plugin="peity-donut" data-colors="#f05050,#ebeff2" data-width="50" data-height="45">1/5</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="text-dark header-title m-t-0">Deals Analytics</h4>
                        <div class="text-center">
                            <ul class="list-inline chart-detail-list">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #81c868;"></i>Deal - Won</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #ffbd4a;"></i>Deal - Lost</h5>
                                </li>
                            </ul>
                        </div>
                        <div id="morris-line-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /Portlet -->

                </div>

            </div>
            <!-- end row -->


            <div class="row">

                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="text-dark header-title m-t-0 m-b-30">Average time for deal</h4>
                        <div>
                            <div id="morris-bar-chart" style="height: 320px;"></div>
                        </div>
                    </div>
                </div>
                <!-- col -->

                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="text-dark header-title m-t-0 m-b-30">Sales by product group</h4>
                        <div class="text-center">
                            <ul class="list-inline chart-detail-list">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #ebeff2;"></i>Group 1</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Group 2</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Group 3</h5>
                                </li>
                            </ul>
                        </div>
                        <div id="donut-chart">
                            <div id="morris-donut-example" style="height: 274px;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->


            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-7">
                    <div class="card-box">
                        <h4 class="text-dark header-title m-t-0">Contacts</h4>
                        <p class="text-muted m-b-30 font-13">
                            Your awesome text goes here.
                        </p>

                        <div class="nicescroll" style="height: 300px;">
                            <div class="table-responsive">
                                <table class="table table-actions-bar">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>John deo</td>
                                        <td>Category one</td>
                                        <td>johndeo@dummy.com</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John deo</td>
                                        <td>Category one</td>
                                        <td>johndeo@dummy.com</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John deo</td>
                                        <td>Category one</td>
                                        <td>johndeo@dummy.com</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John deo</td>
                                        <td>Category one</td>
                                        <td>johndeo@dummy.com</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John deo</td>
                                        <td>Category one</td>
                                        <td>johndeo@dummy.com</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>John deo</td>
                                        <td>Category one</td>
                                        <td>johndeo@dummy.com</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>John deo</td>
                                        <td>Category one</td>
                                        <td>johndeo@dummy.com</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-5">
                    <div class="card-box">
                        <h4 class="text-dark header-title m-t-0">Activities</h4>
                        <p class="text-muted font-13">
                            Your awesome text goes here.
                        </p>

                        <div class="nicescroll p-20" style="height: 320px;">
                            <div class="timeline-2">
                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted"><small>5 minutes ago</small></div>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted"><small>30 minutes ago</small></div>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted"><small>59 minutes ago</small></div>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted"><small>5 minutes ago</small></div>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted"><small>30 minutes ago</small></div>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted"><small>59 minutes ago</small></div>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end col -->
            </div>



        </div> <!-- container -->

    </div> <!-- content -->


</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

