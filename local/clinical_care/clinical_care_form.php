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
 * 
 *
 * @package    local_clinical_care
 * @copyright   Dhruv Infoline Pvt Ltd   
 * @license     http://lmsofindia.com
 * @author     Prashant Yallatti <prashant@elearn10.com>
 * 
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.'); /// It must be included from a Moodle page
}
require_once($CFG->libdir.'/formslib.php');

class local_clinical_care_form extends moodleform {
    function definition() {
        global $CFG;
        $mform =& $this->_form;
        $mform->addElement('static', 'headertitle', null,get_string('formtitle', 'local_clinical_care'));
        //first section
        $mform->addElement('header','healthinfohdr',get_string('healthinfo','local_clinical_care'));
        $mform->setExpanded('healthinfohdr');


        $mform->addElement('text', 'health_center_name', get_string('health_center_name','local_clinical_care'));
        $mform->setDefault('health_center_name', null);
        $mform->setType('health_center_name', PARAM_NOTAGS);
        $mform->addRule('health_center_name', 'required', 'required', null, 'client');
        $mform->addHelpButton('health_center_name','health_center_name','local_clinical_care');

        $mform->addElement('text', 'contact_person', get_string('contact_person','local_clinical_care'));
        $mform->setDefault('contact_person', null);
        $mform->setType('contact_person', PARAM_NOTAGS);
        $mform->addRule('contact_person', 'required', 'required', null, 'client');
        $mform->addHelpButton('contact_person','contact_person','local_clinical_care');

        $mform->addElement('text', 'phone_number', get_string('phone_number','local_clinical_care'));
        $mform->setDefault('phone_number', null);
        $mform->setType('phone_number', PARAM_NOTAGS);
        $mform->addRule('phone_number', 'required', 'required', null, 'client');
        $mform->addHelpButton('phone_number','phone_number','local_clinical_care');


         //second section
        $mform->addElement('header','interest1hdr',get_string('interest','local_clinical_care'));
        $mform->setExpanded('interest1hdr');
        $mform->addElement('static','interest1', null,get_string('interest1','local_clinical_care'));

        $mform->addElement('htmleditor', 'interest', get_string('interest','local_clinical_care'));
        $mform->setDefault('interest', null);
        $mform->setType('interest', PARAM_NOTAGS);
        //$mform->addRule('interest', 'required', 'required', null, 'client');
         $mform->addHelpButton('interest','interest','local_clinical_care');


        //third section
        $mform->addElement('header','experiencehdr',get_string('experience','local_clinical_care'));
        $mform->setExpanded('experiencehdr');

        $mform->addElement('static','static', null,get_string('experience1','local_clinical_care'));
        $mform->addElement('htmleditor', 'experience', get_string('experience','local_clinical_care'));
        $mform->setDefault('experience', null);
        $mform->setType('experience', PARAM_NOTAGS);
        $mform->addHelpButton('experience','experience','local_clinical_care');


        //Fourth Section
        $mform->addElement('header','barriershdr',get_string('barriers','local_clinical_care'));
        $mform->setExpanded('barriershdr');

        $mform->addElement('static','static', null,get_string('barriers1','local_clinical_care'));
        $mform->addElement('htmleditor', 'barriers', get_string('barriers','local_clinical_care'));
        $mform->setDefault('barriers', null);
        $mform->setType('barriers', PARAM_NOTAGS);
        //fifth Section
        $mform->addElement('header','learning_activityhdr',get_string('learning_activity','local_clinical_care'));
        $mform->setExpanded('learning_activityhdr');

        $mform->addElement('static','static', null,get_string('learning_activity1','local_clinical_care'));
        $mform->addElement('htmleditor', 'learning_activity', get_string('learning_activity','local_clinical_care'));
        $mform->setDefault('learning_activity', null);
        $mform->setType('learning_activity', PARAM_NOTAGS);
        //sixth Section
        $mform->addElement('header','time_commitmentshdr',get_string('time_commitments','local_clinical_care'));
        $mform->setExpanded('time_commitmentshdr');

        $mform->addElement('static','static', null,get_string('time_commitments1','local_clinical_care'));
        $mform->addElement('htmleditor', 'time_commitments', get_string('time_commitments','local_clinical_care'));
        $mform->setDefault('time_commitments', null);
        $mform->setType('time_commitments', PARAM_NOTAGS);
        //7th Section 
        $mform->addElement('header','namehdr',get_string('name','local_clinical_care'));
        $mform->setExpanded('namehdr');


        $ncqa = array(
            'tjc'=>'Which One TJC/NCQA',
            'progress_far'=>'What Is Your Progress Thus Far:',
            'plan_to_submit'=>'When Do You Plan To Submit/Will Be Surveyed:'
            );
        $mform->addElement('static','static', null,get_string('name1','local_clinical_care'));
        $mform->addElement('searchableselector', 'tjc_recognition', get_string('name','local_clinical_care'),$ncqa);
        $mform->setType('tjc_recognition',PARAM_RAW);   
        //8th Section
        $mform->addElement('header','feedbackhdr',get_string('feedback','local_clinical_care'));
        $mform->setExpanded('feedbackhdr');

        $mform->addElement('static','static', null,get_string('feedback1','local_clinical_care'));
        $mform->addElement('htmleditor', 'feedback', get_string('feedback','local_clinical_care'));
        $mform->setDefault('feedback', null);
        $mform->setType('feedback', PARAM_NOTAGS);
        //9th Section
        $mform->addElement('header','systemhdr',get_string('system','local_clinical_care'));
        $mform->setExpanded('systemhdr');

        $ncqa = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('epm1','local_clinical_care'));
        $mform->addElement('searchableselector', 'epm', get_string('epm','local_clinical_care'),$ncqa,array('single'));
        $mform->setType('epm',PARAM_RAW);
        
        $mform->addElement('static','static', null,get_string('integrated_program1','local_clinical_care'));
        $mform->addElement('text', 'integrated_program', get_string('integrated_program','local_clinical_care'));
        $mform->setDefault('integrated_program', null);
        $mform->setType('integrated_program', PARAM_RAW);

        $mform->addElement('static','static', null,get_string('medical_dental_program1','local_clinical_care'));
        $mform->addElement('text', 'medical_ehr', get_string('medical_ehr','local_clinical_care'));
        $mform->setDefault('medical_ehr', null);
        $mform->setType('medical_ehr', PARAM_RAW);

        $mform->addElement('text', 'dental_edr', get_string('dental_edr','local_clinical_care'));
        $mform->setDefault('dental_edr', null);
        $mform->setType('dental_edr', PARAM_RAW);

        $customized_report = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('customized_report1','local_clinical_care'));
        $mform->addElement('searchableselector', 'customized_report', get_string('customized_report','local_clinical_care'),$customized_report,array('single'));
        $mform->setType('customized_report',PARAM_RAW);

        $controlled_network = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('tachc_health1','local_clinical_care'));
        $mform->addElement('searchableselector', 'tachc_health', get_string('tachc_health','local_clinical_care'),$controlled_network,array('single'));
        $mform->setType('tachc_health',PARAM_RAW);

        $willing_to_join = array(
            'yes'=>'Yes',
            'no'=>'No',
            'yes/no'=>'N/A'
            );
        $mform->addElement('static','static', null,get_string('willing_to_join1','local_clinical_care'));
        $mform->addElement('searchableselector', 'willing_to_join', get_string('willing_to_join','local_clinical_care'),$willing_to_join,array('single'));
        $mform->setType('willing_to_join',PARAM_RAW);


        $health_info_exchange = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('health_info_exchange1','local_clinical_care'));
        $mform->addElement('searchableselector', 'health_info_exchange', get_string('health_info_exchange','local_clinical_care'),$health_info_exchange,array('single'));
        $mform->setType('health_info_exchange',PARAM_RAW);

        $health_center_registry = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('health_center_registry1','local_clinical_care'));
        $mform->addElement('searchableselector', 'health_center_registry', get_string('health_center_registry','local_clinical_care'),$health_center_registry,array('single'));
        $mform->setType('health_center_registry',PARAM_RAW);

        $clinical_area   = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('clinical_area1','local_clinical_care'));
        $mform->addElement('searchableselector', 'clinical_area', get_string('clinical_area','local_clinical_care'),$clinical_area ,array('single'));
        $mform->setType('clinical_area',PARAM_RAW);

        $connected_network = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('connected_network1','local_clinical_care'));
        $mform->addElement('searchableselector', 'connected_network', get_string('connected_network','local_clinical_care'),$connected_network ,array('single'));
        $mform->setType('connected_network',PARAM_RAW);

        $individual_email = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('individual_email1','local_clinical_care'));
        $mform->addElement('searchableselector', 'individual_email', get_string('individual_email','local_clinical_care'),$individual_email ,array('single'));
        $mform->setType('individual_email',PARAM_RAW);


        $collection_report = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('collection_report1','local_clinical_care'));
        $mform->addElement('searchableselector', 'collection_report', get_string('collection_report','local_clinical_care'),$collection_report ,array('single'));
        $mform->setType('collection_report',PARAM_RAW);

        $data_collection_report = array(
            'yes'=>'Yes',
            'no'=>'No'
            );
        $mform->addElement('static','static', null,get_string('data_collection_report1','local_clinical_care'));
        $mform->addElement('searchableselector', 'data_collection_report', get_string('data_collection_report','local_clinical_care'),$data_collection_report ,array('single'));
        $mform->setType('data_collection_report',PARAM_RAW);
        //10th Section
        $mform->addElement('header','data_collectionhdr',get_string('data_collection','local_clinical_care'));
        $mform->setExpanded('data_collectionhdr');

        $mform->addElement('static','static', null,get_string('ncqa','local_clinical_care'));
        $mform->addElement('static','static', null,get_string('measures','local_clinical_care'));
         $access_measure = array(
            'measured'=>'Access Measures as measured by Third Next Available',
            'panel'=>'Panel Size '
            );
        $mform->addElement('searchableselector', 'access_measure', get_string('access_measure','local_clinical_care'),$access_measure ,array('single'));
        $mform->setType('access_measure',PARAM_RAW);

        $efficiency_measure = array(
            'cycle_time'=>'Cycle time',
            'no_show'=>'No-Show',
            'supply_demand'=>'Supply and Demand',
            'backlog'=>'Backlog',
            'continuity'=>'Continuity'
            );
        $mform->addElement('searchableselector', 'efficiency_measure', get_string('efficiency_measure','local_clinical_care'),$efficiency_measure ,array('single'));
        $mform->setType('efficiency_measure',PARAM_RAW);

        $Clinical = array(
            'hypertension'=>'Hypertension Control',
            'diabetes_control'=>'Poor Control (A1C > 9),Healthy Blood Pressure and Diabetes, LDL Control',
            'tobacco_use_queried'=>'Tobacco Use Queried, ages 18+ and Tobacco Intervention, ages 18+',
            'weight_screening'=>' Weight Screening and Intervention, ages 18+',
            'cad_ldl'=>'CAD with LDL Control (New UDS)',
            'other'=>' Other please list'
            );
        $mform->addElement('searchableselector', 'clinical', get_string('clinical','local_clinical_care'),$Clinical ,array('single'));
        $mform->setType('clinical',PARAM_RAW);

        $financial = array(
            'operating_margin '=>'Operating Margin ',
            'cost_per_encounter '=>'Cost per Encounter',
            'cost_per_patient '=>'Cost per Patient ',
            'patient_receivables'=>' Days in Net Patient Receivables',
            'cash_on_hand'=>'Days Cash on Hand',
            'other'=>' Other please list'
            );
        $mform->addElement('searchableselector', 'financial', get_string('financial','local_clinical_care'),$financial ,array('single'));
        $mform->setType('financial',PARAM_RAW);

        $patient_satisfaction = array(
            'tachc_cahps'=>'TACHC CAHPS (7)',
            'cahps'=>'CAHPS',
            'internally_developed_document'=>'Internally Developed Document',
            'other'=>' Other please list'
            );
        $mform->addElement('searchableselector', 'patient_satisfaction', get_string('patient_satisfaction','local_clinical_care'),$patient_satisfaction ,array('single'));
        $mform->setType('patient_satisfaction',PARAM_RAW);

        $utilization_measure = array(
            'er_visits'=>'ER visits',
            'hospitalizations'=>'Hospitalizations for patients with defined ambulatory-sensitive care conditions',
            'hospital_readmissions '=>'30-day hospital readmissions ',
            'redundant_imaging'=>'Redundant imaging or lab tests',
            'generic_brand'=>'Generic vs. brand name prescriptions',
            'specialty_referrals'=>'Specialty referrals',
            'other'=>' Other please list',
            'coding/level'=>'Provider Coding/Level of Care/Patient Risk'
            );
        $mform->addElement('searchableselector', 'utilization_measure', get_string('utilization_measure','local_clinical_care'),$utilization_measure ,array('single'));
        $mform->setType('utilization_measure',PARAM_RAW);

        $staff_satisfaction = array(
            'internally_prepared'=>'Internally  prepared product developed ',
            'vendor'=>'Vendor or commercially prepared product'
            
            );
        $mform->addElement('searchableselector', 'staff_satisfaction', get_string('staff_satisfaction','local_clinical_care'),$staff_satisfaction ,array('single'));
        $mform->setType('staff_satisfaction',PARAM_RAW);
        //11th Section
        $mform->addElement('header','performance_impovementhdr',get_string('performance_impovement','local_clinical_care'));
        $mform->setExpanded('performance_impovementhdr');


         $mform->addElement('static','static', null,get_string('performance_impovement1','local_clinical_care'));
         $mform->addElement('htmleditor', 'performance_impovement', get_string('performance_impovement','local_clinical_care'));
        $mform->setDefault('performance_impovement', null);
        $mform->setType('performance_impovement', PARAM_NOTAGS);
        //12th Section
        //13th Section
        $mform->addElement('header','team_rosterhdr',get_string('team_roster','local_clinical_care'));
        $mform->setExpanded('team_rosterhdr');

        $team_roster = array(
            'team_coordinator'=>'Your OC3 Team Coordinator',
            'chief_executive_officer'=>'Chief Executive Officer',
            'chief_medical_officer'=>'Chief Medical Officer',
            'chief_operating_officer'=>'Chief Operating Officer',
            'nursing_supervisor'=>'Nursing Supervisor',
            'site_manager'=>'Site Manager',
            'quality_improvement'=>'Quality Improvement Coordinator',
            'medical_assistant'=>'Medical Assistant',
            'compliance_coordinator'=>'Compliance Coordinator',
            'front_desk'=>'Front Desk',
            'call_center'=>'Call Center',
            'other'=>'Other, please define'
            );
        $mform->addElement('searchableselector', 'team_roster', get_string('team_roster','local_clinical_care'),$team_roster ,array('single'));
        $mform->setType('team_roster',PARAM_RAW);
        //13th Section
        $mform->addElement('header','signaturehdr',get_string('signature','local_clinical_care'));
        $mform->setExpanded('signaturehdr');


        $mform->addElement('static','static', null,get_string('signature1','local_clinical_care'));
         $mform->addElement('htmleditor', 'signature', get_string('signature','local_clinical_care'));
        $mform->setDefault('signature', null);
        $mform->setType('signature', PARAM_NOTAGS);    
        $this->add_action_buttons();
    }
}

