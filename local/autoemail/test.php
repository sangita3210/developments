<?php
require_once('./../../config.php');
global $DB,$CFG;
// We make the assumption that at least one schedule task should run once per day.
 $lastcron = $DB->get_field_sql("SELECT MAX(lastruntime) FROM {task_scheduled} WHERE component='autoemailcontext_coursecomplete'");
//$lastcron = $DB->get_config('autoemailcontext_coursecomplete', 'lastcron');


print_object($lastcron)||die();
?>