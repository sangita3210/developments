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
 * @author  	Prashant Yallatti<prashant@elearn10.com>
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
//contextid is genarate here 
$context = $DB->get_record('cohort',array('id'=>$id),'name');
$context1 = $DB->get_records('cohort',array('name'=>$context->name),'contextid');
//print_r($context1);
$coursecat = array();
foreach ($context1 as $key => $value) {
	$instance = $DB->get_records('context',array('id'=>$value->contextid,'contextlevel'=>10),'instanceid');
	if($instance){
		foreach ($instance as $key1 => $value1) {
			$coursecat []= $DB->get_record('course_categories',array('id'=>$value1->instanceid),'id,name');
		}
	}
}

echo json_encode($coursecat);


