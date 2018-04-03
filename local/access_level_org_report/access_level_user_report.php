<?php
// This file is part of the Certificate module for Moodle - http://moodle.org/
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
 * Handles uploading files
 *
 * @package    local_access_level_org_report
 * @author 		
 * @copyright  
 * @license    
 */
require_once('../../config.php');
require_once($CFG->dirroot.'/local/access_level_org_report/csslinks.php');
require_login(0,false);
$capadmin = is_siteadmin();
//$createorgcap = has_capability('local/accesscohort:addorganization',$context);
$PAGE->set_context(context_system::instance());
$title = get_string('accessinfohdrmyown', 'local_access_level_org_report');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_pagelayout('admin');
//forcapabilty aassiging here 
$systemcontext = context_system::instance();
$myreport = has_capability('local/access_level_org_report:myreport',$systemcontext);
$allreport = has_capability('local/access_level_org_report:allreport',$systemcontext);
$PAGE->set_url('/local/access_level_org_report/access_level_user_report.php');
$PAGE->requires->jquery();		
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/access_level_org_report/js/select.js'));
require_login();
$PAGE->navbar->ignore_active();
$previewnode = $PAGE->navbar->add(get_string('pluginname','local_access_level_org_report'),new moodle_url($CFG->wwwroot.'/local/access_level_org_report/access_level_org_report.php'), navigation_node::TYPE_CONTAINER);
$thingnode = $previewnode->add($title, new moodle_url($CFG->wwwroot.'/local/access_level_org_report/access_level_user_report.php'));
$thingnode->make_active();
//include_once('../datatable.php');
include_once('jslink.php');
echo $OUTPUT->header();
$data1 = '';
$dateformat = '%d-%b-%Y';
$userid = optional_param('id','',PARAM_INT );

global $USER;
if (empty($userid)) {
	$userid = $USER->id;
}
if($USER->id == $userid){
	$myreport = true;
}
//enrolled user courses
echo '<h2>'.get_string('accessinfohdr2','local_access_level_org_report').'</h2>';
echo '<hr>';

$courses=enrol_get_users_courses($userid, true, 'id, visible, shortname');
$countofcourse = count($courses);
$uname = userinfo($userid);
$table = '';
$output1 = '';
$output = '';
//capability here 
if($myreport||$allreport){
	
//table formation for user details  here 
	$table = new html_table();
	$table->id =  'example';
	$table->head = (array) get_strings(array('catname', 'cname','lastacces', 'compl', 'csgrade','novisted'), 'local_access_level_org_report');
	$status = '';
	$last = '';
	$vi = '';
	$dateformat = '%d-%b-%Y';
	$total = '';
	$count = 0;
	if($courses){
		foreach ($courses as $key => $course) {
			$categoryname = category_name($course->category);
			$coursename =course_name($course->id);
			
			// Mihir for grade
			require_once($CFG->dirroot.'/lib/gradelib.php');
			$resultkrb = grade_get_course_grades($course->id, $userid); 
			$grd = $resultkrb->grades[$userid]; 
			$csgrade =  $grd->str_grade;

			
			$lastacces = last_access_course($userid,$course->id);
			
			if($lastacces){
				$ldate = userdate($lastacces->timecreated,$dateformat);
			}else{
				$ldate = '-';
			}

			$cm = course_complete($userid,$course);
			if ($cm==1) {
				$status = 'Yes';
				$count++;
			} else {
				$status = 'No';
			}
			$visted = number_of_visited_course($userid,$course->id);

			$table->data[] = array(
				$categoryname->name,
				html_writer::link(
					new moodle_url(
						$CFG->wwwroot.'/course/view.php?id='.$course->id,array()
						),$coursename->fullname
					),					
				$ldate,
				$status,
				$csgrade,
				$visted
				);
		}
		$output1 .=' <div class="panel-body">
		<div class="row">
			<div class=" col-md-12">
				<div class="col-md-3">
					<div class="card bg-primary text-white">
						<div class="card-block">
							<h3 class="card-text">'.get_string('fullname','local_access_level_org_report').'</h3>
							<p>'.$uname->firstname.'-'.$uname->lastname.'</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card bg-success text-white">
						<div class="card-block">
							<h3 class="card-text">'.get_string('email','local_access_level_org_report').'</h3>
							<p>'.$uname->email.'</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card bg-warning text-white">
						<div class="card-block">
							<h3 class="card-text">'.get_string('noofenrolcourse','local_access_level_org_report').'</h3>
							<h4>'.$countofcourse.'</h4>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card bg-info text-white">
						<div class="card-block">
							<h3 class="card-text">'.get_string('noofcompcourses','local_access_level_org_report').'</h3>
							<h4>'.$count.'</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>'; 
	echo $output1;
	echo '<br>';
	echo html_writer::table($table);
}// when there is no course available to show in table.
else{
	echo html_writer::div(
		get_string('no', 'local_access_level_org_report'),'alert alert-info'
		);
}
// when user does not have permission to view the data of another user

}else{
	echo html_writer::div(
		get_string('cap', 'local_access_level_org_report'),'alert alert-danger'
		);
}
echo $OUTPUT->footer();


