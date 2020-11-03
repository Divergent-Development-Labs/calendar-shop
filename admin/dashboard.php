<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php';  ?>

<!Doctype html>
<html>
    <head>
        <?php include 'head.php'; ?>

    </head>
    <?php include 'body.php'; ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body font-size-18">
                                        <a href="orders.php"> Orders | </a>
                                        <a href="sizes.php"> Sizes | </a>
                                        <a href="designs.php"> Designs | </a>
                                        <a href="customers.php"> Customers </a>    
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->        

                    <?php include 'footer.php'; ?>

    </body>
</html>