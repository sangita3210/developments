<?php
global $CFG;
?>
<?php
/*checking condtion for images here */
$hasaboutheading = (!empty($PAGE->theme->settings->headingtext));
$hasaboutdesc = (!empty($PAGE->theme->settings->aboutusdescription));

/*progress bar value checking here */

$hasprogressbar1 = (!empty($PAGE->theme->settings->progressbar1));
$hasprogressbartext1 = (!empty($PAGE->theme->settings->progressbartext1));

$hasprogressbar2 = (!empty($PAGE->theme->settings->progressbar2));
$hasprogressbartext2 = (!empty($PAGE->theme->settings->progressbartext2));

$hasprogressbar3 = (!empty($PAGE->theme->settings->progressbar3));
$hasprogressbartext3 = (!empty($PAGE->theme->settings->progressbartext3));

$hasprogressbar4 = (!empty($PAGE->theme->settings->progressbar4));
$hasprogressbartext4 = (!empty($PAGE->theme->settings->progressbartext4));

/*Accordion value Checking here*/
$hasaccheading1 = (!empty($PAGE->theme->settings->accordionheading1));
$hasaccordiontitle1 = (!empty($PAGE->theme->settings->accordiontitle1));
$hasaccordionimage1 = (!empty($PAGE->theme->settings->accordion1));
$hasaccordiondesc1 = (!empty($PAGE->theme->settings->accordiondesc1));

$hasaccheading2 = (!empty($PAGE->theme->settings->accordionheading2));
$hasaccordiontitle2 = (!empty($PAGE->theme->settings->accordiontitle2));
$hasaccordionimage2 = (!empty($PAGE->theme->settings->accordion2));
$hasaccordiondesc2 = (!empty($PAGE->theme->settings->accordiondesc2));

$hasaccheading3 = (!empty($PAGE->theme->settings->accordionheading3));
$hasaccordiontitle3 = (!empty($PAGE->theme->settings->accordiontitle3));
$hasaccordionimage3 = (!empty($PAGE->theme->settings->accordion3));
$hasaccordiondesc3 = (!empty($PAGE->theme->settings->accordiondesc3));

$hasaccheading4 = (!empty($PAGE->theme->settings->accordionheading4));
$hasaccordiontitle4 = (!empty($PAGE->theme->settings->accordiontitle4));
$hasaccordionimage4 = (!empty($PAGE->theme->settings->accordion4));
$hasaccordiondesc4 = (!empty($PAGE->theme->settings->accordiondesc4));
 
if($hasaboutheading) {
    $aboutheading = $PAGE->theme->settings->headingtext;
}

if($hasaboutdesc) {
    $description = $PAGE->theme->settings->aboutusdescription;
}

if($hasprogressbar1) {
    $percentage1 = $PAGE->theme->settings->progressbar1;
}

if($hasprogressbartext1) {
    $progresstext1 = $PAGE->theme->settings->progressbartext1;
}


if($hasprogressbar2) {
    $percentage2 = $PAGE->theme->settings->progressbar2;
}

if($hasprogressbartext2) {
    $progresstext2 = $PAGE->theme->settings->progressbartext2;
}


if($hasprogressbar3) {
    $percentage3 = $PAGE->theme->settings->progressbar3;
}

if($hasprogressbartext3) {
    $progresstext3 = $PAGE->theme->settings->progressbartext3;
}

if($hasprogressbar4) {
    $percentage4 = $PAGE->theme->settings->progressbar4;
}

if($hasprogressbartext4) {
    $progresstext4 = $PAGE->theme->settings->progressbartext4;
}
/*condition for accordion*/
if($hasaccheading1) {
    $accheading1 = $PAGE->theme->settings->accordionheading1;
}
if($hasaccordiontitle1) {
    $acctitle1 = $PAGE->theme->settings->accordiontitle1;
}

if($hasaccordionimage1) {
    $accordionfirstimage = $PAGE->theme->setting_file_url('accordion1', 'accordion1');
}/*
if($hasaccordionimage1) {
    $accimage1 = $PAGE->theme->setting_file_url('accordionimage1', 'accordionimage1');
}*/
if($hasaccordiondesc1) {
    $accdesc1 = $PAGE->theme->settings->accordiondesc1;
}
/*accordion2*/
if($hasaccheading2) {
    $accheading2 = $PAGE->theme->settings->accordionheading2;
}
if($hasaccordiontitle2) {
    $acctitle2 = $PAGE->theme->settings->accordiontitle2;
}

if($hasaccordionimage2) {
    $accordionfirstimage2 = $PAGE->theme->setting_file_url('accordion2', 'accordion2');
}
if($hasaccordiondesc2) {
    $accdesc2 = $PAGE->theme->settings->accordiondesc2;
}
/*accordion 3*/
if($hasaccheading3) {
    $accheading3 = $PAGE->theme->settings->accordionheading3;
}
if($hasaccordiontitle3) {
    $acctitle3 = $PAGE->theme->settings->accordiontitle3;
}
if($hasaccordionimage3) {
    $accordionfirstimage3 = $PAGE->theme->setting_file_url('accordion3', 'accordion3');
}
if($hasaccordiondesc3) {
    $accdesc3 = $PAGE->theme->settings->accordiondesc3;
}
/*accordion 4*/
if($hasaccheading4) {
    $accheading4 = $PAGE->theme->settings->accordionheading4;
}
if($hasaccordiontitle4) {
    $acctitle4 = $PAGE->theme->settings->accordiontitle4;
}
if($hasaccordionimage4) {
    $accordionfirstimage4 = $PAGE->theme->setting_file_url('accordion4', 'accordion4');
}
if($hasaccordiondesc4) {
    $accdesc4 = $PAGE->theme->settings->accordiondesc4;
}

?>
	<section id="about">
		<div class="container">
			<div class="center">
                <div class="col-md-6 col-md-offset-3">
                <?php if($hasaboutheading) {?><h2><?php echo $aboutheading ;?></h2><?php }?>
                    <hr>
                <?php if($hasaboutdesc) {?><p class="lead"><?php echo $description;?></p><?php }?>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" 
                    aria-valuemin="0" aria-valuemax="100" <?php if($hasprogressbar1) {?>style="width:<?php echo $percentage1;?>%"> 
                    <?php echo $percentage1;?><?php }?>% -<?php if($hasprogressbartext1) {?><?php echo $progresstext1;?><?php }?>
                     </div>
					</div>
					<div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" 
                    aria-valuemin="0" aria-valuemax="100"<?php if($hasprogressbar2){?> style="width:<?php echo $percentage2;?>%">
                    <?php echo $percentage2;?><?php }?>% -<?php if($hasprogressbartext2) {?> <?php echo $progresstext2;?><?php }?>
					  </div>
					</div>
					<div class="progress progress-striped active">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100"<?php if($hasprogressbar3) {?> style="width:<?php echo $percentage3;?>%">
                                 <?php echo $percentage3;?><?php }?>% -<?php if($hasprogressbartext3) {?><?php echo $progresstext3;?><?php }?>
					  </div>
					</div>
					<div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                                aria-valuemin="0" aria-valuemax="100"<?php if($hasprogressbar4) {?> style="width:<?php echo $percentage4;?>%">
                                <?php echo $percentage4;?><?php }?>% -<?php if($hasprogressbartext4) {?><?php echo $progresstext4;?><?php }?>
					  </div>
					</div>
                </div><!--/.col-sm-6-->

                <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="accordion">
                        <div class="panel-group" id="accordion1">
                          <div class="panel panel-default">
                            <div class="panel-heading active">
                              <h3 class="panel-title">
                                <?php if($hasaccheading1) {?>    
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                <?php echo $accheading1;?>
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                                <?php }?>
                              </h3>
                            </div>

                            <div id="collapseOne1" class="panel-collapse collapse in">
                              <div class="panel-body">
                                  <div class="media accordion-inner">
                                  <?php if($hasaccordionimage1) {?> <div class="pull-left">
                                            <img class="img-responsive" src="<?php echo $accordionfirstimage;?>" style="width:100%;height:20%;">
                                            </div><?php } ?>
                                        <div class="media-body">
                                        <?php if($hasaccordiontitle1) {?> <h4><?php echo $acctitle1;?></h4><?php }?>
                                        <?php if($hasaccordiondesc1) {?> <p><?php echo $accdesc1;?></p><?php }?>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <?php if($hasaccheading2) {?>
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                  <?php echo $accheading2;?>
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a><?php } ?>
                              </h3>
                            </div>
                            <div id="collapseTwo1" class="panel-collapse collapse">
								<div class="panel-body">
                                  <div class="media accordion-inner">
                                  <?php if($hasaccordionimage2){ ?><div class="pull-left">
                                            <img class="img-responsive" src="<?php echo $accordionfirstimage2;?>" style="width:100%;height:20%;">
                                            </div><?php } ?>
                                        <div class="media-body">
                                        <?php if($hasaccordiontitle2) {?><h4><?php echo $acctitle2;?></h4><?php } ?>
                                        <?php if($hasaccordiondesc2) {?><p><?php echo $accdesc2;?></p><?php } ?>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                               <?php if($hasaccheading3){?> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
                                  <?php echo $accheading3;?>
                                  <i class="fa fa-angle-right pull-right"></i>
                                      </a><?php }?>
                              </h3>
                            </div>
                            <div id="collapseThree1" class="panel-collapse collapse">
                              <div class="panel-body">
                                  <div class="media accordion-inner">
                                  <?php if($hasaccordionimage3) {?> <div class="pull-left">
                                            <img class="img-responsive" src="<?php echo $accordionfirstimage3;?>" style="width:100%;height:20%;">
                                            </div><?php }?>
                                        <div class="media-body">
                                        <?php if($hasaccordiontitle3) {?><h4><?php echo $acctitle3;?></h4><?php }?>
                                        <?php if($hasaccordiondesc3) {?><p><?php echo $accdesc3;?></p><?php }?>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                    
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                              <?php if($hasaccheading4) {?><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1">
                                <?php echo $accheading4;?>
                                  <i class="fa fa-angle-right pull-right"></i>
                                      </a><?php } ?>
                              </h3>
                            </div>
                            <div id="collapseFour1" class="panel-collapse collapse">
								<div class="panel-body">
                                  <div class="media accordion-inner">
                                  <?php if($hasaccordionimage4) { ?> <div class="pull-left">
                                            <img class="img-responsive" src="<?php echo $accordionfirstimage4;?>" style="width:100%;height:20%;">
                                            </div><?php }?>
                                        <div class="media-body">
                                        <?php if($hasaccordiontitle4) {?><h4><?php echo $acctitle4;?></h4><?php }?>
                                        <?php if($hasaccordiondesc4) {?><p><?php echo $accdesc4;?></p><?php }?>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div><!--/#accordion1-->
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#about-->
	
	
			
	



