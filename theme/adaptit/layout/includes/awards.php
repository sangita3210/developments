<?php
$hasaward1image = (!empty($PAGE->theme->settings->award1image));
$hasaward2image = (!empty($PAGE->theme->settings->award2image));
$hasaward3image = (!empty($PAGE->theme->settings->award3image));
$hasaward4image = (!empty($PAGE->theme->settings->award4image));
$hasaward5image = (!empty($PAGE->theme->settings->award5image));
$hasaward6image = (!empty($PAGE->theme->settings->award6image));
$hasawardimages = ($hasaward1image||$hasaward2image||$hasaward3image||$hasaward4image||$hasaward5image||$hasaward6image);

$hasaward1url = (!empty($PAGE->theme->settings->award1url));
$hasaward2url = (!empty($PAGE->theme->settings->award2url));
$hasaward3url = (!empty($PAGE->theme->settings->award3url));
$hasaward4url = (!empty($PAGE->theme->settings->award4url));
$hasaward5url = (!empty($PAGE->theme->settings->award5url));
$hasaward6url = (!empty($PAGE->theme->settings->award6url));


$award1url = $PAGE->theme->settings->award1url;
$award2url = $PAGE->theme->settings->award2url;
$award3url = $PAGE->theme->settings->award3url;
$award4url = $PAGE->theme->settings->award4url;
$award5url = $PAGE->theme->settings->award5url;
$award6url = $PAGE->theme->settings->award6url;

$award1image = $PAGE->theme->setting_file_url('award1image', 'award1image');
$award2image = $PAGE->theme->setting_file_url('award2image', 'award2image');
$award3image = $PAGE->theme->setting_file_url('award3image', 'award3image');
$award4image = $PAGE->theme->setting_file_url('award4image', 'award4image');
$award5image = $PAGE->theme->setting_file_url('award5image', 'award5image');
$award6image = $PAGE->theme->setting_file_url('award6image', 'award6image');

$award1alttext = $PAGE->theme->settings->award1alttext;
$award2alttext = $PAGE->theme->settings->award2alttext;
$award3alttext = $PAGE->theme->settings->award3alttext;
$award4alttext = $PAGE->theme->settings->award4alttext;
$award5alttext = $PAGE->theme->settings->award5alttext;
$award6alttext = $PAGE->theme->settings->award6alttext;

?>

<?php if($hasawardimages && $PAGE->theme->settings->useawards ==1) { ?> 
<section class="awards row">
    <ul class="logos">
        <?php if ($hasaward1image) { ?>
        <li class="col-md-2 col-sm-2 col-xs-4">
            <?php if($hasaward1url) {?><a href="<?php echo $award1url ?>"><?php } ?>
            <img class="img-responsive" src="<?php echo $award1image ?>"  alt="<?php echo $award1alttext?>" />
            <?php if($hasaward1url) {?></a><?php } ?>
        </li>
        <?php } ?>
        <?php if ($hasaward2image) { ?>
        <li class="col-md-2 col-sm-2 col-xs-4">
            <?php if($hasaward2url) {?><a href="<?php echo $award2url ?>"><?php } ?>
            <img class="img-responsive" src="<?php echo $award2image ?>"  alt="<?php echo $award2alttext?>" />
            <?php if($hasaward2url) {?></a><?php } ?>
        </li>
        <?php } ?>
        <?php if ($hasaward3image) { ?>
        <li class="col-md-2 col-sm-2 col-xs-4">
            <?php if($hasaward3url) {?><a href="<?php echo $award3url ?>"><?php } ?>
            <img class="img-responsive" src="<?php echo $award3image ?>"  alt="<?php echo $award3alttext?>" />
            <?php if($hasaward3url) {?></a><?php } ?>
        </li>
        <?php } ?>
        <?php if ($hasaward4image) { ?>
        <li class="col-md-2 col-sm-2 col-xs-4">
            <?php if($hasaward4url) {?><a href="<?php echo $award4url ?>"><?php } ?>
            <img class="img-responsive" src="<?php echo $award4image ?>"  alt="<?php echo $award4alttext?>" />
            <?php if($hasaward4url) {?></a><?php } ?>
        </li>
        <?php } ?>
        <?php if ($hasaward5image) { ?>
        <li class="col-md-2 col-sm-2 col-xs-4">
            <?php if($hasaward5url) {?><a href="<?php echo $award5url ?>"><?php } ?>
            <img class="img-responsive" src="<?php echo $award5image ?>"  alt="<?php echo $award5alttext?>" />
            <?php if($hasaward5url) {?></a><?php } ?>
        </li>
        <?php } ?>
        <?php if ($hasaward6image) { ?>
        <li class="col-md-2 col-sm-2 col-xs-4">
            <?php if($hasaward6url) {?><a href="<?php echo $award6url ?>"><?php } ?>
            <img class="img-responsive" src="<?php echo $award6image ?>"  alt="<?php echo $award6alttext?>" />
            <?php if($hasaward6url) {?></a><?php } ?>
        </li>  
        <?php } ?>           
    </ul><!--//logos-->
</section><!--//awards-->
<?php }?>