<?php

function local_clinical_care_extend_navigation(global_navigation $nav) {
     global $CFG;
         $coursename = get_string('pluginname','local_clinical_care');
         $url = '#';
         $flat = new flat_navigation_node(navigation_node::create($coursename, $url), 0);
         $nav->add_node($flat);
         $abc = $nav->add(get_string('pluginname','local_clinical_care'), 
                $CFG->wwwroot.'/local/clinical_care/view.php');
         $abc->showinflatnavigation = true;
         $xyz = $nav->add(get_string('form','local_clinical_care'),
                $CFG->wwwroot.'/local/clinical_care/clinical_care.php');
         $xyz->showinflatnavigation = true;
}


function select_key_value(){
	$array  = array(
	'tjc' => 'Which One TJC/NCQA',
    'progress_far'=>'What Is Your Progress Thus Far',
    'plan_to_submit'=>'When Do You Plan To Submit/Will Be Surveyed',
    'measured'=>'Access Measures as measured by Third Next Available',
    'panel'=>'Panel Size',
    'cycle_time'=>'Cycle time',
    'no-show'=>'No-Show',
    'supply_demand'=>'Supply and Demand',
    'backlog'=>'Backlog',
    'continuity'=>'Continuity',
    'hypertension'=>'Hypertension Control',
    'diabetes_control'=>'Poor Control (A1C > 9),Healthy Blood Pressure and Diabetes, LDL Control',
    'tobacco_use_queried'=>'Tobacco Use Queried, ages 18+ and Tobacco Intervention, ages 18+',
    'weight_screening'=>' Weight Screening and Intervention, ages 18+',
    'cad_ldl'=>'CAD with LDL Control (New UDS)',
    'other'=>' Other please list',
    'operating_margin '=>'Operating Margin ',
    'cost_per_encounter '=>'Cost per Encounter',
    'cost_per_patient '=>'Cost per Patient ',
    'patient_receivables'=>' Days in Net Patient Receivables',
    'cash_on_hand'=>'Days Cash on Hand',
    'other'=>' Other please list',
    'tachc_cahps'=>'TACHC CAHPS (7)',
    'cahps'=>'CAHPS',
    'internally_developed_document'=>'Internally Developed Document',
    'other'=>' Other please list',
    'er_visits'=>'ER visits',
    'hospitalizations'=>'Hospitalizations for patients with defined ambulatory-sensitive care conditions',
    'hospital_readmissions '=>'30-day hospital readmissions ',
    'redundant_imaging'=>'Redundant imaging or lab tests',
    'generic_brand'=>'Generic vs. brand name prescriptions',
    'specialty_referrals'=>'Specialty referrals',
    'other'=>' Other please list',
    'coding/level'=>'Provider Coding/Level of Care/Patient Risk',
    'internally_prepared'=>'Internally  prepared product developed ',
    'vendor'=>'Vendor or commercially prepared product',
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
	return $array;
}