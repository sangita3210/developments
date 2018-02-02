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
require_login(0 , FALSE);
$id = required_param('id',PARAM_INT);
$context = \context_course::instance($id);
$PAGE->set_context($context);
$authenticate = has_capability('moodle/course:update', $context);
$PAGE->set_pagelayout('admin');
$title = get_string('req', 'local_course_approval_intel');
//$PAGE->set_heading(get_string('formtitlereq', 'local_course_approval_intel'));
$PAGE->set_url('/local/course_approval_intel/request_approval.php');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
$PAGE->requires->css('/styles.css');
echo $OUTPUT->header();
if($authenticate){
	$request1 = $DB->get_record('local_course_approval_intel',array('courseid'=>$id,'status'=>3));
	$request2 = $DB->get_record('local_course_approval_intel',array('courseid'=>$id,'status'=>2));
	$request3 = $DB->get_record('local_course_approval_intel',array('courseid'=>$id,'status'=>1));
	$sql = $DB->get_record('course',array('id'=>$id),'id,shortname');
	if($request1){
		echo '<div class="alert alert-info">
		<h4>'.html_writer::link(
			new moodle_url(
				$CFG->wwwroot.'/course/view.php?id='.$sql->id,array()
				),$sql->shortname
			).'</h4>'.get_string('notapproved','local_course_approval_intel').'
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
	}
	if($request2)
	{
		echo '<div class="alert alert-success">
		<h4>'.html_writer::link(
		    new moodle_url(
		        $CFG->wwwroot.'/course/view.php?id='.$sql->id,array()
		        ),$sql->shortname
		    ).'</h4>'.get_string('approved','local_course_approval_intel').'
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
	}
	if($request3){
		echo '<div class="alert alert-info">'.get_string('ap1','local_course_approval_intel').'
		<strong>&nbsp&nbsp'.$sql->shortname.'&nbsp&nbsp</strong>'.get_string('ap2',
			'local_course_approval_intel').
		'</div>';
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
	}
	$notexist = $DB->record_exists('local_course_approval_intel',array('courseid'=>$id));
	 if(!$notexist) {
		echo '<div class="alert alert-info">'.get_string('first1','local_course_approval_intel').'
		<strong>&nbsp&nbsp'.$sql->shortname.'&nbsp&nbsp</strong>
		</div>';
		echo html_writer::link(
			new moodle_url(
				$CFG->wwwroot.'/local/course_approval_intel/action_approval.php',
				array('id'=>$sql->id)
				),
			get_string('req','local_course_approval_intel'),
			array(
				'class' => 'btn btn-primary'
				)
			);
	}
}else{
	echo '<div class="alert alert-danger">
	<strong>Danger!</strong> '.get_string('permission','local_course_approval_intel').'
	</div>';
}
echo $OUTPUT->footer();
