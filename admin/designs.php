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

                                                    <div class="col-sm-2 align-self-end">
                                                        <div class="mt-3">
                                                            <button type="submit" id="newDesignSaveBtn" name="saveBtn" class="btn btn-primary font-weight-bold">Save Design</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="mt-5">
                                                <div class="row">                                                            
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs col-6"  role="tablist">
                                                        <li class="nav-item">
                                                            <a href="#designs" data="default" data-toggle="tab" aria-expanded="false" class="nav-link active font-weight-bold design-tab">Designs</a>
                                                        </li>
                                                        <li class="" >
                                                            <a href="#customDesigns" data="custom" data-toggle="tab" aria-expanded="false" class="nav-link font-weight-bold design-tab">Custom</a>
                                                        </li>
                                                    </ul>
                                                    <p class="woocommerce-result-count col-3 my-auto text-right">Showing <span id="custom-counts" class="d-none"></span><span id="design-counts"></span> of <span id="total-counts"></span> results</p>
                                                    <input type="text" placeholder="Search" name="designSearchText" id="designSearchText" class="col-3 designSearchText form-control" />
                                                </div>

                                                <!-- Tab panes -->
                                                <div class="tab-content text-muted mt-3">
                                                    <div class="tab-pane active" id="designs">
                                                        <ul class="row" id="designsList">
                                                        </ul>                        
                                                    </div>
                                                    
                                                    <div class="tab-pane mt-3" id="customDesigns">   
                                                        <ul class="row" id="customDesignsList">
                                                        </ul>      
                                                    </div>                                            
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