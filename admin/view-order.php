<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php'; ?>
<?php 
    if(isset($_GET['id'])){
        if(!($_GET['id'])){
            header('Location: index.php');
        }    
        else{
            $q = intval($_GET['id']);
            $sql = "SELECT * FROM `orders` WHERE `id`='$q'";
        }
    }
    else{
        header('Location: index.php');
    }
    
    $orders = $conn->prepare($sql);
    $orders->execute();

    $result = $orders->get_result();
    // print $result;    
?>
<?php 
    $sql4 = "SELECT * FROM `size`";
    $sql5 = "SELECT * FROM `design`";

    // $sizes = $conn->prepare($sql4);    
    // $sizes->execute();
    // $sizeArray = $sizes->get_result();
    $sizeArray = ($conn->query($sql4))->fetch_all();

    // $designs = $conn->prepare($sql5);    
    // $designs->execute();
    // $designArray = $designs->get_result();
    $designArray = ($conn->query($sql5))->fetch_all();
?>
<!Doctype html>
<html>
    <head>
        <title>View Order | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">View Order</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
                                            <li class="breadcrumb-item active">View Order</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">                                        
                                        <div class="row">
                                            <?php 
                                                $customerId = $result->fetch_assoc()['customer_id'];
                                                $sql1 = "SELECT * FROM `customer` WHERE `id`='$customerId'";
                                                $customer = $conn->prepare($sql1);
                                            
                                                $customer->execute();
                                            
                                                $result1 = $customer->get_result();
                                            
                                                if($result1->num_rows > 0){
                                                    while ($row = $result1->fetch_assoc()) { ?>
          
                                            <div class=" border my-2 p-2">
                                                <div class=" d-lg-flex justify-content-end my-2">
                                                    <label class="my-auto mr-3">Name</label>
                                                    <div>
                                                        <input value="<?php echo $row['name']; ?>" type="text" name="name" id="name" class="customerCheck form-control customer form-control-sm" required placeholder="Enter Customer Name"/>
                                                    </div>
                                                </div>
                                                <div class=" d-lg-flex justify-content-end my-2">
                                                    <label class="my-auto mr-3">Mobile Number</label>
                                                    <div>
                                                        <input value="<?php echo $row['mobile_number']; ?>" type="text" name="mobileNumber"  id="mobile_number" class="customerCheck form-control form-control-sm my-auto" 
                                                                data-parsley-length="[10,10]"
                                                                maxlength="10"
                                                                placeholder="Enter Customer Mobile Number"/>
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
                                                  <?php }
                                                } ?>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header  bg-white">
                                        <h4 class="mb-0 font-size-18">Products</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 table-nowrap">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Design</th>
                                                        <th>Size</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th colspan="2">Total Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            $sql3 = "SELECT * FROM `products` WHERE `order_id`='$q'";
                                                            $products = $conn->prepare($sql3);
                                                        
                                                            $products->execute();
                                                        
                                                            $result2 = $products->get_result();
                                                            $sno = 1;
                                                            // echo $result2->num_rows;
                                                            echo '<br>';
                                                            $copy = $result2;
                                                            while($rowProduct = $copy->fetch_assoc()){
                                                                echo '<tr>';
                                                                echo '<td>'.$sno.'</td>';
                                                                while($design = $designArray[0]) { 
                                                                    if($design['id'] == $rowProduct['design']){
                                                                        echo '<td><img src="https://drive.google.com/thumbnail?id='.$design['design_link'].'" alt="product-img" title="product-img" class="avatar-md" /></td>';
                                                                    }
                                                                }    
                                                                $result -> free_result();    
                                                                // // foreach ($sizeArray as $key => $value) {
                                                                // //     echo $value;
                                                                // //     # code...
                                                                // } 
                                                                if($sizeArray->num_rows > 0){
                                                                    while($size = $sizeArray->fetch_assoc()) { 
                                                                        echo $size['id'];
                                                                        echo '<br>';
                                                                        if($size['id'] == $rowProduct['size']){
                                                                            echo '<td><h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">'.$size['size_label'].'</a></h5></td>';
                                                                        }
                                                                    }    
                                                                    $result -> free_result();
                                                                }
                                                                echo '<td><span>'.$rowProduct['rate'].'</span></td>';
                                                                echo '<td><span>'.$rowProduct['quantity'].'</span></td>';
                                                                echo '<td><span>'.$rowProduct['cost'].'</span></td>';
                                                                echo '</tr>';
                                                                $sno++;
                                                            }
                                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="ecommerce-products.html" class="btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left mr-1"></i> Continue Shopping </a>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-sm-right mt-2 mt-sm-0">
                                                    <a href="ecommerce-checkout.html" class="btn btn-success">
                                                        <i class="mdi mdi-cart-arrow-right mr-1"></i> Checkout </a>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Order Summary</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <?php 
                                                        $orders_summary = $conn->prepare($sql);
                                                        $orders_summary->execute();
                                                        $result3 = $orders_summary->get_result();
                                                        while($row_summary = $result3->fetch_assoc()){
                                                            ?>
                                                    <tr>
                                                        <td>Grand Total :</td>
                                                        <td><?php echo $row_summary['subtotal'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>CGST Tax :</td>
                                                        <td><?php echo ($row_summary['gst'] / 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>SGST Tax : </td>
                                                        <td><?php echo ($row_summary['gst'] / 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total :</th>
                                                        <td><?php echo $row_summary['total']; ?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                            </div> <!-- end row -->

                    <?php include 'footer.php'; ?>
                    <script src="assets/js/pages/ecommerce-cart.init.js"></script>
    </body>
</html>