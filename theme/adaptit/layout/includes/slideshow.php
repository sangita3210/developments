<?php
$hasslide1 = (!empty($PAGE->theme->settings->slide1));
$hasslide1image = (!empty($PAGE->theme->settings->slide1image));
$hasslide1caption = (!empty($PAGE->theme->settings->slide1caption));
$hasslide1url = (!empty($PAGE->theme->settings->slide1url));
$hasslide2 = (!empty($PAGE->theme->settings->slide2));
$hasslide2image = (!empty($PAGE->theme->settings->slide2image));
$hasslide2caption = (!empty($PAGE->theme->settings->slide2caption));
$hasslide2url = (!empty($PAGE->theme->settings->slide2url));
$hasslide3 = (!empty($PAGE->theme->settings->slide3));
$hasslide3image = (!empty($PAGE->theme->settings->slide3image));
$hasslide3caption = (!empty($PAGE->theme->settings->slide3caption));
$hasslide3url = (!empty($PAGE->theme->settings->slide3url));
$hasslide4 = (!empty($PAGE->theme->settings->slide4));
$hasslide4image = (!empty($PAGE->theme->settings->slide4image));
$hasslide4caption = (!empty($PAGE->theme->settings->slide4caption));
$hasslide4url = (!empty($PAGE->theme->settings->slide4url));
$hasslideshow = ($hasslide1image||$hasslide2image||$hasslide3image||$hasslide4image);


/* Slide1 settings */

if ($hasslide1) {
    $slide1 = $PAGE->theme->settings->slide1;
}
if ($hasslide1image) {
    $slide1image = $PAGE->theme->setting_file_url('slide1image', 'slide1image');
}
if ($hasslide1caption) {
    $slide1caption = $PAGE->theme->settings->slide1caption;
}
if ($hasslide1url) {
    $slide1url = $PAGE->theme->settings->slide1url;
}

/* slide2 settings */
if ($hasslide2) {
    $slide2 = $PAGE->theme->settings->slide2;
}
if ($hasslide2image) {
    $slide2image = $PAGE->theme->setting_file_url('slide2image', 'slide2image');
}
if ($hasslide2caption) {
    $slide2caption = $PAGE->theme->settings->slide2caption;
}
if ($hasslide2url) {
    $slide2url = $PAGE->theme->settings->slide2url;
}

/* slide3 settings */
if ($hasslide3) {
    $slide3 = $PAGE->theme->settings->slide3;
}
if ($hasslide3image) {
    $slide3image = $PAGE->theme->setting_file_url('slide3image', 'slide3image');
}
if ($hasslide3caption) {
    $slide3caption = $PAGE->theme->settings->slide3caption;
}
if ($hasslide3url) {
    $slide3url = $PAGE->theme->settings->slide3url;
}

/* slide4 settings */
if ($hasslide4) {
    $slide4 = $PAGE->theme->settings->slide4;
}
if ($hasslide4image) {
    $slide4image = $PAGE->theme->setting_file_url('slide4image', 'slide4image');
}
if ($hasslide4caption) {
    $slide4caption = $PAGE->theme->settings->slide4caption;
}
if ($hasslide4url) {
    $slide4url = $PAGE->theme->settings->slide4url;
}


?>

<?php if ($hasslideshow && $PAGE->theme->settings->useslideshow == 1) { ?>
    <div class="container">
        <div class="row">
            <div id="promo-slider" class="slider flexslider" >
                <ul class="slides">
                    <?php if ($hasslide1image) { ?>
                    <li>
                        <?php if ($hasslide1url) { ?><a href="<?php echo $slide1url ?>"><?php } ?>
                        <img class="img-responsive" src="<?php echo $slide1image ?>" alt="<?php echo $slide1 ?>" />
                        <?php if ($hasslide1url) { ?></a><?php } ?>
                        <p class="flex-caption">
                            <?php if ($hasslide1) { ?>
                            <span class="main" ><?php echo $slide1 ?></span>
                            <?php } ?>
                            <?php if ($hasslide1caption) { ?>
                            <br />
                            <span class="secondary clearfix"><?php echo $slide1caption ?></span>
                            <?php } ?>
                        </p>
                    </li>
                    <?php } ?> 
                    <?php if ($hasslide2image) { ?>
                    <li>
                        <?php if ($hasslide2url) { ?><a href="<?php echo $slide2url ?>"><?php } ?>
                        <img  class="img-responsive" src="<?php echo $slide2image ?>" alt="<?php echo $slide2 ?>" />
                        <?php if ($hasslide2url) { ?></a><?php } ?>
                        <p class="flex-caption">
                            <?php if ($hasslide2) { ?>
                            <span class="main" ><?php echo $slide2 ?></span>
                            <?php } ?>
                            <?php if ($hasslide2caption) { ?>
                            <br />
                            <span class="secondary clearfix" ><?php echo $slide2caption ?></span>
                            <?php } ?>
                        </p>
                    </li>
                    <?php } ?> 
                    <?php if ($hasslide3image) { ?>
                    <li>
                        <?php if ($hasslide3url) { ?><a href="<?php echo $slide3url ?>"><?php } ?>
                        <img class="img-responsive" src="<?php echo $slide3image ?>" alt="<?php echo $slide3 ?>" />
                        <?php if ($hasslide3url) { ?></a><?php } ?>
                        <p class="flex-caption">
                            <?php if ($hasslide3) { ?>
                            <span class="main" ><?php echo $slide3 ?></span>
                            <?php } ?>
                            <?php if ($hasslide3caption) { ?>
                            <br />
                            <span class="secondary clearfix" ><?php echo $slide3caption ?></span>
                            <?php } ?>
                        </p>
                    </li>
                    <?php } ?> 
                    <?php if ($hasslide4image) { ?>
                    <li>
                        <?php if ($hasslide4url) { ?><a href="<?php echo $slide4url ?>"><?php } ?>
                        <img class="img-responsive" src="<?php echo $slide4image ?>" alt="<?php echo $slide4 ?>" />
                        <?php if ($hasslide4url) { ?></a><?php } ?>
                        <p class="flex-caption">
                            <?php if ($hasslide4) { ?>
                            <span class="main" ><?php echo $slide4 ?></span>
                            <?php } ?>
                            <?php if ($hasslide4caption) { ?>
                            <br />
                            <span class="secondary clearfix" ><?php echo $slide4caption ?></span>
                            <?php } ?>
                        </p>
                    </li>
                    <?php } ?> 
                </ul><!--//slides-->
            </div><!--//flexslider-->
        </div>
    </div>
<?php } ?>