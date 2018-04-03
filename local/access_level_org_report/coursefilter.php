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
 * @author     Prashant Yallatti<prashant@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */
define('AJAX_SCRIPT', true);
global $DB;
include '../../config.php';
require_login(0,false);
$PAGE->set_context(context_system::instance());
//get id from page
$id = required_param('id', PARAM_INT);
//get all courses 
$cid = required_param('cid', PARAM_INT);
$courseid1 = $DB->get_records('course',array('category'=>$id),null,'id,fullname');
///get all courses in which selected courses is prasent
$courseids = $DB->get_records('enrol',array('enrol'=>'cohort','customint1'=>$cid),null,'courseid');
$courseid = [];
if($courseids){
	foreach ($courseids as $key => $course) {
		$courseid[] = $DB->get_record('course',array('id'=>$course->courseid),'id,fullname');
	}
}
//matching data only dipslyed 
$value3 = [];
if($courseid1){
	foreach ($courseid1 as $key1 => $value1) {
		if($courseid){
			foreach ($courseid as $key2 => $value2) {
				if(($value2->id)==($value1->id)) {
					$value3[] = $value2;
				}
			}
		}
	}
}
echo json_encode($value3);
