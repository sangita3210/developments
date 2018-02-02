<?php
/**
 * OC3 Block add  page
 * @author     Prashant Yallatti <prashant@elearn10.com>
 * @package    block_about_oc3
 * @copyright  07/17/2017 lms of india
 * @license    http://lmsofindia.com/
 */
//echo 'prashant';
require_once('../../config.php');
require_once('edit_oc3_form.php');
require_once($CFG->libdir . '/formslib.php');
require_login(0,false);

$id = required_param('id',PARAM_INT);
$general = $DB->get_record('blocks_about_oc3', array('id' => $id)) ;
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_url($CFG->wwwroot . '/blocks/about_oc3/edit_oc3.php');
//$PAGE->requires->css('/styles.css');
$mform = new block_edit_oc3_form(new moodle_url($CFG->wwwroot .'/blocks/about_oc3/edit_oc3.php',array('id'=>$id)));
$maxbytes = 500000;

$draftitemid1 = file_get_submitted_draft_itemid('image');
file_prepare_draft_area($draftitemid1, $context->id, 'blocks_about_oc3', 'content',
        $general->image, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));
$general->image = $draftitemid1;

$mform->set_data($general);

if ($mform->is_cancelled()) {
    redirect(new moodle_url('/local/oc3_team/view.php', array()));
}else if($data = $mform->get_data()) {
	$editcontent = new stdClass();
	$editcontent->id = $general->id;
	$editcontent->name = $data->name;
	$editcontent->description =$data->description;
	$editcontent->image = $data->image;
	$editcontent->login_button_name = $data->login_button_name;
	$editcontent->login_button_link = $data->login_button_link;
	$editcontent->not_login_button_name =$data->not_login_button_name;
	$editcontent->not_login_button_link =$data->not_login_button_link;

	$generalupdate = $DB->update_record('blocks_about_oc3', $editcontent);
	file_save_draft_area_files($data->image, $context->id, 'blocks_about_oc3', 'content',
    	$data->image, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));
	if($generalupdate){
		echo "updated successfully";
	}

}
$title = get_string('updated', 'block_about_oc3');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
