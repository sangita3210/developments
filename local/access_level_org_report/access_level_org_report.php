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
 * @author  Prashant Yallatti<prashant@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */
require_once('../../config.php');
require_once('form/access_level_org_report_form.php');
require_once($CFG->libdir . '/formslib.php');
require_once($CFG->dirroot.'/local/access_level_org_report/csslinks.php');
require_login(0,false);
$capadmin = is_siteadmin();
$context = context_system::instance();
//$createorgcap = has_capability('local/accesscohort:addorganization',$context);
$PAGE->set_context(context_system::instance());
$title = get_string('accessinfohdr', 'local_access_level_org_report');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_pagelayout('admin');
//forcapabilty aassiging here 
$systemcontext = context_system::instance();
$myreport = has_capability('local/access_level_org_report:myreport',$systemcontext);
$allreport = has_capability('local/access_level_org_report:allreport',$systemcontext);
$PAGE->set_url('/local/access_level_org_report/access_level_org_report.php');
$PAGE->requires->jquery();		
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/access_level_org_report/js/select.js'));
require_login();
$PAGE->navbar->ignore_active();
$previewnode = $PAGE->navbar->add(get_string('pluginname','local_access_level_org_report'),new moodle_url($CFG->wwwroot.'/local/access_level_org_report/access_level_org_report.php'), navigation_node::TYPE_CONTAINER);
$thingnode = $previewnode->add($title, new moodle_url($CFG->wwwroot.'/local/access_level_org_report/access_level_org_report.php'));
$thingnode->make_active();
//include_once('../datatable.php');
include_once('jslink.php');
echo $OUTPUT->header();
$data1 = '';
$dateformat = '%d-%b-%Y';
$mform = new local_access_level_org_report_form(null,array('csdata'=>$_POST));
if($myreport||$allreport){
	 $n  = (get_string('dis','local_access_level_org_report'));
	 echo $n;
	$mform->display();
}else {
	echo html_writer::div(
				get_string('cap', 'local_access_level_org_report'),'alert alert-danger'
				);
}
$temp = false;
$table = '';
if($myreport||$allreport){
	if ($mform->is_cancelled()){
		redirect(new moodle_url('/my', array()));
	} else if ($data = $mform->get_data()) {
		//table body is defining here 
		$table = new html_table();
		$table->id =  'example';
		$table->head = (array) get_strings(array('uname', 'fname','email', 'orgname','chname','cat','cname','lastac','cmdate','score','status'), 'local_access_level_org_report');
		foreach($data->cohort_id as $cohortid11){
			foreach($data->courseid as $courseid11){
				//new if condtion is need to write code here 
				if(($cohortid11=='select-all') &&($courseid11=='select-all')){
					//return all cohort ids here 
					$cohortids = allchortids($data->org_id);
					//return organization name
					$orgname = org_name($data->org_id);
					if($cohortids){
						if($orgname){
							foreach ($cohortids as $cohort) {
								$enrolcourseids1 = enrol_courseids($cohort);
								if($enrolcourseids1){
									foreach ($enrolcourseids1 as  $enrolcourseids) {
										//returning all enrolled user details,organization name,course name,progress  and status here   
										$table = master_data($enrolcourseids->customint1,$enrolcourseids->id,$enrolcourseids->courseid,$data->org_id,$table);	
									}
								}

							}
						}
					}

				}
				//end if condtion here 	
				//new short code is adding here 
				else if(($cohortid11)=='select-all' && isset($courseid11)){
					//return array of cohortids
					$allcohortids = allchortids($data->org_id);
					if($allcohortids){
					//return enrol table object 						
						$instances = enrol_get_instances($courseid11, true);
						if($instances){
							foreach ($instances as $cohortids) {
								if($cohortids->enrol == 'cohort'){
									if(in_array($cohortids->customint1, $allcohortids)){ 
										//returning all enrolled user details,organization name,course name,progress  and status here
										$table = master_data($cohortids->customint1,$cohortids->id,$cohortids->courseid,$data->org_id,$table);
									}
								}
							}
						}
					}						
				}
				///next short code here 
				else if(($courseid11)=='select-all' && isset($cohortid11)){
					//return  courseids 
					$enrolcourseids = enrol_courseids($cohortid11);
					if($enrolcourseids){
						foreach ($enrolcourseids as $enrolcourseid) {
						//returning all enrolled user details,organization name,course name,progress  and status here		
							$table = master_data($enrolcourseid->customint1,$enrolcourseid->id,$enrolcourseid->courseid,$data->org_id,$table);
						}
					}
				}
				else{
					//this function return all course and cohortids
					$enrolcourseids = enrol_courseids_cohortids($cohortid11,$courseid11);
					if($enrolcourseids){
						//returning all enrolled user details,organization name,course name,progress  and status here
						foreach ($enrolcourseids as $enrolcourseid) {					
							$table = master_data($enrolcourseid->customint1,$enrolcourseid->id,$enrolcourseid->courseid,$data->org_id,$table);
						}
					}
					
				}
					///end of displaying value here
			}//second if is completed here 

		}//end of all selected condition here
		if($table){
			echo html_writer::table($table);
		}else {
			echo html_writer::div(
				get_string('no', 'local_access_level_org_report'),'alert alert-danger'
				);

		}

	}
}
echo $OUTPUT->footer();


