<?php
$hastestimonial1image = (!empty($PAGE->theme->settings->testimonial1image));
$hastestimonial2image = (!empty($PAGE->theme->settings->testimonial2image));
$hastestimonial3image = (!empty($PAGE->theme->settings->testimonial3image));
$hastestimonial4image = (!empty($PAGE->theme->settings->testimonial4image));

$hastestimonial1name = (!empty($PAGE->theme->settings->testimonial1name));
$hastestimonial2name = (!empty($PAGE->theme->settings->testimonial2name));
$hastestimonial3name = (!empty($PAGE->theme->settings->testimonial3name));
$hastestimonial4name = (!empty($PAGE->theme->settings->testimonial4name));

$hastestimonial1title = (!empty($PAGE->theme->settings->testimonial1title));
$hastestimonial2title = (!empty($PAGE->theme->settings->testimonial2title));
$hastestimonial3title = (!empty($PAGE->theme->settings->testimonial3title));
$hastestimonial4title= (!empty($PAGE->theme->settings->testimonial4title));

$hastestimonial1content= (!empty($PAGE->theme->settings->testimonial1content));
$hastestimonial2content = (!empty($PAGE->theme->settings->testimonial2content));
$hastestimonial3content = (!empty($PAGE->theme->settings->testimonial3content));
$hastestimonial4content= (!empty($PAGE->theme->settings->testimonial4content));

$testimonial1image = $PAGE->theme->setting_file_url('testimonial1image', 'testimonial1image');
$testimonial2image = $PAGE->theme->setting_file_url('testimonial2image', 'testimonial2image');
$testimonial3image = $PAGE->theme->setting_file_url('testimonial3image', 'testimonial3image');
$testimonial4image = $PAGE->theme->setting_file_url('testimonial4image', 'testimonial4image');

if ($hastestimonial1name ) {
$testimonial1name = $PAGE->theme->settings->testimonial1name;
}
if ($hastestimonial2name ) {
$testimonial2name = $PAGE->theme->settings->testimonial2name;
}
if ($hastestimonial3name ) {
$testimonial3name = $PAGE->theme->settings->testimonial3name;
}
if ($hastestimonial4name ) {
$testimonial4name = $PAGE->theme->settings->testimonial4name;
}

if ($hastestimonial1title) {
$testimonial1title = $PAGE->theme->settings->testimonial1title;
}
if ($hastestimonial2title) {
$testimonial2title = $PAGE->theme->settings->testimonial2title;
}
if ($hastestimonial3title) {
$testimonial3title = $PAGE->theme->settings->testimonial3title;
}
if ($hastestimonial4title) {
$testimonial4title = $PAGE->theme->settings->testimonial4title;
}

if ($hastestimonial1content) {
$testimonial1content = $PAGE->theme->settings->testimonial1content;
}
if ($hastestimonial2content) {
$testimonial2content = $PAGE->theme->settings->testimonial2content;
}
if ($hastestimonial3content) {
$testimonial3content = $PAGE->theme->settings->testimonial3content;
}
if ($hastestimonial4content) {
$testimonial4content = $PAGE->theme->settings->testimonial4content;
}

?>

<?php if($PAGE->theme->settings->usetestimonials ==1) { ?> 
<div class="section-heading">
<h2 class="title">Testimonials</h2>
	<p class="intro">Don't just take our word for it - see what people are saying</p>
</div>
<section class="testimonials">
    <div class="carousel-controls">
        <a class="prev" href="#testimonials-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
        <a class="next" href="#testimonials-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
    </div><!--//carousel-controls-->

    <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
        <div class="carousel-inner">
            <?php if ($hastestimonial1content) {?>
            <div class="item active row">
                <div class="profile-container col-md-2 col-sm-12 col-xs-12 col-md-push-1">
                    <?php if ($hastestimonial1image) {?>
                    <img class="img-responsive profile " src="<?php echo $testimonial1image ?>"  alt="<?php echo $testimonial1name ?>" />
                    <?php } else {?>
                    <img class="img-responsive profile " src="<?php echo $OUTPUT->pix_url('images/default-profile', 'theme'); ?>"  alt="<?php echo $testimonial1name ?>" />
                    <?php } ?>
                    <p class="people"><?php if ($hastestimonial1name ) {?><span class="name"><?php echo $testimonial1name ?></span><br /><?php } ?><?php if ($hastestimonial1title ) {?><span class="title"><?php echo $testimonial1title ?></span><?php } ?></p>  
                </div>
                <div class="quote-container col-md-8 col-sm-12 col-xs-12 col-md-push-1">
                    <blockquote class="quote">                                  
                        <p><i class="fa fa-quote-left"></i><?php echo $testimonial1content ?></p>
                    </blockquote>                            
                </div><!--//quote-container-->                                    
            </div><!--//item-->
            <?php } ?>
            <?php if ($hastestimonial2content) {?>
            <div class="item row">
                <div class="profile-container col-md-2 col-sm-12 col-xs-12 col-md-push-1">
                    <?php if ($hastestimonial2image) {?>
                    <img class="img-responsive profile " src="<?php echo $testimonial2image ?>"  alt="<?php echo $testimonial2name ?>" />
                    <?php } else {?>
                    <img class="img-responsive profile " src="<?php echo $OUTPUT->pix_url('images/default-profile', 'theme'); ?>"  alt="<?php echo $testimonial2name ?>" />
                    <?php } ?>
                    <p class="people"><?php if ($hastestimonial2name ) {?><span class="name"><?php echo $testimonial2name ?></span><br /><?php } ?><?php if ($hastestimonial2title ) {?><span class="title"><?php echo $testimonial2title ?></span><?php } ?></p>  
                </div>
                <div class="quote-container col-md-8 col-sm-12 col-xs-12 col-md-push-1">
                    <blockquote class="quote">                                  
                        <p><i class="fa fa-quote-left"></i><?php echo $testimonial2content ?></p>
                    </blockquote>                            
                </div><!--//quote-container-->                                    
            </div><!--//item-->
            <?php } ?>
            <?php if ($hastestimonial3content) {?>
            <div class="item row">
                <div class="profile-container col-md-2 col-sm-12 col-xs-12 col-md-push-1">
                    <?php if ($hastestimonial3image) {?>
                    <img class="img-responsive profile " src="<?php echo $testimonial3image ?>"  alt="<?php echo $testimonial3name ?>" />
                    <?php } else {?>
                    <img class="img-responsive profile " src="<?php echo $OUTPUT->pix_url('images/default-profile', 'theme'); ?>"  alt="<?php echo $testimonial3name ?>" />
                    <?php } ?>
                    <p class="people"><?php if ($hastestimonial3name ) {?><span class="name"><?php echo $testimonial3name ?></span><br /><?php } ?><?php if ($hastestimonial3title ) {?><span class="title"><?php echo $testimonial3title ?></span><?php } ?></p>  
                </div>
                <div class="quote-container col-md-8 col-sm-12 col-xs-12 col-md-push-1">
                    <blockquote class="quote">                                  
                        <p><i class="fa fa-quote-left"></i><?php echo $testimonial3content ?></p>
                    </blockquote>                            
                </div><!--//quote-container-->                                    
            </div><!--//item-->
            <?php } ?>
            <?php if ($hastestimonial4content) {?>
            <div class="item row">
                <div class="profile-container col-md-2 col-sm-12 col-xs-12 col-md-push-1">
                    <?php if ($hastestimonial4image) {?>
                    <img class="img-responsive profile " src="<?php echo $testimonial4image ?>"  alt="<?php echo $testimonial4name ?>" />
                    <?php } else {?>
                    <img class="img-responsive profile " src="<?php echo $OUTPUT->pix_url('images/default-profile', 'theme'); ?>"  alt="<?php echo $testimonial4name ?>" />
                    <?php } ?>
                    <p class="people"><?php if ($hastestimonial4name ) {?><span class="name"><?php echo $testimonial4name ?></span><br /><?php } ?><?php if ($hastestimonial4title ) {?><span class="title"><?php echo $testimonial4title ?></span><?php } ?></p>  
                </div>
                <div class="quote-container col-md-8 col-sm-12 col-xs-12 col-md-push-1">
                    <blockquote class="quote">                                  
                        <p><i class="fa fa-quote-left"></i><?php echo $testimonial4content ?></p>
                    </blockquote>                            
                </div><!--//quote-container-->                                    
            </div><!--//item-->
            <?php } ?>
            
        </div><!--//carousel-inner-->
    </div><!--//testimonials-carousel-->
    
</section><!--//testimonials-->
<?php } ?>