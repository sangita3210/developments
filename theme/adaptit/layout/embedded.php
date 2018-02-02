<?php 
$hasanalytics = (empty($PAGE->theme->settings->useanalytics)) ? false : $PAGE->theme->settings->useanalytics;
echo $OUTPUT->doctype();
 ?>
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
    <div id="page">
        <div id="page-content" class="clearfix">
            <?php echo $OUTPUT->main_content(); ?>
        </div>
    </div>
</div><!--//wrapper-->
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>