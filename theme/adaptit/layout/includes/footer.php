<?php
$hascopyright = (empty($PAGE->theme->settings->copyright)) ? false : $PAGE->theme->settings->copyright;
$hasfooterwidget = (empty($PAGE->theme->settings->footerwidget)) ? false : $PAGE->theme->settings->footerwidget;

/* Footer blocks settings */
$hasfooterblocks = (empty($PAGE->theme->settings->enablefooterblocks)) ? false : $PAGE->theme->settings->enablefooterblocks;
$hasfooterblock1 = (empty($PAGE->theme->settings->footerblock1)) ? false : $PAGE->theme->settings->footerblock1;
$hasfooterblock2 = (empty($PAGE->theme->settings->footerblock2)) ? false : $PAGE->theme->settings->footerblock2;
$hasfooterblock3 = (empty($PAGE->theme->settings->footerblock3)) ? false : $PAGE->theme->settings->footerblock3;

$footerblock1 = $PAGE->theme->settings->footerblock1;
$footerblock2 = $PAGE->theme->settings->footerblock2;
$footerblock3 = $PAGE->theme->settings->footerblock3;

$footerwidget = $PAGE->theme->settings->footerwidget;

?>
	<div class="footer-content"> 
        <div class="container">
            <?php if ($hasfooterblocks) {?>
            <div class="row footerblocks">                
                <?php if ($hasfooterblock1) {?>
                <div class="footer-col col-md-6 col-sm-12">
                    <div class="footer-col-inner">
                        <?php echo $footerblock1 ?>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <?php }?>
                <?php if ($hasfooterblock2) {?>
                <div class="footer-col col-md-3 col-sm-12">
                    <div class="footer-col-inner">
                        <?php echo $footerblock2 ?>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col--> 
                <?php }?>
                <?php if ($hasfooterblock3) {?>
                <div class="footer-col col-md-3 col-sm-12">
                    <div class="footer-col-inner">
                        <?php echo $footerblock3 ?>
                    </div><!--//footer-col-inner-->            
                </div><!--//foooter-col-->  
            <?php }?> 
            </div>  
            <?php }?>  
            <!--<p class="footerhead">Connect with us</p>
            <p class="helplink">
                <?php if ($hastwitter) { ?>
                    <a class="sociallogo" href="<?php echo $twitter ?>"><i class="fa fa-twitter"></i></a>
                    <?php } ?>
                    <?php if ($hasfacebook) { ?>
                    <a class="sociallogo" href="<?php echo $facebook ?>"><i class="fa fa-facebook"></i></a>
                    <?php } ?>
                    <?php if ($hasgoogleplus) { ?>
                    <a class="sociallogo" href="<?php echo $googleplus ?>"><i class="fa fa-google-plus"></i></a>
                    <?php } ?>
                    <?php if ($haslinkedin) { ?>
                    <a class="sociallogo" href="<?php echo $linkedin ?>"><i class="fa fa-linkedin"></i></a>
                    <?php } ?>
                    <?php if ($hasskype) { ?>
                    <a class="sociallogo" href="<?php echo 'skype:'.$skype.'?call' ?>"><i class="fa fa-skype"></i></a>
                    <?php } ?>
                    <?php if ($hasyoutube) { ?>
                    <a class="sociallogo" href="<?php echo $youtube ?>"><i class="fa fa-youtube"></i></a>
                    <?php } ?>
                    <?php if ($hasflickr) { ?>
                    <a class="sociallogo" href="<?php echo $flickr ?>"><i class="fa fa-flickr"></i></a>
                    <?php } ?>
                    <?php if ($hasinstagram) { ?>
                    <a class="sociallogo" href="<?php echo $instagram ?>"><i class="fa fa-instagram"></i></a>
                    <?php } ?>
                    <?php if ($haspinterest) { ?>
                    <a class="sociallogo" href="<?php echo $pinterest ?>"><i class="fa fa-pinterest"></i></a>
                    <?php } ?>
                    
                    <?php if ($hasrss) { ?>   
                    <a class="sociallogo" href="<?php echo $rss ?>"><i class="fa fa-rss"></i></a>  
                    <?php } ?> 
            </p>-->
            <?php if ($hasfooterwidget) {?>
            <div class="footerwidget"> <?php //echo $footerwidget ?></div>
            <?php }?>  
            
        </div>    
	      
    </div>
	<div class="bottom-bar">
        <div class="container">
            <div class="row">
                <?php if ($hascopyright) {
                echo '<p class="helplink text-center">&copy; '.date("Y").' '.$hascopyright.'</p>';
                } ?>
                
               
            </div><!--//row-->
        </div><!--//container-->
    </div>
	

