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

defined('MOODLE_INTERNAL') || die;
function local_course_approval_intel_extend_navigation(global_navigation $navigation) {		
        global $CFG,$PAGE, $COURSE;
		//$capcheck = 'moodle/category:manage';
		$capcheck = 'moodle/category:manage';
		if (has_capability($capcheck, context_system::instance())) {
			//$navigation->add_node($flat);
			$navigation->showinflatnavigation = true;
			
			$abc = $navigation->add('Approve Course', $CFG->wwwroot.'/local/course_approval_intel/index.php'); 
			$abc->showinflatnavigation = true;
		}

}


function local_course_approval_intel_extend_settings_navigation(settings_navigation $nav, $context) {
	global $CFG;

	if ($context->contextlevel >= CONTEXT_COURSE and ($branch = $nav->get('courseadmin'))
		and has_capability('moodle/course:update', $context)) {
		$url = new moodle_url($CFG->wwwroot . '/local/course_approval_intel/request_approval.php', array('id' => $context->instanceid));
		$branch->add(get_string('req', 'local_course_approval_intel'), $url, $nav::TYPE_CONTAINER, null, 'local_course_approval_intel' . $context->instanceid, new pix_icon('i/settings', ''));
	}
}

// load user ORG field category path
function local_get_user_org_path_sendby($user=null) {
	global $DB;
	if ($user==null) {
		global $USER;
		//var_dump($USER);
		$getname = $DB->get_record('course_categories', array('id' => $USER->orgvalue));
		if ($getname) {
			return $getname->path;
		} else {
			return null;
		}
	} else {
		// now get $user (who is not loggedin actually) ORG value and then compare
		$getorgnow = $DB->get_record('user', array('id' => $user));
		$getorg = $getorgnow->orgvalue;
		if ($getorg) {
			$getname = $DB->get_record('course_categories', array('id' => $getorg));
			if ($getname) {
				return $getname->path;
			} else {
				return null;
			}
		}else {
			return null;
		}
	}
}

function local_course_approval_intel_get_content() {
global $USER, $CFG, $DB;

$content = new stdClass();
$sql = $DB->get_records('local_course_approval_intel',array());
$cid = array();
$result = '';
foreach($sql as $cids){
	$cid1[] = $cids->courseid;
}
$cid = implode(',',$cid1);
if($sql){
	$sql1 = "SELECT bcp.courseid,bcp.sendby,c.shortname,bcp.status,u.firstname,u.lastname
	FROM {course} c
	inner join {local_course_approval_intel} bcp on c.id = bcp.courseid
	inner join {user} u	on u.id = bcp.sendby
	WHERE bcp.courseid in ($cid) ORDER BY bcp.id DESC";
	$result = $DB->get_records_sql($sql1);
	$t2 = '';

	if($result){
	$table = new html_table(array('class'=>'table12'));
	$table->head = (array) get_strings(array('coursename','sendby', 'status', 'action'), 'local_course_approval_intel');
	
	foreach($result as $res) {
		
		// Mihir now check the user org and find who all are having moodle/category:manage capability from the same org we should show the data only to them
		//first get the orgvalue of sendby user
		//$udetailssendby = $DB->get_record('user', array('id' => $res->sendby));
		global $USER;
		$sendbypath = local_get_user_org_path_sendby($res->sendby);
		
		if (!is_siteadmin()) {
			// check if same orgvalue 
			if (strpos($sendbypath, $USER->orgvalue) === false){ //in category path user's org is not found
				continue;
			}
		}
		
		if($res->status==3){
			$t1 = 'Not-Aprroved';
		}else if($res->status == 2){
			$t1 = 'Approved';
			$t2 = '<p>&#9989;</p>';
		}else{
			$t1 = 'Requested for approval';
			$t2 = html_writer::link(
				new moodle_url(
					$CFG->wwwroot.'/local/course_approval_intel/approval.php',
					array(
						'id' => $res->courseid,
						'status' => 2
						)
					),
				'Yes',
				array(
					'class' => 'btn btn-primary btn-xs','id'=>'course_approval'
					)
				).'-'.html_writer::link(
				new moodle_url(
					$CFG->wwwroot.'/local/course_approval_intel/approval.php',
					array(
						'id' => $res->courseid,
						'status' => 3
						)
					),
				'No',
				array(
					'class' => 'btn btn-primary btn-xs','id'=>'course_disapproval'
					)
				);  
			} 
			$table->data[] = array(
				html_writer::link(
				new moodle_url(
					$CFG->wwwroot.'/course/view.php?id='.$res->courseid,array()
					),$res->shortname
				),
				$res->firstname.'-'.$res->lastname,
				$t1,
				$t2
				);
		}
		$tabeled = html_writer::table($table);
		$content->text = html_writer::div($tabeled,null,array('id'=>'table12'));
		
	} else {
		$content->text = 'Sorry there is no course to be approved by you.';
	}
		
		$content->footer = '';
	} else {
		$content->text = 'Sorry there is no course to be approved by you.';
	}
	return $content;
}
