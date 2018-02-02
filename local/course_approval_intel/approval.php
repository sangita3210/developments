<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * My profile block caps.
 *
 * @package    local_course_approval_intel
 * @copyright   Dhruv Infoline Pvt Ltd   
 * @license     http://lmsofindia.com
 * @author     Prashant Yallatti <prashant@elearn10.com>
 * 
 */
require('../../config.php');
require_once($CFG->libdir . '/formslib.php');
require_once('approve_form.php');

require_login(0 , FALSE);
$id = required_param('id', PARAM_INT);
//1 - requested , 2 - approve , 3  - disapprove
// while somebody clciks on YES button the status will come as 2- approve, if admin cciks on NO then status will come as 3-Disapprove
$status = required_param('status', PARAM_INT);
$context = \context_course::instance($id);
$PAGE->set_context($context);
$authenticate = has_capability('moodle/course:update', $context);
$PAGE->set_pagelayout('admin');
$title = get_string('pluginname', 'local_course_approval_intel');
$PAGE->set_url('/local/course_approval_intel/approval.php');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
$PAGE->requires->css('/styles.css');
$showstring = '';
$data = '';

echo $OUTPUT->header();
// approve
if(is_siteadmin()){
	$userform = new course_approve_intel_form();
	$data = $mform->get_data();
    if ($mform->is_cancelled()){
        redirect(new moodle_url('/local/assign_course/assign_course.php', array()));
    } else if ($data) {
    	print_object($data);die();
    }
		
		echo get_string('headercomment','local_course_approval_intel');
		$userform->display();
	if($status == 2) {
		
		//first show the form
		
		

		// first upate the course approval table to status as 2
		$sql3 = $DB->get_record('local_course_approval_intel',array('courseid'=>$id),'id,courseid,status,modidate');
		if ($sql3) {
			$blockapproval = new StdClass();
			$blockapproval->id = $sql3->id;
				$blockapproval->status = '2'; // approve
				$blockapproval->approvedby = $USER->id;
				$blockapproval->reason = $data->reason;
				$blockapproval->comment = $data->comment;
				$blockapproval->modidate = time();
				//$approval =$DB->update_record('local_course_approval_intel',$blockapproval);
			}
		//second step update enrol table to staus as 1
			$sql1 = $DB->record_exists('enrol',array('courseid'=>$id,'enrol'=>'self'));
			$sql = $DB->get_records('enrol',array('courseid'=>$id,'enrol'=>'self'),'id,courseid,status');
			if($sql1){
				foreach ($sql as $sqlselfapprove) {
					if($sqlselfapprove->status == 1){
						$enrolapproval = new StdClass();
						$enrolapproval->id = $sqlselfapprove->id;
						$enrolapproval->status = '0';
						//$enroltable =$DB->update_record('enrol',$enrolapproval);
					}
				}
			}
			$showstring = get_string('approved','local_course_approval_intel');

		}

	// disapprove
		if($status == 3) {
			
			
		//show form Mihir
		$userform = new course_approve_intel_form();
		
		echo get_string('headercomment','local_course_approval_intel');
		$userform->display();
			
		// first upate the course approval table to status as 3
			$sql3 = $DB->get_record('local_course_approval_intel',array('courseid'=>$id),'id,courseid,status,modidate');
			if ($sql3) {
				$blockdisapproval = new StdClass();
				$blockdisapproval->id = $sql3->id;
			$blockdisapproval->status = '3'; // approvedby
			$blockdisapproval->approvedby = $USER->id;
			$blockdisapproval->modidate = time();
			$disapproval =$DB->update_record('local_course_approval_intel',$blockdisapproval);
		}
		//second step update enrol table to staus as 1
		$sql1 = $DB->record_exists('enrol',array('courseid'=>$id,'enrol'=>'self'));
		$sql = $DB->get_records('enrol',array('courseid'=>$id,'enrol'=>'self'),'id,courseid,status');
		if($sql1){
			foreach($sql as $selfdisapprove){
				if($selfdisapprove->status == 0){
					$enroldisapproval = new StdClass();
					$enroldisapproval->id = $selfdisapprove->id;
					$enroldisapproval->status = '1';
					$enroldisapproval =$DB->update_record('enrol',$enroldisapproval);
				}
			}
		}

		$showstring = get_string('notapproved','local_course_approval_intel');
	}
}


echo '<div class="alert alert-info">
<strong>Info!</strong><h4>'.$showstring.'</h4>
</div>';
//redirect(new moodle_url('/', array()));

echo $OUTPUT->footer();

