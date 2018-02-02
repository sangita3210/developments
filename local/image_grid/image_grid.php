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
require_once('image_grid_form.php');
require_once($CFG->libdir . '/formslib.php');
require_login(0,false);
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_url($CFG->wwwroot . '/local/image_grid/image_grid.php');
//$PAGE->requires->css('/styles.css');
$title = get_string('addblockitem', 'local_image_grid');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
echo $OUTPUT->header();
$mform = new local_image_grid_form();
$maxbytes = 500000;
if ($mform->is_cancelled()){

		echo '<div class="alert alert-danger">
 				 <strong>Success!</strong> Need to fill form properly!!.
			</div>';

	
    //redirect(new moodle_url('/local/oc3_team/view.php', array()));
} else if ($data = $mform->get_data()) {
		$save = new stdClass();
		$save->image1 = $data->image1;
		//print_object($save->image1);die();
		$save->image_link1 = $data->image_link1;
		
		$save->image2 = $data->image2;
		$save->image_link2 = $data->image_link2;
		
		$save->image3 = $data->image3;
		$save->image_link3 = $data->image_link3;
		
		$save->image4 = $data->image4;
		$save->image_link4 = $data->image_link4;
		
		$save->image5 = $data->image5;
		$save->image_link5 = $data->image_link5;
		
		$save->image6 = $data->image6;
		$save->image_link6 = $data->image_link6;

		$saverecord = $DB->insert_record('local_image_grid',$save,true);
		
		file_save_draft_area_files($data->image1, $context->id, 'local_image_grid', 'content',
    	$data->image1, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));

		file_save_draft_area_files($data->image2, $context->id, 'local_image_grid', 'content',
    	$data->image2, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));

		file_save_draft_area_files($data->image3, $context->id, 'local_image_grid', 'content',
    	$data->image3, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));

		file_save_draft_area_files($data->image4, $context->id, 'local_image_grid', 'content',
    	$data->image4, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));

		file_save_draft_area_files($data->image5, $context->id, 'local_image_grid', 'content',
    	$data->image5, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));


		file_save_draft_area_files($data->image6, $context->id, 'local_image_grid', 'content',
    	$data->image6, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => 1));
		if($saverecord){
		echo '<div class="alert alert-success">
 				 <strong>Success!</strong> Data Inserted successfully!!.
			</div>';
		//redirect(new moodle_url('/local/clinical_care/view.php', array()));		
	}
		

	   	    
}

$mform->display();
echo $OUTPUT->footer();
