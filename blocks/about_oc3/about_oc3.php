<?php
/**
 * OC3 Block add  page
 * @author     Prashant Yallatti <prashant@elearn10.com>
 * @package    block_about_oc3
 * @copyright  07/17/2017 lms of india
 * @license    http://lmsofindia.com/
 */
echo 'prashant';
require_once('../../config.php');
require_once('about_oc3_form.php');
require_once($CFG->libdir . '/formslib.php');
require_login(0,false);
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_url($CFG->wwwroot . '/blocks/about_oc3/about_oc3.php');
//$PAGE->requires->css('/styles.css');
$mform = new block_about_oc3_form();
$maxbytes = 500000;
if ($mform->is_cancelled()){
    //redirect(new moodle_url('/local/oc3_team/view.php', array()));
} else if ($data = $mform->get_data()) {
		$blockrecod  = new stdClass();
		$blockrecod->name = $data->name;
		$blockrecod->description = $data->description;
		$blockrecod->image = $data->image;
		$blockrecod->login_button_name = $data->login_button_name;
		$blockrecod->login_button_link = $data->login_button_link;
		$blockrecod->not_login_button_name = $data->not_login_button_name;
		$blockrecod->not_login_button_link = $data->not_login_button_link;

	    $newteam = $DB->insert_record('blocks_about_oc3', $blockrecod, true);
	    file_save_draft_area_files($data->image, $context->id, 'blocks_about_oc3', 'content',
    	$data->image, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));
    	if($newteam){
    		echo "data inserted Successfully";
    	} 
	   	    
}
$title = get_string('addblockitem', 'block_about_oc3');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
