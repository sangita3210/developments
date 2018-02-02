<?php
$hashomeblock1image = (!empty($PAGE->theme->settings->homeblock1image));
$hashomeblock2image = (!empty($PAGE->theme->settings->homeblock2image));
$hashomeblock3image = (!empty($PAGE->theme->settings->homeblock3image));
$hashomeblock1title = (!empty($PAGE->theme->settings->homeblock1));
$hashomeblock2title = (!empty($PAGE->theme->settings->homeblock2));
$hashomeblock3title = (!empty($PAGE->theme->settings->homeblock3));
$hashomeblock1content = (!empty($PAGE->theme->settings->homeblock1content));
$hashomeblock2content = (!empty($PAGE->theme->settings->homeblock2content));
$hashomeblock3content = (!empty($PAGE->theme->settings->homeblock3content));
$hashomeblock1buttontext = (!empty($PAGE->theme->settings->homeblock1buttontext));
$hashomeblock2buttontext = (!empty($PAGE->theme->settings->homeblock2buttontext));
$hashomeblock3buttontext = (!empty($PAGE->theme->settings->homeblock3buttontext));

$homeblock1title = $PAGE->theme->settings->homeblock1;
$homeblock2title = $PAGE->theme->settings->homeblock2;
$homeblock3title = $PAGE->theme->settings->homeblock3;

$homeblock1content = $PAGE->theme->settings->homeblock1content;
$homeblock2content = $PAGE->theme->settings->homeblock2content;
$homeblock3content = $PAGE->theme->settings->homeblock3content;

$homeblock1buttontext = $PAGE->theme->settings->homeblock1buttontext;
$homeblock2buttontext = $PAGE->theme->settings->homeblock2buttontext;
$homeblock3buttontext = $PAGE->theme->settings->homeblock3buttontext;

$homeblock1buttonurl = $PAGE->theme->settings->homeblock1buttonurl;
$homeblock2buttonurl = $PAGE->theme->settings->homeblock2buttonurl;
$homeblock3buttonurl = $PAGE->theme->settings->homeblock3buttonurl;

$homeblock1image = $PAGE->theme->setting_file_url('homeblock1image', 'homeblock1image');
$homeblock2image = $PAGE->theme->setting_file_url('homeblock2image', 'homeblock2image');
$homeblock3image = $PAGE->theme->setting_file_url('homeblock3image', 'homeblock3image');
?>
<?php if($PAGE->theme->settings->usehomeblocks ==1) {?>
<div class="section-heading">
<h2 class="title">Popular Courses</h2>

<p class="intro">You can use this section to promote your courses or any other content. You can add up to 8 blocks lorem ipsum dolor sit amet duis imperdiet nisl ut sem posuere</p>
</div>
							
<div class="row page-row" id="homeblocks">
    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="block-item">
            
            <?php if ($hashomeblock1image) { ?>
            	<img class="img-responsive" src="<?php echo $homeblock1image ?>"  alt="<?php if($hashomeblock1title) {?><?php  echo $homeblock1title ?><?php } ?>" />
            <?php } ?>
                       
            <div class="desc">
            
                <?php if ($hashomeblock1title) {?>
                <h3><small><a href="<?php echo $homeblock1buttonurl ?>"><?php echo $homeblock1title ?></a></small></h3>
                <?php } ?>
                
                <?php if ($hashomeblock1content) {?>
                <p><?php echo $homeblock1content ?></p>
                <?php } ?>
                
                <?php if($hashomeblock1buttontext) {?>
                <p>
                    <a class="btn btn-theme" href="<?php echo $homeblock1buttonurl ?>" >
                    <?php if($hashomeblock1buttontext) { ?>
                    <?php echo $homeblock1buttontext ?>
                    <?php } ?>
                    </a>
                </p>
                <?php } ?>
                
            </div><!--//desc-->
            
        </div><!--//block-item-->
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="block-item">
            
            <?php if ($hashomeblock2image) { ?>
            	<img class="img-responsive" src="<?php echo $homeblock2image ?>"  alt="<?php if($hashomeblock2title) {?><?php  echo $homeblock2title ?><?php } ?>" />
            <?php } ?>
                       
            <div class="desc">
            
                <?php if ($hashomeblock2title) {?>
                <h3><small><a href="<?php echo $homeblock2buttonurl ?>"><?php echo $homeblock2title ?></a></small></h3>
                <?php } ?>
                
                <?php if ($hashomeblock2content) {?>
                <p><?php echo $homeblock2content ?></p>
                <?php } ?>
                
                <?php if($hashomeblock2buttontext) {?>
                <p>
                    <a class="btn btn-theme" href="<?php echo $homeblock2buttonurl ?>" >
                    <?php if($hashomeblock2buttontext) { ?>
                    <?php echo $homeblock2buttontext ?>
                    <?php } ?>
                    </a>
                </p>
                <?php } ?>
                
            </div><!--//desc-->
            
        </div><!--//block-item-->
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="block-item">
            
            <?php if ($hashomeblock3image) { ?>
            	<img class="img-responsive" src="<?php echo $homeblock3image ?>"  alt="<?php if($hashomeblock3title) {?><?php  echo $homeblock3title ?><?php }?>" />
            <?php } ?>
                       
            <div class="desc">
            
                <?php if ($hashomeblock3title) {?>
                <h3><small><a href="<?php echo $homeblock3buttonurl ?>"><?php echo $homeblock3title ?></a></small></h3>
                <?php } ?>
                
                <?php if ($hashomeblock3content) {?>
                <p><?php echo $homeblock3content ?></p>
                <?php } ?>
                
                <?php if($hashomeblock3buttontext) {?>
                <p>
                    <a class="btn btn-theme" href="<?php echo $homeblock3buttonurl ?>" >
                    <?php if($hashomeblock3buttontext) { ?>
                    <?php echo $homeblock3buttontext ?>
                    <?php } ?>
                    </a>
                </p>
                <?php } ?>
                
            </div><!--//desc-->
            
        </div><!--//block-item-->
    </div>
     
</div>
<?php } ?>