<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php';  ?>

<!Doctype html>
<html>
    <head>
        <title>Customers | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Projects</h4>
                                    <a  href="new-customer.php" type="button" class="btn btn-success font-weight-bold"><i class="fas fa-plus mr-1"></i> Add Customer</a>
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
                                                <tr class="">
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Email</th>
                                                    <th>Address Line </th>
                                                    <th>Area</th>
                                                    <th>District</th>
                                                    <th>State</th>
                                                    <th>Pin Code</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                
                                            <tbody>
                                                <?php 
                                                    $sql = "SELECT * FROM `customer`";    
                                                    $project = $conn->prepare($sql);                                                
                                                    $project->execute();                                                
                                                    $result = $project->get_result();
                                            
                                                    if($result->num_rows > 0){
                                                        while ($row = $result->fetch_assoc()) {                                                             
                                                            echo '<tr>';  
                                                            foreach ($row as $key => $value) { 
                                                                if(($key == 'id') || ($key == 'name')){
                                                                    $record_id = $row['id']; ?>
                                                                    <td><a href="edit-customer.php?id=<?php echo $record_id; ?>" ><?php echo $row[$key]?></td>                                                            
                                                                <?php
                                                                }
                                                                else{ ?>
                                                                    <td><?php echo $row[$key]?></td>                                                            
                                                                <?php 
                                                                }
                                                            } ?>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a  href="edit-project.php?id=<?php echo $record_id; ?>" class="" data-container="body" data-toggle="tooltip" data-placement="top" title="Edit Record"><i class="fas fa-pencil-alt font-size-16 text-success mr-1"></i></a>
                                                                        <a type="button" onclick="deleteRow(this)" data-content="backend/delete-customer.php?id=<?php echo $record_id; ?>" class="delete-record-btn waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-content="11"><i  data-container="body" data-toggle="tooltip" data-placement="top" title="Delete Record" class="fas fa-trash-alt font-size-16 text-danger mr-1"></i></a>
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


        <script src="custom/js/customers.js"></script>
        <script src="custom/js/general.js"></script>
        <?php include 'datatables.php' ?>
    </body>
</html>