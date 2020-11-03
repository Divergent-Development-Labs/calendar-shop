<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php';  ?>

<!Doctype html>
<html>
    <head>
        <title>Orders | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Orders</h4>
                                    <a  href="new-order.php" type="button" class="btn btn-success font-weight-bold"><i class="fas fa-plus mr-1"></i> Add Order</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                
                                        <!-- <table id="dz" class="table table-bordered dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                                        <table id="dz" class="table table-hover table-bordered dt-responsive display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr >
                                                    <!-- <th><input id="all_ids" type="checkbox" name="all_ids" value="" class="myCustomCheckBox all_ids font-warning" /></th> -->
                                                    <th>Id</th>
                                                    <th>Customer Name</th>
                                                    <th>subtotal</th>
                                                    <th>gst</th>
                                                    <th>Total Amount</th>
                                                    <th>Order Date</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>                
                                            <tbody id="tBody">
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->        

                    <?php include 'footer.php'; ?>

        <!-- sample modal content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Are you sure to Delete the Record ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <div class="modal-body">
                        <h5>Are you sure to Delete the Record</h5>
                    </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No, Cancel!</button>
                        <a type="button" id="yes-delete-record-btn" class="btn btn-success waves-effect waves-light">Yes, Delete it!</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <script src="custom/js/orders-table.js"></script>
        <script src="custom/js/general.js"></script>
        <?php include 'datatables.php' ?>
    </body>
</html>