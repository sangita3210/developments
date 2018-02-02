<?php
$hasalert1 = (empty($PAGE->theme->settings->enable1alert)) ? false : $PAGE->theme->settings->enable1alert;
$hasalert2 = (empty($PAGE->theme->settings->enable2alert)) ? false : $PAGE->theme->settings->enable2alert;
$hasalert3 = (empty($PAGE->theme->settings->enable3alert)) ? false : $PAGE->theme->settings->enable3alert;
$alertinfo = '<i class="fa fa-info-circle"></i>';
$alertwarning = '<i class="fa fa-warning"></i>';
$alertsuccess = '<i class="fa fa-bullhorn"></i>';
?>

<?php if ($hasalert1) { ?>  
<div class="alert-dismissable alert alert-<?php echo $PAGE->theme->settings->alert1type ?>">  
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php 
	if ($PAGE->theme->settings->alert1type == 'info') {
		$alert1icon = $alertinfo;
    } else if ($PAGE->theme->settings->alert1type == 'error') {
    	$alert1icon = $alertwarning;
   	} else {
   		$alert1icon = $alertsuccess;
   	} 
    $alert1title = 'alert1title';
    $alert1text = 'alert1text';
   	echo $alert1icon.'<span class="title">'.$PAGE->theme->settings->$alert1title.'</span>&nbsp;'.$PAGE->theme->settings->$alert1text; ?> 
</div><!--//alert1-->
<?php } ?>

<?php if ($hasalert2) { ?>  
<div class="alert-dismissable alert alert-<?php echo $PAGE->theme->settings->alert2type ?>">  
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	<?php 
	if ($PAGE->theme->settings->alert2type == 'info') {
		$alert2icon = $alertinfo;
    } else if ($PAGE->theme->settings->alert2type == 'error') {
    	$alert2icon = $alertwarning;
   	} else {
   		$alert2icon = $alertsuccess;
   	} 
    $alert2title = 'alert2title';
    $alert2text = 'alert2text';
   	echo $alert2icon.'<span class="title">'.$PAGE->theme->settings->$alert2title.'</span>&nbsp;'.$PAGE->theme->settings->$alert2text; ?> 
</div><!--//alert2-->
<?php } ?>

<?php if ($hasalert3) { ?>  
<div class="alert-dismissable alert alert-<?php echo $PAGE->theme->settings->alert3type ?>">  
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	<?php 
	if ($PAGE->theme->settings->alert3type == 'info') {
		$alert3icon = $alertinfo;
    } else if ($PAGE->theme->settings->alert3type == 'error') {
    	$alert3icon = $alertwarning;
   	} else {
   		$alert3icon = $alertsuccess;
   	} 
    $alert3title = 'alert3title';
    $alert3text = 'alert3text';
   	echo $alert3icon.'<span class="title">'.$PAGE->theme->settings->$alert3title.'</span>&nbsp;'.$PAGE->theme->settings->$alert3text; ?> 
</div><!--//alert3-->
<?php } ?>