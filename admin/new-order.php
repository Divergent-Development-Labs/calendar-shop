<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php'; ?>

<?php 
      $sql1 = "SELECT * FROM `customer`";
      $sql2 = "SELECT * FROM `size`";
      $sql3 = "SELECT * FROM `design`";
      $customerArray = $conn->query($sql1);
      $sizeArray = $conn->query($sql2);
      $designArray = $conn->query($sql3);
?>
<!Doctype html>
<html>
    <head>
        <title>New Order | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Add Order</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
                                            <li class="breadcrumb-item active">Add Order</li>
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
                                        <form class="custom-validation row" id="addOrderForm" action="backend/insert-order-backend.php" method="post">
                                            <div id="myDropdown" class="dropdown-content col-4">
                                                <select id="customer" name="customer_id" class="form-control form-control-sm" required>
                                                    <option value="" selected disabled>Select Customer</option>
                                                    <?php 
                                                        if ($customerArray->num_rows > 0) {                                
                                                            while($customer = $customerArray->fetch_assoc()) { ?>
                                                                <option value="<?php echo $customer['id'];?>" class=""><?php echo $customer['name'];?></option>
                                                            <?php }
                                                        } 
                                                    ?> 
                                                </select>
                                            </div>

                                            <div class="card col-12" >
                                                <div class="card-body table-responsive">
                                                    <div class="d-sm-flex justify-content-between">
                                                        <h5>Order Section</h5>
                                                    </div>
                                                    <table class="table table-bordered table-sm ledgerTable" id="pTable">
                                                        <thead class="text-center">
                                                            <th class="serialNo">S.No</th>
                                                            <th class="supplierDropDown w-xl">Calendar Type</th>
                                                            <th class="supplierDropDown w-xl">Size</th>
                                                            <th class="w-xl">Design</th>
                                                            <th class="rupees w-lg">Rate</th>
                                                            <th class="rupees w-sm " >Quantity</th>
                                                            <th class="rupees w-lg">Total Cost</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody id="pTBody" class="pTBody ">
                                                        </tbody>
                                                        <tfoot style="text-align-last: end;">
                                                            <tr class="">   
                                                                <td class="serialNo">
                                                                    <span class="tsno" id="tsno"></span>
                                                                </td>
                                                                <td colspan=3  style="vertical-align: middle;">
                                                                    <span>Total</span>
                                                                </td>
                                                                <td>
                                                                    <input type="text" disabled class="form-control-plaintext" id="toq" aria-describedby="toq">
                                                                </td>
                                                                <td>
                                                                    <input type="text" disabled class="form-control-plaintext" id="toc" aria-describedby="toc">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan=3>
                                                                </td>
                                                                <td colspan=2 class="p-0">
                                                                    <div class="border-bottom p-2">
                                                                        <span>Subtotal</span>
                                                                    </div>
                                                                    <div class="border-bottom p-2">
                                                                        <span>CGST (6%)</span>
                                                                        <br><br>
                                                                        <span>SGST (6%)</span>
                                                                    </div>
                                                                    <div class="p-2">
                                                                        <span>Total Cost</span>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                <div class="border-bottom p-2">
                                                                        <input readonly id="oSubtotal" name="orderSubtotal">
                                                                    </div>
                                                                    <div class="border-bottom p-2">
                                                                        <input readonly id="oCGST" name="orderCGST">
                                                                        <br><br>
                                                                        <input readonly id="oSGST" name="orderSGST">
                                                                    </div>
                                                                    <div class="p-2">
                                                                        <input readonly id="oTotal" name="orderTotal">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="mb-3 text-right" >
                                                    <button type="submit" class="btn btn-success submit" name="saveBtn">Save</button>
                                                    <a href="orders.php" type="button" class="btn btn-outline-secondary" >Cancel</a>
                                                </div>
                                            </div>
                                            <input hidden type="text" name="orderData" id="orderData">
                                            <input hidden type="text" name="totalOrderData" id="totalOrderData">
                                        </form>
                                    </div>
                                </div>

                                <div class="card col-12 p-2 d-none " id="designCard">

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
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <script id="pRow" type="text/html">
                                 <tr>
                                    <td class="w-auto">
                                        <span class="sno" aria-describedby="sno"></span>
                                    </td>
                                    <td class="w-xl">
                                        <select id="calendar_type" class="form-control form-control-sm w-xl" required>
                                            <option value="" selected disabled>Select Type</option>                                            
                                            <option value="Monthly - 6 Sheet">Monthly - 6 Sheet</option>
                                            <option value="Monthly - 12 Sheet">Monthly - 12 Sheet</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Table">Table</option>
                                        </select>
                                    </td>
                                    <td class="w-xl">
                                        <div id="myDropdown" class="dropdown-content">
                                            <select id="size" class="form-control form-control-sm sizeChange w-xl" required>
                                                <option value="" selected disabled>Select Size</option>
                                                    <?php 
                                                        if ($sizeArray->num_rows > 0) {                                
                                                            while($size = $sizeArray->fetch_assoc()) { ?>
                                                                <option value='<?php echo $size['size_label'];?>' class=""><?php echo $size['size_label'];?></option>
                                                            <?php }
                                                        } 
                                                    ?> 
                                                </select>
                                        </div>
                                    </td>
                                    <td class="d-flex justify-content-center w-xl">
                                        <input disbaled hidden class="is_custom_design" />
                                        <input type="text" style="width:0px !important;" class="border-0 form-control form-control-sm design"  aria-describedby="design" disabled >
                                        <div class="d-block">
                                            <input type="text" class="border form-control form-control-sm designName h-auto w-md"  aria-describedby="designName" disabled required>
                                        </div>
                                        <a type="button" class="designSelect text-center text-primary" ><i class="fa fa-search p-2"></i></a>
                                    </td>
                                    <td class="w-lg">
                                        <input type="number" min="0" class="form-control form-control-sm rate toOCalc w-lg" disabled aria-describedby="rate" required>
                                    </td>
                                    <td class="w-sm">
                                        <input type="number" min="0" class="form-control form-control-sm quantity toOCalc w-sm" aria-describedby="Quantity" disabled required>
                                    </td>
                                    <td class="w-lg">
                                        <input type="number" min="0" class="form-control form-control-sm cost w-lg"  aria-describedby="cost" placeholder="" step="any" disabled>
                                    </td>
                                    <td class="text-right w-sm ">
                                        <button class="btn btn-sm btn-outline-danger" type="button" onClick="delRow(this)"><i class="fa fa-close"></i></button>
                                        <button class="addRow btn btn-outline-primary btn-sm" type="button" onClick="addRow()"><i class="fa fa-plus"></i></button>
                                    </td>
                                 </tr>                       
                        </script>

                    <?php include 'footer.php'; ?>
        <script src="custom/js/orders.js"></script>
        <script src="custom/js/new-order.js"></script>
    </body>
</html>