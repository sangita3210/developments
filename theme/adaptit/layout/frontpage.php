<?php
$hashiddendock = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('hidden-dock', $OUTPUT));
$hasleftsidebar = (empty($PAGE->theme->settings->layout)) ? false : $PAGE->theme->settings->layout;
$hasanalytics = (empty($PAGE->theme->settings->useanalytics)) ? false : $PAGE->theme->settings->useanalytics;


echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Moodle Theme by 3rd Wave Media | elearning.3rdwavemedia.com" />
    <?php require_once(dirname(__FILE__).'/includes/iosicons.php'); ?>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <?php require_once(dirname(__FILE__).'/includes/glyphicons.php'); ?>
    <?php echo $OUTPUT->standard_head_html() ?>
    <!-- Respond.js IE8 support of media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php if ($hasanalytics) { ?>
    <!-- Start Google Analytics -->
    <?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
    <!-- End Google Analytics -->
    <?php } ?>    
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div class="wrapper">
    <?php require_once(dirname(__FILE__).'/includes/header.php'); ?>
    <?php //require_once(dirname(__FILE__).'/includes/nav.php'); ?>
   
	<div id="pageslide" class="container-fluid"> 
	
	</div>
    <!--<div id="page" class="container">               -->
    <div id="page" class=""> 
		<div class="marketing-wrapper">
        <?php require_once(dirname(__FILE__).'/includes/slideshow.php');?>
         <?php require_once(dirname(__FILE__).'/includes/slide.php');?>
        <?php require_once(dirname(__FILE__).'/includes/aboutus.php');?>
         <?php require_once(dirname(__FILE__).'/includes/service.php');?>
      

           
        </div>
        		
		<!-- <div class="featured-section">
		<div class="container text-center">
			<?php require_once(dirname(__FILE__).'/includes/homeblocks.php');?>
		</div>
		</div> -->
		<div class="container">
			
			<?php require_once(dirname(__FILE__).'/includes/alerts.php');?>    
			<?php require_once(dirname(__FILE__).'/includes/homepromo.php');?>              
			<?php require_once(dirname(__FILE__).'/includes/whyus.php');?>  
                  
			
		</div>
		 <div class="reviews-section">
		<div class="container text-center">
			<?php require_once(dirname(__FILE__).'/includes/testimonials.php'); ?>
		</div>
		</div>
         
		<div class="container" style="margin-top:-100px;">
        <div id="page-content" class="row"> 
			
            <?php if ($hasleftsidebar) { ?>
            <section id="region-main" class="col-md-8 col-sm-12 col-xs-12 pull-right">
            <?php } else { ?>	
            <section id="region-main" class="col-md-8 col-sm-12 col-xs-12">
            <?php } ?>            
                <div class="region-main-inner">
                	<div id="page-navbar" class="clearfix">
                    	<div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
                    	<nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
                	</div>
                    <!-- <?php
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?> -->
                </div><!--//region-main-inner-->
            </section>
            </section>
               

        </div><!--//page-content-->
    
        <?php if (is_siteadmin()) { ?>
    	<!-- <div class="hidden-blocks box box-theme clearfix">

    	    <div class="col-md-12">
            	<h4><i class="fa fa-cog"></i><?php echo get_string('visibleadminonly', 'theme_adaptit') ?></h4>
                <?php
                    echo $OUTPUT->adaptitblocks('hidden-dock');
                ?>
    	    </div>
    	</div> -->

    	<?php } ?>  
    	
		</div>
		
        

    	
    </div><!--//#page-->
    
</div><!--wrapper-->

 
         
       

<footer id="page-footer" class="footer">
	<?php require_once(dirname(__FILE__).'/includes/footer.php'); ?>
</footer>

<?php echo $OUTPUT->standard_end_of_body_html() ?>

</body>
</html>
