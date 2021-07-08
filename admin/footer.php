            </div><!-- end container-fluid -->
        <div><!-- end page-content -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Calendar Shop.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            <a href="https://kvncloud.com/" target="_blank" style="color: #74788d;" >Developed by KVN Cloud</a>                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div><!-- end main-content -->
</div>
<!-- <script src="jquery/jquery-3.5.1.js"></script> -->

        <!-- sample modal content -->
        <div id="reportModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form name="reportName" action="backend/accessReport.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="reportModalLabel">Access Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label>Enter Access Key</label>
                            <input type="password" name="accessUserKey" required class="form-control" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="access-report-btn" name="access-report-btn"  class="btn btn-success waves-effect waves-light">Access</button>
                        </div>
                        <?php 
                            if(isset($_SESSION["accessMsg"])) {
                                ?>
                                <div class="alert alert-danger mt-2"><i class="fa fa-warning mr-2"></i><?php  echo $_SESSION["accessMsg"]; unset($_SESSION["accessMsg"]); ?></div>
                                <?php 
                                
                                } 
                        ?>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<script src="assets/libs/parsleyjs/parsley.min.js"></script>

<script src="assets/js/pages/form-validation.init.js"></script>

<script src="assets/js/app.js"></script>
