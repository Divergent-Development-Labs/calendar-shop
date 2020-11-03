<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php'; ?>
<?php 

    if(isset($_GET['id'])){
        if(!($_GET['id'])){
            header('Location: index.php');
        }    
        else{
            $q = intval($_GET['id']);
            $sql = "SELECT * FROM `customer` WHERE `id`='$q'";
        }
    }
    else if(isset($_GET['name'])){
        if(!($_GET['name'])){
            header('Location: index.php');
        }    
        else{
            $n = $_GET['name'];
            $sql = "SELECT * FROM `customer` WHERE `name`='$n'";
        }
    }
    else{
        header('Location: index.php');
    }
    
    $customer = $conn->prepare($sql);
    // $ledger->bind_param('s', $name); // 's' specifies the variable type => 'string'

    $customer->execute();

    $result = $customer->get_result();
    // print $result;    
    
?>
<!Doctype html>
<html>
    <title>Edit Customer | Calendar Shop Admin</title>
    <?php include 'head.php'; ?>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18" value="<?php echo $_GET['id']; ?>" id="profileId">Customer Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
                                            <li class="breadcrumb-item active">Customer Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="card w-100"  style="border-top: 1px solid;">
                            <div class="card-header">
                                <h5>Personal Details</h5>
                            </div>
                                    <?php 
                                        while ($row = $result->fetch_assoc()) { ?>
                                        <form class="custom-validation" id="editCustomerForm" action="backend/update-customer-backend.php?id=<?php echo $row['id']; ?>" method="post">
                                            <div class="card-body d-md-flex justify-content-center pb-0">

                                                <div class=" border my-2 p-2">
                                                    <div class=" d-lg-flex justify-content-end my-2">
                                                        <label class="my-auto mr-3">Name</label>
                                                        <div>
                                                            <input value="<?php echo $row['name']; ?>" type="text" name="name" id="name" class="customerCheck form-control customer form-control-sm" required placeholder="Enter Customer Name"/>
                                                            <span class="text-danger" hidden>Customer Already Exist!</span>                                                        
                                                        </div>
                                                    </div>
                                                    <div class=" d-lg-flex justify-content-end my-2">
                                                        <label class="my-auto mr-3">Mobile Number</label>
                                                        <div>
                                                            <input value="<?php echo $row['mobile_number']; ?>" type="text" name="mobileNumber"  id="mobile_number" class="customerCheck form-control form-control-sm my-auto" 
                                                                    data-parsley-length="[10,10]"
                                                                    maxlength="10"
                                                                    placeholder="Enter Customer Mobile Number"/>
                                                            <span class="text-danger" hidden>Mobile Number Already Exist!</span>                                                        
                                                        </div>
                                                    </div>
                                                    <div class=" d-lg-flex justify-content-end my-2">
                                                        <label class="my-auto mr-3">E-Mail</label>
                                                        <div>
                                                            <input value="<?php echo $row['email']; ?>" type="email" name="eMail" class="form-control form-control-sm my-auto" 
                                                                    parsley-type="email" placeholder="Enter Customer e-mail"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" justify-content-around border my-2 p-2">
                                                    <div class=" d-lg-flex justify-content-end my-2">
                                                        <label class="my-auto mr-3">Address Line</label>
                                                        <div>
                                                            <input value="<?php echo $row['address_line']; ?>" type="text" name="addressLine1"
                                                                    class="form-control form-control-sm my-auto" 
                                                                    placeholder="Enter Door No, Street Name"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-lg-flex justify-content-end my-2">
                                                        <label class="my-auto mr-3">Area</label>
                                                        <div>
                                                            <input value="<?php echo $row['area']; ?>" type="text" name="area"
                                                                    class="form-control form-control-sm my-auto" 
                                                                    placeholder="Enter Area Name / Land Mark"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" justify-content-around border my-2 p-2">
                                                    <div class="d-lg-flex justify-content-end  my-2">
                                                        <label class="my-auto mr-3">District</label>
                                                        <div>
                                                            <input value="<?php echo $row['district']; ?>" type="text"  name="district"
                                                                    class="form-control form-control-sm my-auto" 
                                                                    placeholder="Enter Customer District"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-lg-flex justify-content-end my-2">
                                                        <label class="my-auto mr-3">State</label>
                                                        <div>
                                                            <input value="<?php echo $row['state']; ?>" type="text" name="state"
                                                                    class="form-control form-control-sm my-auto" 
                                                                    placeholder="Enter Customer State"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-lg-flex justify-content-end my-2">
                                                        <label class="my-auto mr-3">Pin Code</label>
                                                        <div>
                                                        <input value="<?php echo $row['pincode']; ?>" type="text" class="form-control form-control-sm my-auto"  name="pinCode"
                                                                    data-parsley-length="[6,6]"
                                                                    maxlength="6"
                                                                    placeholder="Enter Pincode"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer form-group mb-0 text-right">
                                                <div>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mr-1" id="updateBtn" name="updateBtn" >
                                                        Update
                                                    </button>
                                                    <a type="button" class="btn btn-outline-secondary waves-effect" href="customers.php" >
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>

                                        </form>
                                    <?php }   ?>                                           
                        </div>
                        <div class="card  w-100" style="border-top: 1px solid;">
                            <div class="card-header">
                                <h5>Amount Details</h5>
                            </div>
                            <div class="d-md-flex justify-content-between card-body pb-0"> 
                                <div class="col-lg-4">
                                    <div class="card border border-info">
                                        <div class="card-header bg-transparent text-center border-info d-flex d-lg-block justify-content-between">
                                            <h5 class="my-0 text-info"><i class="mr-3"></i>Total Amount</h5>
                                        <!-- </div>
                                        <div class="card-body font-size-17 pt-0 text-center text-info"> -->
                                            <h5 class="card-text my-0 text-info" id="totalAmt"></h5>
                                        </div>
                                    </div>
                                </div>                                    
                                <div class="col-lg-4">
                                    <div class="card border border-success">
                                        <div class="card-header bg-transparent  text-center border-success  d-flex d-lg-block justify-content-between">
                                            <h5 class="my-0 text-success"><i class="mr-3"></i>Paid Amount</h5>
                                        <!-- </div>
                                        <div class="card-body font-size-17 pt-0 text-center text-success"> -->
                                            <h5 class="card-text  my-0 text-success" id="paidAmt"></h5 >
                                        </div>
                                    </div>
                                </div>                                    
                                <div class="col-lg-4">
                                    <div class="card border border-danger">
                                        <div class="card-header bg-transparent text-center  border-danger text-danger  d-flex d-lg-block justify-content-between">
                                            <h5 class="my-0 text-danger"><i class="mr-3"></i>Pending Amount</h5>
                                        <!-- </div>
                                        <div class="card-body font-size-17 pt-0 text-center text-danger"> -->
                                            <h5 class="card-text my-0 text-danger" id="pendingAmt"></h5>

                                        </div>
                                    </div>
                                </div>     
                            </div>                               
                        </div>
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
        <script src="custom/js/orders-table.js"></script>
        <script src="custom/js/general.js"></script>
        <?php include 'datatables.php' ?>

    </body>
</html>