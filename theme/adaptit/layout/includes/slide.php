<?php
global $CFG;
?>
<?php

/*checking condtion for images here */

$hasslide1 = (!empty($PAGE->theme->settings->slide1));
$hasslide1image = (!empty($PAGE->theme->settings->slide1andtextimage));
$hasside1heading = (!empty($PAGE->theme->settings->slide1andtextheading));
$hasslide1text = (!empty($PAGE->theme->settings->slide1andtextdesc));
$hasslide1url = (!empty($PAGE->theme->settings->slide1andtexturl));

$hasslide2 = (!empty($PAGE->theme->settings->slide2));
$hasslide2image = (!empty($PAGE->theme->settings->slide2andtextimage));
$hasside2heading = (!empty($PAGE->theme->settings->slide2andtextheading));
$hasslide2text = (!empty($PAGE->theme->settings->slide2andtextdesc));
$hasslide2url = (!empty($PAGE->theme->settings->slide2andtexturl));

$hasslide3 = (!empty($PAGE->theme->settings->slide3));
$hasslide3image = (!empty($PAGE->theme->settings->slide3andtextimage));
$hasside3heading = (!empty($PAGE->theme->settings->slide3andtextheading));
$hasslide3text = (!empty($PAGE->theme->settings->slide3andtextdesc));
$hasslide3url = (!empty($PAGE->theme->settings->slide3andtexturl));

// $hasslideshowtext = ($hasslide1image || $hasslide2image || $hasslide3image);

/*slide1 setting */

if($hasslide1) {
    $slide1 = $PAGE->theme->settings->slide1;
}

if($hasslide1image) {
    $slide1andtextimage = $PAGE->theme->setting_file_url('slide1andtextimage', 'slide1andtextimage');
}

if($hasside1heading) {
  $slide1andtextheading = $PAGE->theme->settings->slide1andtextheading;  
}

if($hasslide1text) {
   $slide1andtextdesc = $PAGE->theme->settings->slide1andtextdesc;
}

if($hasslide1url) {
    $slide1andtexturl = $PAGE->theme->settings->slide1andtexturl;
}

/*slide2 setting */
if($hasslide2) {
    $slide2 = $PAGE->theme->settings->slide2;
}

if($hasslide2image) {
    $slide2andtextimage = $PAGE->theme->setting_file_url('slide2andtextimage', 'slide2andtextimage');
}

if($hasside2heading) {
  $slide2andtextheading = $PAGE->theme->settings->slide2andtextheading;  
}

if($hasslide2text) {
    $slide2andtextdesc = $PAGE->theme->settings->slide2andtextdesc;
}

if($hasslide2url) {
    $slide2andtexturl = $PAGE->theme->settings->slide2andtexturl;
}

/* slide3 setting*/

if($hasslide3) {
    $slide3 = $PAGE->theme->settings->slide3;
}

if($hasslide3image) {
    $slide3andtextimage = $PAGE->theme->setting_file_url('slide3andtextimage', 'slide3andtextimage');
}

if($hasside3heading) {
  $slide3andtextheading = $PAGE->theme->settings->slide3andtextheading;  
}

if($hasslide3text) {
    $slide3andtextdesc = $PAGE->theme->settings->slide3andtextdesc;
}

if($hasslide3url) {
    $slide3andtexturl = $PAGE->theme->settings->slide3andtexturl;
}
?>

<?php if($PAGE->theme->settings->useslideandtext1 == 1) { ?>
    <div class="container" >
     <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
             <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
             
             </ol>

    <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php if($hasslide1image) { ?>
                <div class="item active">
                    <div class="col-md-14">
                        <div class="col-md-8" >                        
                                <img src="<?php echo $slide1andtextimage ?>" alt=" " width="100%" height="345">
                        </div>
                        <div class="col-md-4" >
                        <h3 style="font-size: 16px; font-family: calibri;"><?php echo $slide1andtextheading ?></h3><hr>
                                                          
                               
                                    <?php if($hasslide1text) { ?>
                                     <p style="font-size: 14px;color:#000;display: block;line-height: 154%; font-family: arial;"><?php echo $slide1andtextdesc ?></p><br>
                                     <?php } ?>
                                        <div class="col-sm-offset-3"> 
                                        <?php if($slide1andtexturl) { ?>                                        
                                            <button type="submit" class="btn btn-primary" style="background-color:#000;"><a href="<?php echo $slide1andtexturl ?>" style="color:#fff;">Click Here</a></button>     
                                            <?php } ?>                                      
                                        </div>
                          
                               
                          
                        </div>
                    </div>
                </div> 
                <?php } ?>
                 
                <?php if($hasslide2image) { ?>
                <div class="item">
                    <div class="col-md-14">
                        <div class="col-md-8">
                            <img src="<?php echo $slide2andtextimage ?>" alt=" " width="100%" height="345">
                        </div>
                        <div class="col-md-4">
                            <h3 style="font-size: 16px; font-family: calibri;"><?php echo $slide2andtextheading ?></h3><hr>
                            
                                 <?php if($slide2andtextdesc) { ?>
                                    <p style="font-size: 14px;color:#000;display: block;line-height: 154%; font-family:arial;" >
                                    <?php echo $slide2andtextdesc ?></p>
                                <?php } ?>
                                         <div class="col-sm-offset-3">
                                         <?php if($slide2andtexturl) { ?>
                                            <a href="<?php echo $slide2andtexturl ?>">
                                                <button type="submit" class="btn btn-primary" style="background-color:#000;">Click Here</button>
                                            </a>
                                        <?php } ?>
                                        </div>

                              
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <?php  if($slide3andtextimage) { ?>
                     <div class="item">
                        <div class="col-md-14">
                            <div class="col-md-8">
                            <?php if($slide3andtextimage) { ?>
                                <img src="<?php echo $slide3andtextimage ?>" alt="Flower" width="100%" height="345">
                            <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <h3 style="font-size: 16px; font-family:calibri;"><?php echo $slide3andtextheading ?></h3><hr>
                                
                                     <?php if($slide3andtextdesc) { ?>
                                        <p style="font-size: 14px;color:#000;display: block;line-height:200%; font-family: arial;"><?php echo $slide3andtextdesc ?></p>
                                    <?php } ?>
                                             <div class="col-sm-offset-3">
                                             <?php if($slide3andtexturl) { ?>
                                                <a href="<?php echo $slide3andtexturl ?>" style="color:#fff;">
                                                    <button type="submit" class="btn btn-primary" style="background-color:#000;">Click Here</button>
                                                </a>
                                            <?php } ?>
                                            </div>
                                   
                            </div>
                        </div>
                     </div>
                <?php } ?>
             </div>
        </div>
    </div>
    <br>
    <?php }?>

