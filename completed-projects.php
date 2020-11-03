<?php include 'admin/db/connection.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'head.php'; ?>
</head>

<body data-rsssl=1 class="home page-template page-template-front-page page-template-front-page-php page page-id-15">

    <?php include 'top_bar.php'; ?>

    <section class="container-fluid breadcrumb-section single_p float-left p-0">
        <p id="breadcrumbs"><span><span><a href="index.php">Home</a> | <span><span class="breadcrumb_last" aria-current="page">Completed projects</span></span></span></span></p>
    </section>

    <div class="container">
        <div class="col-12 m-0 color-666 AvenirLTStdLight fw-bold text-center fs-16 fs-xs-14">
            <h1 class="text-uppercase text-center fs-30 fs-xs-26 AvenirLTStdHeavy">PROJECTS IN <span class="text-uppercase">Completed projects</span></h1>
        </div>
    </div>

    <section class="bg-f5f5f5">
        <div class="container">
            <div class="row" id="result">
                <div class="col-12 col-md-12">
                    <ul class="nav nav-tabs border-bottom justify-content-center location project-listing-page AvenirLTStd55Roman_5173" role="tablist">
                        <li class="nav-item"><a class="nav-link active fs-20" href="#villa-view" role="tab" data-toggle="tab">Villas</a></li>
                        <li class="nav-item"><a class="nav-link fs-20 d-block t_map_view" href="#plot-view" role="tab" data-toggle="tab">Plots</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- main Tab content -->
                        <div role="tabpanel" class="tab-pane in active AvenirLTStd55Roman_5173 house-type-tab" id="villa-view">
                            <!-- main -->
                            <div class="row mt-5 mb-5">
                                <?php
                                $sql = "SELECT * FROM `project` WHERE `project_status`='2' AND `project_type`='1'";
                                $completedArray = $conn->query($sql);

                                if ($completedArray->num_rows > 0) {
                                    while ($completed = $completedArray->fetch_assoc()) { ?>

                                        <div class="col-12 col-sm-4 mb-sm-30 project-list-holder">
                                            <div class="project-list-image card"> 
                                                <span>
                                                    <img class="w-100" src="https://drive.google.com/thumbnail?id=<?php echo $completed['img_link']; ?>">
                                                </span>
                                            </div>

                                            <div class="bg-fff opensansregular">
                                                <h4 class="fs-18 tab-proj-title project-details AvenirLTStdHeavy"><?php echo $completed['project_name']; ?></h4>
                                                <p class="color-666 pt-3 fs-16 project-details text-left lh-30">
                                                    <img class="icon ml-1" src="wp-content/themes/img/map.png">
                                                    <span class="proj-detail"><?php echo $completed['address_line_2']; ?></span>
                                                </p>
                                                <p class="fs-16 project-details color-666 d-block text-left lh-30">
                                                    <img class="icon" style="margin-right: 26px;" src="wp-content/themes/img/bed.png">
                                                    <span class="proj-detail">-</span>
                                                </p>
                                                <p class="text-left project-details  pb-3 fs-16 color-666 d-block lh-30">
                                                    <img class="icon" style="margin-left: 7px;" src="wp-content/themes/img/rupees.png">
                                                    <span class="proj-detail">-</span>
                                                </p>

                                                <p class="d-flex">
                                                    <!-- <a href="javascript:void(0);" data-toggle="modal" data-proj_id="" data-project_name="" data-project_id="" data-target="#modal_enq_project" class="btn-brochure AvenirLTStdLight color-fff d-inline-block fs-16 click-enq click-downloadBrochure proj-btn">Download Brochure</a> -->
                                                    <a href="<?php echo $completed['pdf_link']; ?>" target="_blank" class="btn btn-brochure AvenirLTStdLight color-fff d-inline-block fs-16 click-enq click-downloadBrochure-Boulevard proj-btn">Download Brochure</a>
                                                    <a class="color-fff fs-16 proj-btn btn-details AvenirLTStdLight btn" href="villa.php?id=<?php echo $completed['id']; ?>" >View Details </a>
                                                </p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else { ?>
                                    <div class="col-12 col-sm-4 mb-sm-30 project-list-holder mx-auto">
                                        <div class="bg-fff opensansregular p-4">
                                            <h4>No Projects Available</h4>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade AvenirLTStd55Roman_5173 house-type-tab" id="plot-view">
                            <!-- main -->
                            <div class="row mt-5 mb-5">
                                <?php
                                $sql = "SELECT * FROM `project` WHERE `project_status`='2' AND `project_type`='2'";
                                $completedArray = $conn->query($sql);

                                if ($completedArray->num_rows > 0) {
                                    while ($completed = $completedArray->fetch_assoc()) { ?>

                                        <div class="col-12 col-sm-4 mb-sm-30 project-list-holder">
                                            <div class="project-list-image card"> <a href="#"><img class="w-100" src="https://drive.google.com/thumbnail?id=<?php echo $completed['img_link']; ?>"></a></div>

                                            <div class="bg-fff opensansregular">
                                                <h4 class="fs-18 tab-proj-title project-details AvenirLTStdHeavy"><?php echo $completed['project_name']; ?></h4>
                                                <p class="color-666 pt-3 fs-16 project-details text-left lh-30">
                                                    <img class="icon ml-1" src="wp-content/themes/img/map.png">
                                                    <span class="proj-detail"><?php echo $completed['address_line_2']; ?></span>
                                                </p>
                                                <p class="fs-16 project-details color-666 d-block text-left lh-30">
                                                    <img class="icon" style="margin-right: 26px;" src="wp-content/themes/img/bed.png">
                                                    <span class="proj-detail">-</span>
                                                </p>
                                                <p class="text-left project-details  pb-3 fs-16 color-666 d-block lh-30">
                                                    <img class="icon" style="margin-left: 7px;" src="wp-content/themes/img/rupees.png">
                                                    <span class="proj-detail">-</span>
                                                </p>

                                                <p class="d-flex">
                                                    <!-- <a href="javascript:void(0);" data-toggle="modal" data-proj_id="" data-project_name="" data-project_id="" data-target="#modal_enq_project" class="btn-brochure AvenirLTStdLight color-fff d-inline-block fs-16 click-enq click-downloadBrochure proj-btn">Download Brochure</a> -->
                                                    <a href="<?php echo $completed['pdf_link']; ?>" target="_blank" class="btn btn-brochure AvenirLTStdLight color-fff d-inline-block fs-16 click-enq click-downloadBrochure-Boulevard proj-btn">Download Brochure</a>
                                                    <a class="color-fff fs-16 proj-btn btn-details AvenirLTStdLight btn" href="plot.php?id=<?php echo $completed['id']; ?>">View Details </a>
                                                </p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else { ?>
                                    <div class="col-12 col-sm-4 mb-sm-30 project-list-holder mx-auto">
                                        <div class="bg-fff opensansregular p-4">
                                            <h4>No Projects Available</h4>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>

</body>

</html>