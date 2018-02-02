<?php
$hasiphoneicon = (!empty($PAGE->theme->settings->iphoneicon));
$hasipadicon = (!empty($PAGE->theme->settings->ipadicon));
$hasiphoneretinaicon = (!empty($PAGE->theme->settings->iphoneretinaicon));
$hasipadretinaicon = (!empty($PAGE->theme->settings->ipadretinaicon));

if ($hasiphoneicon) {
    $iphoneicon = $PAGE->theme->setting_file_url('iphoneicon', 'iphoneicon');
} 

if ($hasipadicon) {
    $ipadicon = $PAGE->theme->setting_file_url('ipadicon', 'ipadicon');
} 

if ($hasiphoneretinaicon) {
    $iphoneretinaicon = $PAGE->theme->setting_file_url('iphoneretinaicon', 'iphoneretinaicon');
}

if ($hasipadretinaicon) {
    $ipadretinaicon = $PAGE->theme->setting_file_url('ipadretinaicon', 'ipadretinaicon');
}
?>

<?php if($hasiphoneicon) {?><link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $iphoneicon ?>" /><?php } ?>
<?php if($hasipadicon) {?><link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $ipadicon ?>" /><?php } ?>
<?php if($hasiphoneretinaicon) {?><link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $iphoneretinaicon ?>" /><?php } ?>
<?php if($hasipadretinaicon) {?><link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $ipadretinaicon ?>" /><?php } ?>