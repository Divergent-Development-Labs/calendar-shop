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
                        <div class="d-md-flex justify-content-around">
                            <?php 
                                $customerId = $q;
                                $sql1 = "SELECT * FROM `customer` WHERE `id`='$customerId'";
                                $customer = $conn->prepare($sql1);
                            
                                $customer->execute();
                            
                                $result1 = $customer->get_result();
                            
                                if($result1->num_rows > 0){
                                    while ($row = $result1->fetch_assoc()) { ?>

                                        <div class="card col-sm-5">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Personal Information</h4>
                                                <div class="table-responsivez">
                                                    <table class="table table-nowrap mb-0 w-100" >
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Full Name :</th>
                                                                <td><?php echo $row['name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mobile :</th>
                                                                <td><?php echo $row['mobile_number']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">E-mail :</th>
                                                                <td><?php echo $row['email']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Location :</th>
                                                                <td><?php echo $row['address_line'] .', ' . $row['area'] .',<br> ' . $row['district'] .', ' . $row['state'] . ',<br>' . $row['pincode']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    }
                                } 
                                ?>
                            <div class="card col-sm-5">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Amount Summary</h4>

                                    <div class="table-responsivez">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Total :</td>
                                                    <td>
                                                        <span  id="totalAmt" class="text-info"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Paid :</td>
                                                    <td>
                                                        <span  id="paidAmt" class="text-success"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pending :</td>
                                                    <td>
                                                        <span  id="pendingAmt" class="text-danger"></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div><!-- end card -->                                    
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                
                                        <!-- <table id="dz" class="table table-bordered dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                                        <table id="dz" class="table table-hover table-bordered dt-responsive display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr >
                                                    <!-- <th><input id="all_ids" type="checkbox" name="all_ids" value="" class="myCustomCheckBox all_ids font-warning" /></th> -->
                                                    <th>Order Id</th>
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
        <script src="custom/js/edit-customer.js"></script>
        <script src="custom/js/general.js"></script>
        <?php include 'datatables.php' ?>

    </body>
</html>