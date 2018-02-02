<?php
/**
 * OC3 Block add  page
 * @author     Prashant Yallatti <prashant@elearn10.com>
 * @package    local_clinical_care
 * @copyright  07/17/2017 lms of india
 * @license    http://lmsofindia.com/
 */
//echo 'prashant';
require_once('../../config.php');
require_once('clinical_care_form.php');
require_once($CFG->libdir . '/formslib.php');
require_login(0,false);
//	print_object($_POST);
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_url($CFG->wwwroot . '/local/clinical_care/clinical_care.php');
//$PAGE->navbar->add(get_string('form', 'local_clinical_care'));
//$PAGE->requires->css('/styles.css');
$title = get_string('clinical_care', 'local_clinical_care');
//$title = 'clinical_care';
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
echo $OUTPUT->header();
$mform = new local_clinical_care_form();
if ($mform->is_cancelled()){
	 redirect(new moodle_url('/local/clinical_care/clinical_care.php', array()));
} else if ($data = $mform->get_data()) {

	$save = new stdClass();
	$save->userid = $USER->id;
	$save->health_center_name = $data->health_center_name;
	$save->contact_person = $data->contact_person;
	$save->phone_number = $data->phone_number;
	$save->interest = $data->interest;
	$save->experience = $data->experience;
	$save->barriers = $data->barriers;
	$save->learning_activity = $data->learning_activity;
	$save->time_commitments = $data->time_commitments;
	$save->tjc_recognition= $data->tjc_recognition;
	$save->feedback = $data->feedback;
	$save->epm = $data->epm;
	$save->integrated_program = $data->integrated_program;
	$save->medical_ehr = $data->medical_ehr;
	$save->dental_edr = $data->dental_edr;
	$save->customized_report = $data->customized_report;
	$save->tachc_health = $data->tachc_health;
	$save->willing_to_join = $data->willing_to_join;
	$save->health_info_exchange = $data->health_info_exchange;
	$save->health_center_registry = $data->health_center_registry;
	$save->clinical_area = $data->clinical_area;
	$save->connected_network = $data->connected_network;
	$save->individual_email = $data->individual_email;
	$save->collection_report = $data->collection_report;
	$save->data_collection_report = $data->data_collection_report;
	$save->access_measure = $data->access_measure;
	$save->efficiency_measure = $data->efficiency_measure;
	$save->clinical = $data->clinical;
	$save->financial = $data->financial;
	$save->patient_satisfaction= $data->patient_satisfaction;
	$save->utilization_measure = $data->utilization_measure;
	$save->staff_satisfaction = $data->staff_satisfaction;
	$save->performance_impovement = $data->performance_impovement;
	$save->team_roster = $data->team_roster;
	$save->signature = $data->signature;

	$saverecord = $DB->insert_record('local_clinic_care',$save,true);
	if($saverecord){
		echo '<div class="alert alert-success">
 				 <strong>Success!</strong> Data Inserted successfully!!.
			</div>';
		redirect(new moodle_url('/local/clinical_care/view.php', array()));

		
	}if($data==null){
		echo '<div class="alert alert-danger">
 				 <strong>Success!</strong> Need to fill form properly!!.
			</div>';

	}

}


$mform->display();
echo $OUTPUT->footer();
