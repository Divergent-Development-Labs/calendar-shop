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

    $sizeArray = $conn->query($sql4);
    $designArray = $conn->query($sql5);
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

                        <div class="d-md-flex justify-content-around">
                            <?php 
                                $customerId = $result->fetch_assoc()['customer_id'];
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
                                                    <td>SGST Tax :</td>
                                                    <td><?php echo ($row_summary['gst'] / 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total :</th>
                                                    <td><?php echo $row_summary['total']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Payment Status :
                                                        <span class="paymentStatus"  id="spanswitch<?php echo $row_summary['id'];?>"><?php echo ($row_summary['payment_status'] == 'true' ? 'Paid' : 'Unpaid');?></span>
                                                    </th>
                                                    <td>
                                                        <input type="checkbox" id="switch<?php echo $row_summary['id']; ?>" switch="success" <?php echo ($row_summary['payment_status'] == 'true') ? "checked" : ''; ?> class="paymentBtn" onclick="doPayment(<?php echo $row_summary['id'];?>)" />
                                                        <label for="switch<?php echo $row_summary['id'];?>" data-on-label="Paid" data-off-label="pay"></label>                                    
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
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
                                    <div class="card-header pb-0 bg-white">
                                        <h4 class="mb-0 font-size-18">Products</h4>
                                    </div>
                                    <div class="card-body pt-0">
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
                                                                if($designArray->num_rows > 0){
                                                                        foreach ($designArray as $key => $value) {
                                                                        if($value['id'] == $rowProduct['design']){
                                                                            echo '<td><img src="https://drive.google.com/thumbnail?id=' . $value['design_link'] . '" alt="product-img" title="product-img" class="avatar-md" /></td>';
                                                                        }
                                                                    }
                                                                }
                                                                if($sizeArray->num_rows > 0){
                                                                    foreach ($sizeArray as $key => $value) {
                                                                        if($value['id'] == $rowProduct['size']){
                                                                            echo '<td><h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">'.$value['size_label'].'</a></h5></td>';
                                                                        }
                                                                    }
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
                                    </div>
                                </div>
                            </div> <!-- end col -->                    
                        </div>
                    <?php include 'footer.php'; ?>
                    <script src="custom/js/view-order.js"></script>
                    <!-- <script src="assets/js/pages/ecommerce-cart.init.js"></script> -->
    </body>
</html>