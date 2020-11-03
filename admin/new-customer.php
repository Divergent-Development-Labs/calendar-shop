<?php include 'session-checking.php'; ?>
<!Doctype html>
<html>
    <head>
        <title>New Customer | Calendar Shop Admin</title>
        <?php include 'head.php'; ?>
    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Add Customer</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
                                            <li class="breadcrumb-item active">Add Customer</li>
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

                                        <form class="custom-validation row" id="addCustomerForm" action="backend/insert-customer-backend.php" method="post">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="customerCheck form-control" id="name" required placeholder="Enter Customer Name"/>
                                                <span class="text-danger" hidden>Customer Already Exist!</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <div>
                                                    <input type="text" name="mobileNumber" required id="mobile_number" class="customerCheck form-control" 
                                                            data-parsley-length="[10,10]"
                                                            maxlength="10"
                                                            placeholder="Enter Customer Mobile Number"/>
                                                    <span class="text-danger" hidden>Mobile Number already Exist!</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>E-Mail</label>
                                                <div>
                                                    <input type="email" name="eMail" class="form-control" 
                                                            parsley-type="email" placeholder="Enter Customer e-mail"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Address Line 1</label>
                                                <div>
                                                    <input type="text" name="addressLine1"
                                                            class="form-control" 
                                                            placeholder="Enter Door No, Street Name"/>
                                                <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Area</label>
                                                <div>
                                                    <input type="text" name="area"
                                                            class="form-control" 
                                                            placeholder="Enter Area Name / Land Mark"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>District</label>
                                                <div>
                                                    <input type="text"  name="district"
                                                            class="form-control" 
                                                            placeholder="Enter Customer District"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <div>
                                                    <input type="text" name="state"
                                                            class="form-control" 
                                                            placeholder="Enter Customer State"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Pin Code</label>
                                                <div>
                                                <input type="text" class="form-control"  name="pinCode"
                                                            data-parsley-length="[6,6]"
                                                            maxlength="6"
                                                            placeholder="Enter Pincode"/>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group mb-0 col-12 text-right">
                                                <div>
                                                    <button type="submit" disabled class="btn btn-success waves-effect waves-light mr-1" name="saveBtn" id="newCustomerSaveBtn">
                                                        Save
                                                    </button>
                                                    <a type="button" class="btn btn-outline-secondary waves-effect" href="customers.php" >
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    <?php include 'footer.php'; ?>
        <script src="custom/js/new-customer.js"></script>
    </body>
</html>