<?php include 'session-checking.php'; ?>
<?php include 'db/connection.php'; ?>
<?php

if (isset($_GET['id'])) {
    if (!($_GET['id']) || ($_GET['id'] == '')) {
        header('Location: index.php');
    } else {
        $q = intval($_GET['id']);
        $sql = "SELECT * FROM `project` WHERE `id`='$q'";
    }
} else if (isset($_GET['name'])) {
    if (!($_GET['name']) || ($_GET['name'] == '')) {
        header('Location: index.php');
    } else {
        $n = $_GET['name'];
        $sql = "SELECT * FROM `project` WHERE `name`='$n'";
    }
} else {
    header('Location: index.php');
}

$project = $conn->prepare($sql);
// $project->bind_param('s', $name); // 's' specifies the variable type => 'string'

$project->execute();

$result = $project->get_result();
// print $result;    

?>
<!Doctype html>
<html>
<head>
    <?php include 'head.php'; ?>

    <!-- Summernote css -->
    <link href="assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" id="u0" href="assets/libs/tinymce/skins/ui/oxide/skin.min.css">
</head>
<?php include 'body.php'; ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Project Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="project.php">Projects</a></li>
                    <li class="breadcrumb-item active">Project Profile</li>
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

                <?php
                while ($row = $result->fetch_assoc()) { ?>
                    <form class="custom-validation" id="editProjectForm" action="backend/update-project-backend.php?id=<?php echo $row['id']; ?>" method="post">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Project Name</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo $row['project_name']; ?>" type="text" name="projectName" class="project form-control" required placeholder="Enter Project Name" />
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Project Type</label>
                                    <div class="col-md-9">
                                        <select class="form-control projectType" name="projectType" required>
                                            <option disabled <?php echo ($row['project_type'] == '') ? 'selected' : ''; ?>>Select Type</option>
                                            <option value="1" <?php echo ($row['project_type'] == '1') ? 'selected' : ''; ?>>Villa</option>
                                            <option value="2" <?php echo ($row['project_type'] == '2') ? 'selected' : ''; ?>>Plot</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row bhkOrSqftTypeDiv">
                                    <label class="col-md-3 col-sm-3 col-form-label bhkOrSqftTypeLabel"><?php echo $row['project_type'] == '1' ? 'BHK' : 'Sqft';?> Value</label>
                                    <div class="col-md-9">
                                        <input type="text" name="bhkOrSqftType" class="project form-control bhkOrSqftTypeValue" placeholder="Enter <?php echo $row['project_type'] == '1' ? 'BHK' : 'Sqft';?> Value " value="<?php echo $row['bhk_or_sqft']; ?>"  required/>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Project Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="projectStatus" required>
                                            <option disabled <?php echo ($row['project_status'] == '') ? 'selected' : ''; ?>>Select Status</option>
                                            <option value="1" <?php echo ($row['project_status'] == '1') ? 'selected' : ''; ?>>On Going</option>
                                            <option value="2" <?php echo ($row['project_status'] == '2') ? 'selected' : ''; ?>>Completed</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Image Link</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo ($row['img_link'] != '') ? "https://drive.google.com/file/d/" . $row['img_link'] . "/view?usp=sharing" : ''; ?>" type="text" name="imgLink" class="form-control" placeholder="Enter Project Image Link" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">PDF Link</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo $row['pdf_link']; ?>" type="text" name="pdfLink" class="form-control" placeholder="Enter Project pdf link" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Sitemap Link</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo ($row['sitemap_link'] != '') ? "https://drive.google.com/file/d/" . $row['sitemap_link'] . "/view?usp=sharing" : ''; ?>" type="text" name="sitemapLink" class="form-control" placeholder="Enter Sitemap Link" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Youtube Link</label>
                                    <div class="col-md-9">
                                        <input value='https://youtu.be/<?php echo $row['youtube_link']; ?>' type="text" name="youtubeLink" class="form-control" placeholder="Enter Youtube link" />
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Address Line 1</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo $row['address_line_1']; ?>" type="text" name="addressLine1" class="form-control" placeholder="Enter Door No, Street Name" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Address Line 2</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo $row['address_line_2']; ?>" type="text" name="addressLine2" class="form-control" placeholder="Enter Area Name / Land Mark" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">District</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo $row['district']; ?>" type="text" name="district" class="form-control" placeholder="Enter Project District" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">State</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo $row['state']; ?>" type="text" name="state" class="form-control" placeholder="Enter Project State" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-form-label">Pin Code</label>
                                    <div class="col-md-9">
                                        <input value="<?php echo $row['pin_code']; ?>" type="text" class="form-control" name="pinCode" data-parsley-length="[6,6]" maxlength="6" placeholder="Enter Pin Code" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Amenities</h4>        
                                        <textarea id="elm1" name="anamatics"><?php echo $row['anamatics']; ?></textarea>                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Sirena Features</h4>        
                                        <textarea id="elm2" name="sirena_features"><?php echo $row['sirena_features']; ?></textarea>                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="card-footer form-group mb-0 text-right">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1" id="updateBtn" name="updateBtn">
                                    Update
                                </button>
                                <a type="button" class="btn btn-outline-secondary waves-effect" href="project.php">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                <?php }   ?>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<!-- <script src="custom/js/project.js"></script> -->
<script src="custom/js/edit-project.js"></script>


<!--tinymce js-->
<script src="assets/libs/tinymce/tinymce.min.js"></script>

<!-- Summernote js -->
<script src="assets/libs/summernote/summernote-bs4.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/form-editor.init.js"></script>

<?php include 'datatables.php' ?>

</body>

</html>