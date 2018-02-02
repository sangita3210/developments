<?php
global $CFG;
?>
<?php
$hasservicehead = (!empty($PAGE->theme->settings->serviceheadingtext));
$hasaboutdesc = (!empty($PAGE->theme->settings->servicedescfront));

$hasimage1 = (!empty($PAGE->theme->settings->serviceimage1));
$hastitle1 = (!empty($PAGE->theme->settings->blocktitle1));
$hasdesc1 = (!empty($PAGE->theme->settings->blockdesc1));


$hasimage2 = (!empty($PAGE->theme->settings->serviceimage2));
$hastitle2 = (!empty($PAGE->theme->settings->blocktitle2));
$hasdesc2 = (!empty($PAGE->theme->settings->blockdesc2));

$hasimage3 = (!empty($PAGE->theme->settings->serviceimage3));
$hastitle3 = (!empty($PAGE->theme->settings->blocktitle3));
$hasdesc3 = (!empty($PAGE->theme->settings->blockdesc3));


$hasimage4 = (!empty($PAGE->theme->settings->serviceimage4));
$hastitle4 = (!empty($PAGE->theme->settings->blocktitle4));
$hasdesc4 = (!empty($PAGE->theme->settings->blockdesc4));

if($hasservicehead) {
    $heading = $PAGE->theme->settings->serviceheadingtext;
}
if($hasaboutdesc) {
    $description = $PAGE->theme->settings->servicedescfront;
}
/*1st block checking*/
if($hasimage1) {
    $image1 =$PAGE->theme->setting_file_url('serviceimage1', 'serviceimage1');
}
if($hastitle1) {
    $title1 = $PAGE->theme->settings->blocktitle1;
}
if($hasdesc1) {
    $desc1 = $PAGE->theme->settings->blockdesc1;
}

/*2nd block checking*/
if($hasimage2) {
    $image2 =$PAGE->theme->setting_file_url('serviceimage2', 'serviceimage2');
}
if($hastitle2) {
    $title2 = $PAGE->theme->settings->blocktitle2;
}
if($hasdesc2) {
    $desc2 = $PAGE->theme->settings->blockdesc2;
}

/*3rd block checking*/
if($hasimage3) {
    $image3 =$PAGE->theme->setting_file_url('serviceimage3', 'serviceimage3');
}
if($hastitle3) {
    $title3 = $PAGE->theme->settings->blocktitle3;
}
if($hasdesc3) {
    $desc3 = $PAGE->theme->settings->blockdesc3;
}
/*4th block checking*/
if($hasimage4) {
    $image4 =$PAGE->theme->setting_file_url('serviceimage4', 'serviceimage4');
}
if($hastitle4) {
    $title4 = $PAGE->theme->settings->blocktitle4;
}
if($hasdesc4) {
    $desc4 = $PAGE->theme->settings->blockdesc4;
}
?>




<div id="services">
		<div class="container">
			<div class="center">
                <div class="col-md-6 col-md-offset-3">
                 <?php if($hasservicehead) { ?><h2><?php echo $heading;?></h2><?php }?>
                    <hr>
                 <?php if($hasaboutdesc) { ?><p class="lead"><?php echo $description;?></p><?php } ?></div>
			</div>
		</div>
		<div class="container">
			<div class="text-center">
                <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <?php if($hasimage1) { ?>
                    <img src="<?php echo $image1 ;?>" style="width:40%;height:30%;" >
                    <?php } ?>
                    <?php if($hastitle1) { ?><h3><?php echo $title1;?> </h3><?php } ?>
                    <?php if($hasdesc1) { ?><p class="lead"><?php echo $desc1;?></p><?php }?>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <?php if($hasimage2) { ?><img src="<?php echo $image2;?>" style="width:40%;height:30%;" ><?php } ?>
                <?php if($hastitle2) {?><h3><?php echo $title2;?></h3><?php } ?>
                <?php if($hasdesc2) { ?><p class="lead"><?php echo $desc2;?></p><?php } ?>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                <?php if($hasimage3) { ?><img src="<?php echo $image3;?>" style="width:40%;height:30%;" ><?php } ?>
                <?php if($hastitle3) { ?><h3><?php echo $title3;?></h3><?php } ?>
                <?php if($hasdesc3) { ?><p class="lead"><?php echo $desc3;?></p><?php } ?>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                <?php if($hasimage4) { ?><img src="<?php echo $image4;?>" style="width:40%;height:30%;" ><?php } ?>
                <?php if($hastitle4) { ?><h3><?php echo $title4;?></h3><?php } ?>
                <?php if($hasdesc4) { ?><p class="lead"><?php echo $desc4;?></p><?php } ?>
				</div>
            </div>
        </div>
</div>
