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
 * @package    local_accesscohort
 * @copyright  Prashant Yallatti<prashant@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */

require_once("$CFG->libdir/gradelib.php");
require_once($CFG->dirroot. "/lib/completionlib.php");
require_once("$CFG->dirroot/grade/querylib.php");
use core_completion\progress;
use core_completion\external;

/**
 * add navigation  code here 
*/ 
function local_access_level_org_report_extend_navigation(global_navigation $nav) {

	global $CFG,$USER;
	$systemcontext = context_system::instance();
	$myreport = has_capability('local/access_level_org_report:myreport',$systemcontext);
	$allreport = has_capability('local/access_level_org_report:allreport',$systemcontext);
	$nav->showinflatnavigation = true;
	if($myreport ||$allreport) {
		$abc = $nav->add(get_string('pluginname','local_access_level_org_report'),
			$CFG->wwwroot.'/local/access_level_org_report/access_level_org_report.php'); 
		$abc->showinflatnavigation = true;
	}
}
/**
 * Returns the user progress report of  status,percentage,completiondate
 * @param  integer $courseid,$userid
 * @return array status,percentage,completionfdate
 */

function user_progress_course_report($courseid,$user){
	global $CFG,$DB,$USER;
	if(is_null($user)){
		$user = $USER;
	}
	$dateformat = '%d-%b-%Y';
	$graade = [];
	$coursesprogress = [];
	$course = $DB->get_record('course',array('id'=>$courseid));
	if($course){
		$completion = new \completion_info($course);
		$percentage = progress::get_course_progress_percentage($course);
		if (!is_null($percentage)) {
			$percentage = floor($percentage);
			//print_object($percentage);
		}

		$coursesprogress[$course->id]['completed'] = $completion->is_course_complete($user);
		$coursesprogress[$course->id]['progress'] = $percentage;
		$params = array(
			'userid'    => $user,
			'course'  => $course->id
			);
		$ccompletion = new completion_completion($params);
		//print_object($ccompletion);
		$completiondate = '-';

		if ($coursesprogress[$course->id]['completed'] == false) {
			if ($coursesprogress[$course->id]['progress'] >  0 && $coursesprogress[$course->id]['progress'] < 100) {
				$status = '-';
			} 
			else {
				$status = get_string('ns','local_access_level_org_report');
			}

		} else {
			$status =get_string('cm','local_access_level_org_report'); 
			$completiondate = userdate($ccompletion->timecompleted, $dateformat);
		} 
		$studentid = $user;
		$grades = grade_get_course_grades($courseid, $studentid);
		//print_object($grades);
		$grademax = $grades->grademax;
		$grade1 = (int) $grades->grades[$studentid]->str_grade;
		//print_object($grades);
	}	
	$grade = array(
		'status'=>$status,
		'percentage' => $grade1 ,
		'completiondate' =>$completiondate
		);
	//print_object($grade);
	return $grade;
}

/**
 * in this function  will pass organization int $id ,by using int $id will get all array of $cohort_ids
 * @param  integer $orgid
 * @return array of cohortids
 */
function allchortids($orgid){
	global $CFG,$DB,$USER;
	$cohortvalues = $DB->get_records('local_mapping_cohort',array('org_id'=>$orgid),'cohort_id');
	if($cohortvalues){
		foreach ($cohortvalues as $value) {
			$cohortid = explode(',',$value->cohort_id);
		}
	}
	return $cohortid;
}

/**
 * in this function we pass int $orgid ,it return organization name and shortname 
 * @param  integer $orgid
 * @return stdclass of orgname and shortname 
 */
function org_name($orgid){
	global $CFG,$DB,$USER;
	$orgname = $DB->get_record('local_organization',array('id'=>$orgid),
		'org_name,short_name');
	if($orgname){
		return $orgname;
	}
}

/**
 * in this function will pass int $cohortid to enrol table,after satisfied condition array *  of object will return 
 * @param  integer $cohortid
 * @return array of enrol table object such as (courseid,chortid)
 */
function enrol_courseids($cohortid){
	global $CFG,$DB,$USER;
	$enrolcourseids = $DB->get_records('enrol',array('customint1'=>$cohortid,'enrol'=>'cohort'),'id,courseid,customint1');
	if($enrolcourseids){
		return $enrolcourseids;
	}

}
/**
 * in this function will pass int $cohortid and int $courseid to enrol table,check int     *  $courseid and int $cohortid are match after satisfied condition array of object will 
 * return 
 * @param  integer $cohortid
 * @return array of enrol table object such as (courseid,chortid)
 */
function enrol_courseids_cohortids($cohortid,$courseid){
	global $CFG,$DB,$USER;
	$enrolcourseids = $DB->get_records('enrol',array('customint1'=>$cohortid,'enrol'=>'cohort','courseid'=>$courseid),'id,courseid,customint1');
	if($enrolcourseids){
		return $enrolcourseids;
	}
}

/**
 * In this function will pass int $enrolid,check enrolid is match with user_enrolment table 
 * then it will return array of object here.
 * @param  integer $enrolid
 * @return array of user_enrolments table object
 */
function enrol_users($enrolid){
	global $CFG,$DB,$USER;
	$allusers =  $DB->get_records('user_enrolments',array('enrolid'=>$enrolid),null,'userid');
	if($allusers){
		return $allusers;
	}

}
/**
 * In this function will pass int cohortid,check condition and return stdclass cohort_name  
 * @param  integer $cohortid
 * @return stdclass of chortname 
 */
function cohort_name($cohortid){
	global $CFG,$DB,$USER;
	$cohortname = $DB->get_record('cohort',array('id'=>$cohortid),'name');
	if($cohortname){
		return $cohortname;
	}
}
/**
 * In this function will pass int of $cohortid,$enrolid,$courseid,$orgid,$table.
 * int $cohortid it return stdclass of cohortname.
 * int $enrolid it return array of all user object 
 * int $courseid it string coursename.
 * @param  integer $cohortid,$enrolid,$courseid,$orgid,$table
 * @return table object here(username,firstname,email,status,category,organization name,cohort name,status) 
 */
function master_data($cohortid,$enrolid,$corseid,$orgid,$table){
	global $CFG,$DB,$USER;
	$dateformat = '%d-%b-%Y';
	$cohortname = cohort_name($cohortid);
	$allusers = enrol_users($enrolid);
	$orgname = org_name($orgid);
	if($allusers){
		foreach ($allusers as $key => $allusered) {
			if(is_siteadmin()){
				$alluser  = $DB->get_record('user',array('id'=>$allusered->userid));
			}else{
				$alluser  = $DB->get_record('user',array('id'=>$allusered->userid,'institution'=>$orgname->short_name));
			}
			if(!empty($alluser)){
				$v = user_progress_course_report($corseid,$alluser->id);
				$csname = get_course($corseid);
				$cat = $DB->get_record('course_categories',array('id'=>$csname->category),'name');
				$table->data[] = array(
					html_writer::link(
						new moodle_url(
							$CFG->wwwroot.'/user/profile.php?id='.$alluser->id,array()
							),$alluser->username
						), 
					$alluser->firstname.' '.$alluser->lastname,
					$alluser->email,
					$orgname->org_name,
					$cohortname->name,
					$cat->name,
					html_writer::link(
						new moodle_url(
							$CFG->wwwroot.'/course/view.php?id='.$corseid,array()
							),$csname->fullname
						),						
					userdate($alluser->lastaccess,$dateformat),
					$v['completiondate'],
					$v['percentage'],
					$v['status']
					);
			}
		}
	}
	return $table;
}


