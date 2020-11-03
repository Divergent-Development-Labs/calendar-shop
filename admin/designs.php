<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php';  ?>

<!Doctype html>
<html>
    <head>
        <title>Designs | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box align-items-center">
                                    <h4 class="mb-0 font-size-18">Designs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="" id="all-order" role="">
                                                
                                            <form  class="custom-validation" id="newDesignForm" method="post" action="backend/insert-new-design.php">
                                                <div class="row">                                                        
                                                    <div class="col-sm-4">
                                                        <div class="form-group mt-3 mb-0">
                                                            <label>Name :</label>
                                                            <input type="text" name="newDesignName" id="newDesignName" class="form-control" required placeholder="Enter Design Name"/>
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group mt-3 mb-0">
                                                            <label>Link :</label>
                                                            <input type="text" name="newDesignLink" class="form-control" required  placeholder="Enter Design Link"/>
                                                        </div>
                                                    </div>

                                                    <div class=" col-sm-2 align-self-end">
                                                        <div class="mt-3">
                                                            <button type="submit" id="newDesignSaveBtn" name="saveBtn" class="btn btn-primary font-weight-bold">Save Design</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="mt-5">
                                                <div>
                                                    <!-- <select id="designCount" class="form-control">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="all">All</option>
                                                    </select> -->
                                                    <input type="text" placeholder="Search" name="designSearchText" id="designSearchText" class="col-4 designSearchText form-control" />
                                                </div>
                                                <div id="designsList" class="row mt-3">

                                                </div>
                                            </div>        
                                        </div>
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
                        <h5 class="modal-title mt-0" id="myModalLabel">Are you sure to Delete the Design ?</h5>
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


        <script src="custom/js/designs.js"></script>
        <script src="custom/js/general.js"></script>
        <?php include 'datatables.php' ?>
    </body>
</html>