<?php include 'admin/db/connection.php'; ?>
<?php

if (isset($_GET['id'])) {
    if (!($_GET['id']) || ($_GET['id'] == '')) {
        header('Location: index.php');
    } else {
        $q = intval($_GET['id']);
        $sql = "SELECT * FROM `project` WHERE `id`='$q'";
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
<!DOCTYPE html>
<html>

<head>
    <?php include 'head.php'; ?>
</head>

<body data-rsssl=1 class="home page-template page-template-front-page page-template-front-page-php page page-id-15">

    <?php include 'top_bar.php'; ?>
    <?php
    while ($row = $result->fetch_assoc()) { ?>

        <section class="pt-40 bg-37393e">
            <div class="container AvenirLTStdHeavy">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="swiper-container">
                            <img src="https://drive.google.com/thumbnail?id=<?php echo $row['img_link']; ?>" class="w-100" style="height: 240px;" />
                            <!-- <img src="https://drive.google.com/thumbnail?id=<?php echo $row['img_link']; ?>" class="w-100" alt="" style="position:relative" /> -->
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="text-center fs-13 ">
                            <div class="bg-fff text-center p-3 mb-20 fs-13">
                                <div class="row">
                                    <div class="col-12 text-center pb-10 text-uppercase GeorgiaRegularfont fw-bold">
                                        <img src="admin/assets/images/Star_luxor_logo.jpg"  alt="Villa" class="float-md-left" style=" max-width: 173px;">
                                    </div>
                                </div>
                                <ul class="text-left ul-project-quick-description color-666">
                                    <li>3 & 4 BHK Apartments </li>
                                    <li>Located in <?php echo $row['address_line_2']; ?> </li>
                                </ul>
                            </div>
                            <div class="row bg-37393e project-btns mb-10">
                                <div class="col-12 col-sm-4 mb-md-20 mb-10">
                                    <a class="d-block text-center AvenirLTStdHeavy color-444 w-100 fs-13 proj-details-more pt-1 pb-1 " target="_blank" href="<?php echo $row['pdf_link']; ?>" >Brochure</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid breadcrumb-section single_p float-left p-0">
            <p id="breadcrumbs">
                <span><a href="index.php">Home</a> | </span>
                <?php if($row['project_status'] == '1'){ ?>
                    <span><a href="ongoing-projects.php">Ongoing Projects</a> | </span>
                    <?php 
                }
                else{ ?>
                    <span><a href="completed-projects.php">Completed Projects</a> | </span>
                    <?php
                } ?>
                <span class="breadcrumb_last" aria-current="page">Villa</span>
        </section>

        <section class="project-highlights pb-0 pt-100" id="overview">
            <h1 class="text-uppercase text-center fs-30 fs-xs-26 AvenirLTStdHeavy">VILLA HIGHLIGHTS</h1>
            <div class="container-fluid">
                <div role="tabpanel" class="tab-pane in active AvenirLTStd55Roman_5173 ">
                    <div class="tab-content proj-highlights-section-tab pt-xs-30">
                        <div role="tabpanel" class="tab-pane in active">
                            <div class="d-sm-flex justify-content-around">
                                <div class="<?php echo ($row['anamatics'] == '') ? 'd-none': 'd-block' ; ?>">
                                    <h4 class="color-444 AvenirLTStdHeavy text-uppercase fs-25 pb-20 text-center">Amenities</h4>
                                    <span class=" m-auto"><?php echo $row['anamatics']; ?></span>
                                </div>
                                <div class="<?php echo ($row['sirena_features'] == '') ? 'd-none': 'd-block' ; ?>">
                                    <h4 class="color-444 AvenirLTStdHeavy text-uppercase fs-25 pb-20 text-center">Sirena Features</h4>
                                    <span class=" m-auto"><?php echo $row['sirena_features']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="project-highlights pb-40 pt-10" id="overview2">
            <div class="container-fluid">
                <div role="tabpanel" class="tab-pane in active AvenirLTStd55Roman_5173 " >
                    <div class="tab-content proj-highlights-section-tab pt-xs-30">
                        <div role="tabpanel" class="tab-pane in active">
                            <div class="d-sm-flex justify-content-around">
                                <div class="<?php echo ($row['sitemap_link'] == '') ? 'd-none': 'd-block' ; ?> col-sm-6">
                                    <h4 class="AvenirLTStdHeavy color-444 fs-25 pb-sm-4 text-center text-uppercase pt-0">Sitemap</h4>
                                    <img class="w-100" src="https://drive.google.com/thumbnail?id=<?php echo $row['sitemap_link']; ?>"  alt="Villa Site Map">
                                </div>
                                <div class="<?php echo ($row['youtube_link'] == '') ? 'd-none': 'd-block' ; ?> col-sm-6 pt-20 pb-15 pt-sm-0">
                                    <h4 class="AvenirLTStdHeavy color-444 fs-25 text-center text-uppercase">Project Video</h4>
                                    <div class="w-100 h-100">
                                        <iframe width="100%" height="100%" src="https://youtube.com/embed/<?php echo $row['youtube_link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php } ?>
    <?php include 'footer.php'; ?>

</body>

</html>