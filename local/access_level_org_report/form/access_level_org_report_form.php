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
 * @package    local_access_level_report
 * @copyright  Prashant Yallatti<prashant@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.'); /// It must be included from a Moodle page
}
require_once($CFG->libdir.'/formslib.php');

class local_access_level_org_report_form extends moodleform {
    function definition() {
        global $CFG,$DB,$USER,$PAGE,$OUTPUT;
        $mform =& $this->_form; 
        $customdata = $this->_customdata['csdata']; // this contains the data of this 
        $mform->addElement('header','accessinfohdr',get_string('accessinfohdr','local_access_level_org_report'));
        $mform->setExpanded('accessinfohdr');
        $org = '';
        $sall = array('select-all'=>'Select All');
        //organization short name should display in select box here 
        if(!is_siteadmin()){
            $selorg = array('none'=>'Please Select Organization');
            $sql1 = " SELECT lo.id,lo.org_name 
            from {local_organization} lo
            join {local_oragnization_admin} oa
            on oa.orgid = lo.id 
            where oa.userid = $USER->id";
            $org1= $DB->get_records_sql_menu($sql1);
            $org = ($selorg + $org1);
           } else{
            $org[0] = 'Please Select Organization';
            $orgde = $DB->get_records('local_organization',null,null,'id,org_name');
            if($orgde){
                foreach ($orgde as $key => $orgvalue) {
                $org[$key] = $orgvalue->org_name;
            }
        }
    }
    $mform->addElement('select', 'org_id',
        get_string('organization','local_access_level_org_report'),
        $org,array('single'));
    $mform->addHelpButton('org_id', 'organization', 'local_access_level_org_report');
    $mform->addRule('org_id', get_string('required'), 'required', null, 'client');
    $mform->setType('organization', PARAM_RAW);
    
    $cohort1 = $DB->get_records_menu('cohort',null,null,'id,name');
    $cohort = ($sall+$cohort1);
    if(isset($customdata['org_id'])){
        if(!empty($customdata['org_id'])){
            $sql = 'SELECT cohort_id FROM {local_mapping_cohort} WHERE org_id = '.$customdata['org_id'].'';
            $result = $DB->get_record_sql($sql);
            $chtresult = [];
            if($result->cohort_id){
                $cid = $result->cohort_id;
                $sql2 = "SELECT id,name FROM {cohort} WHERE id in ($cid)";
                $result2= $DB->get_records_sql($sql2);
                if($result2){
                    $chtresult['select-all'] = 'Select-all' ;
                    foreach ($result2 as $key => $chsvalue) {
                        $chtresult[$chsvalue->id] = $chsvalue->name;
                    }
                }
            }
            if($chtresult){
                $select = $mform->addElement('select', 'cohort_id',
                    get_string('cohortname','local_access_level_org_report'),
                    $chtresult);
            } else{
                $select = $mform->addElement('select', 'cohort_id',
                    get_string('cohortname','local_access_level_org_report'),
                    array());
            }
        }
    } else {
        $select = $mform->addElement('select', 'cohort_id',
            get_string('cohortname','local_access_level_org_report'),
            array());
    }
    $mform->addHelpButton('cohort_id', 'cohortname', 'local_access_level_org_report');
    $mform->addRule('cohort_id', get_string('required'), 'required', null, 'client');
    $select->setSelected('select-all');
    $select->setMultiple(true);
        //select course 
    $course1 = $DB->get_records_menu('course',null,null,'id,shortname');
    unset($course1[1]);
    $course = ($sall + $course1);
        //changing code here
    if(isset($customdata['cohort_id']) && (!empty($customdata['cohort_id']))){
        foreach($customdata['cohort_id'] as $chid){
            if($chid !='select-all'){
                $sql = "SELECT courseid from {enrol} where enrol = 'cohort' and customint1 = $chid ";
                $courseids = $DB->get_records_sql($sql);
                $cids = [];
                $csarry['select-all'] = 'Select-all';
                if($courseids){
                    foreach ($courseids as $key => $course) {
                        $cids = get_course($course->courseid);
                        $csarry[$cids->id] = $cids->fullname;
                    }
                }
            } else {
                $cohortvalues = $DB->get_records('local_mapping_cohort',array('org_id'=>$customdata['org_id']),'cohort_id');
                foreach ($cohortvalues as $key => $value) {
                    $cid = $value->cohort_id;
                }
                $sql = "SELECT id,courseid from {enrol} where enrol = 'cohort' and customint1 in ($cid)";
                $courseids = $DB->get_records_sql($sql);
                $cids = [];
                $csarry['select-all'] = 'Select-all';
                if($courseids){
                    foreach ($courseids as $key => $course) {
                        $cids = get_course($course->courseid);
                        $csarry[$cids->id] = $cids->fullname;
                    }
                }
            }
        }
        if($csarry){
            $select = $mform->addElement('select', 'courseid', get_string('coursename','local_access_level_org_report'), $csarry);
        } else {
            $select = $mform->addElement('select', 'courseid', get_string('coursename','local_access_level_org_report'), array());
        }
        $mform->addHelpButton('courseid', 'coursename', 'local_access_level_org_report');
        $mform->addRule('courseid', get_string('required'), 'required', null, 'client');
        $select->setSelected('select-all');
        $select->setMultiple(true);
    } else {
        $select = $mform->addElement('select', 'courseid', get_string('coursename','local_access_level_org_report'), array());
        $mform->addHelpButton('courseid', 'coursename', 'local_access_level_org_report');
        $select->setSelected('select-all');
        $select->setMultiple(true);
    }
    $mform->addHelpButton('courseid', 'coursename', 'local_access_level_org_report');
    $mform->addRule('courseid', get_string('required'), 'required', null, 'client');
    $select->setSelected('select-all');
    $select->setMultiple(true);
        //normally you use add_action_buttons instead of this code
    $buttonarray=array();
    $buttonarray[] = $mform->createElement('submit', 'submitbutton', get_string('submit'));
    $buttonarray[] = $mform->createElement('cancel');
    $mform->addGroup($buttonarray, 'buttonar', '', ' ', false);
}
}

