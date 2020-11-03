<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php';  ?>

<!Doctype html>
<html>
    <head>
        <title>Sizes | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Sizes</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                
                                    <div class="" id="all-order" role="">
                                                <form method="post" action="backend/insert-size.php">
                                                    <div class="row">                                                        
                                                        <div class="col-xl col-sm-6">
                                                            <div class="form-group mt-3 mb-0">
                                                                <label>Width :</label>
                                                                <input type="number" min="0" class="form-control" id="newSizeWidth" name="newSizeWidth" placeholder="Enter Width" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl col-sm-6">
                                                            <div class="form-group mt-3 mb-0">
                                                                <label>Height :</label>
                                                                <input type="number" min="0" class="form-control" id="newSizeHeight" name="newSizeHeight" placeholder="Enter Height" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl col-sm-6">
                                                            <div class="form-group mt-3 mb-0">
                                                                <label>Label :</label>
                                                                <input type="text" class="form-control " readonly id="newSizeLabel" name="newSizeLabel" placeholder="Size Label" required>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl col-sm-6">
                                                            <div class="form-group mt-3 mb-0">
                                                                <label>Rate :</label>
                                                                <input type="number" min="0" class="form-control" id="newSizeRate" name="newSizeRate" placeholder="Enter Rate" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-xl col-sm-6 align-self-end">
                                                            <div class="mt-3">
                                                                <button type="submit" id="newSizeSaveBtn" name="newSizeSaveBtn" class="btn btn-primary font-weight-bold w-md">Add Size</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class=" mt-5">
                                                    <table id="dz" class="text-center table table-hover table-bordered dt-responsive display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr class="">
                                                                <th>Id</th>
                                                                <th>Size Label</th>
                                                                <th>Rate</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                            
                                                        <tbody>
                                                            <?php 
                                                                $sql = "SELECT * FROM `size`";    
                                                                $project = $conn->prepare($sql);                                                
                                                                $project->execute();                                                
                                                                $result = $project->get_result();
                                                        
                                                                if($result->num_rows > 0){
                                                                    while ($row = $result->fetch_assoc()) { 
                                                                
                                                                        echo '<tr>';  
                                                                        foreach ($row as $key => $value) { 
                                                                            if($key == 'id'){
                                                                                $record_id = $row[$key]; 
                                                                            } 
                                                                            if(($key == 'size_label') || ($key == 'id') || ($key == 'rate')){ 
                                                                                echo '<td>' . $row[$key] . '</td>';
                                                                            }
                                                                            ?>
                                                                            <?php 
                                                                        } ?>
                                                                            <td>
                                                                                <div class="d-flex justify-content-around">
                                                                                    <a  type="button" onclick="editRow(this)" data-toggle="modal" data-target="#myRateEditModal" rate="12" data-content="<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt font-size-16 text-success mr-1" data-container="body" data-toggle="tooltip" data-placement="top" title="Edit Record"></i></a>
                                                                                    <a type="button" onclick="deleteRow(this)" data-content="backend/delete-size.php?id=<?php echo $record_id; ?>" class="delete-record-btn waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-content="11"><i  data-container="body" data-toggle="tooltip" data-placement="top" title="Delete Record" class="fas fa-trash-alt font-size-16 text-danger mr-1"></i></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php     
                                                                    }                                          
                                                                } ?>
                                                        </tbody>
                                                    </table>
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

        <!-- sample modal content -->
        <div id="myRateEditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myRateEditModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="editSizeForm">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myRateEditModalLabel">Edit Size Rate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="number" min="0" class="form-control" name="updateRateInput" id="updateRateInput" value=""/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="rate-update-btn" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <script src="custom/js/sizes.js"></script>
        <script src="custom/js/general.js"></script>
        <?php include 'datatables.php' ?>
    </body>
</html>