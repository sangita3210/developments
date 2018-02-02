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
 * Course Approval
 *
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package     local
 * @subpackage  Course Approval
 */
require('../../config.php');
require_login(0 , FALSE);
$id = required_param('id',PARAM_INT);
//has capability for teacher
$context = \context_course::instance($id);
$PAGE->set_context($context);
$authenticate = has_capability('moodle/course:update', $context);
$PAGE->set_pagelayout('admin');
$title = get_string('formtitleap', 'local_course_approval_intel');
$PAGE->set_url('/local/course_approval_intel/request_approval.php');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
$PAGE->requires->css('/styles.css');
echo $OUTPUT->header();
if($authenticate){
	$sql = $DB->get_record('course',array('id'=>$id));
	$exist = $DB->record_exists('local_course_approval_intel',array('courseid'=>$sql->id,'status'=>1));
		if(!$exist){
			$insert = new stdClass();
			$insert->status = 1;
			$insert->courseid = $sql->id;
			$insert->sendby = $USER->id;
			$insert->approvedby = NUll;
			$insert->createdate = time();
			$insert->modidate = time();
			$saverecord = $DB->insert_record('local_course_approval_intel',$insert,true);
			if($saverecord){
				echo '<div class="alert alert-success">
				<strong></strong> Send for Approval!!.
			</div>';
			echo html_writer::link(
				new moodle_url(
					$CFG->wwwroot.'/',
					array()
					),
				get_string('dash','local_course_approval_intel'),
				array(
					'class' => 'btn btn-primary'
					)
				);
				//redirect(new moodle_url('/',array()));
		}
	}
}else{
	echo '<div class="alert alert-danger">
			'.get_string('dontper','local_course_approval_intel').'
		</div>';
		//redirect(new moodle_url('/',array()));
}
echo $OUTPUT->footer();