	<?php
	require('../../config.php');
	require_once($CFG->dirroot.'/local/clinical_care/lib.php');
	require_login(0 , FALSE);
	$id = required_param('id', PARAM_INT);
	//print_object($id);die();
	$listrecord = array();
	if(is_siteadmin()){
		$listrecord = $DB->get_record('local_clinic_care',array('id' => $id));
	}else{
		$listrecord = $DB->get_record('local_clinic_care',array('id' => $id,'userid'=>$USER->id));
	}

	$userid = $USER->id;
	$sql1 = "SELECT  cc.id,firstname,lastname,email
			from {local_clinic_care}  cc
			INNER JOIN {user}  u
			on cc.userid = u.id
			where cc.userid = $userid and cc.id = $id";
	$sub_user = $DB->get_records_sql($sql1);
	foreach($sub_user as $result){
		$fname = $result->firstname;
		$lname = $result->lastname;
		$email = $result->email;
	}

	$PAGE->set_context(context_system::instance());
	$PAGE->set_pagelayout('admin');
	$PAGE->set_title(get_string('pluginname', 'local_clinical_care'));
	$PAGE->set_heading(get_string('pluginname', 'local_clinical_care'));
	$PAGE->set_url('/local/clinical_care/list.php');
	$PAGE->navbar->add(get_string('form', 'local_clinical_care'));
	$PAGE->requires->css('/style.css');
	echo $OUTPUT->header();
	//print_object($listrecord);
	$name = select_key_value();
	//echo $name['tjc'];
	if($listrecord){
	echo '
	<div class="col-md-12">	
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<h1 style="color:#00acdf;font-family: "Times New Roman", Times, serif;">Clinical Care Form Submitted User Details</h1>
					<div class="caption">

						First Name<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$fname.'</span><br>
						Last Name<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$lname.'</span><br>
						Email<span style="padding-left:85px;">:</span><span style="padding-left:50px;">'.$email.'</span><br>
					</div>
				</div>
				<div class="jumbotron">
					<div class="caption">
						<h5>Health Center Information</h5>
						Health Center Name<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->health_center_name.'</span><br>
						Contact Person<span style="padding-left:85px;">:</span><span style="padding-left:50px;">'.$listrecord->contact_person.'</span><br>
						Phone Number<span style="padding-left:85px;">:</span><span style="padding-left:50px;">'.$listrecord->phone_number.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Interest</h5>
						Intrest<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->interest.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Experience</h5>
						Experience<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->experience.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Barriers</h5>
						Barriers<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->barriers.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Previous Learning Activity</h5>
						Previous Learning Activity <span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->learning_activity.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Time Commitments</h5>
						Time Commitments<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->time_commitments.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>NCQA or TJC Recognition</h5>';
						//echo $listrecord->tjc_recognition;
						if( $listrecord->tjc_recognition=='tjc'){
						echo 'NCQA or TJC Recognition:'.$name['tjc'].'<br>';
						}
						if($listrecord->tjc_recognition =='progress_far'){
							echo "NCQA or TJC Recognition:".$name['progress_far'].'<br>';
						}
						if($listrecord->tjc_recognition=='plan_to_submit'){
							echo 'NCQA or TJC Recognition:'.$name['plan_to_submit'].'<br>';
						}

			echo '	</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption"> 
						<h5>Query</h5>
						Query <span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->feedback.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>System</h5>
						Technology Capacity<span style="padding-left:250px;">:</span><span style="padding-left:50px;">'.$listrecord->epm.'</span><br>
						EMP, EMR, EDR program <span style="padding-left:221px;">:</span><span style="padding-left:50px;">'.$listrecord->integrated_program.'</span><br>
						Medical EHR<span style="padding-left:303px;">:</span><span style="padding-left:50px;">'.$listrecord->medical_ehr.'<br>
						Dental EDR<span style="padding-left:311px;">:</span><span style="padding-left:50px;">'.$listrecord->dental_edr.'<br>
						EHR/EDR systems<span style="padding-left:269px;">:</span><span style="padding-left:50px;">'.$listrecord->customized_report.'<br>
						TACHC’s Health Center <span style="padding-left:232px;">:</span><span style="padding-left:50px;">'.$listrecord->tachc_health.'<br>
						Willing to join TACHC’s<span style="padding-left:238px;">:</span><span style="padding-left:50px;">'.$listrecord->willing_to_join.'<br>
						Health Center Controlled <span style="padding-left:218px;">:</span><span style="padding-left:50px;">'.$listrecord->health_info_exchange.'<br>
						Health Center Report<span style="padding-left:246px;">:</span><span style="padding-left:50px;">'.$listrecord->health_center_registry.'<br>
						Computer Available Clinical Area<span style="padding-left:172px;">:</span><span style="padding-left:50px;">'.$listrecord->clinical_area.'<br>
						Computer is Connected Network<span style="padding-left:171px;">:</span><span style="padding-left:50px;">'.$listrecord->connected_network.'<br>
						Team members have access to the internet<span style="padding-left:103px;">:</span><span style="padding-left:50px;">'.$listrecord->individual_email.'<br>
						Dedicated to data collection and reporting<span style="padding-left:110px;">:</span><span style="padding-left:50px;">'.$listrecord->data_collection_report.'<br>
						Person dedicated to data collection and reporting<span style="padding-left:62px;">:</span><span style="padding-left:50px;">'.$listrecord->data_collection_report.'
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Data Collection</h5>
						';
						if($listrecord->access_measure == 'measured'){
						echo 'Access Measures<span style="padding-left:100px;">:</span>
							<span style="padding-left:50px;">'.$name['measured'].'</span><br>';
						}
						if($listrecord->access_measure == 'panel'){
						echo 'Access Measures <span style="padding-left:100px;">:</span><span style="padding-left:50px;">'.$name['panel'].'</span><br>';
						}
						if($listrecord->efficiency_measure=='cycle_time'){
						echo 'Efficiency Measures <span class="access">:</span><span class="a1">'.$name['cycle_time'].'</span><br>';
						}
						if($listrecord->efficiency_measure=='no_show'){
						echo 'Efficiency Measures <span class="access">:</span><span class="a1">'.$name['no_show'].'</span><br>';
						}
						if($listrecord->efficiency_measure=='supply_demand'){
						echo 'Efficiency Measures <span class="access">:</span><span class="a1">'.$name['supply_demand'].'</span><br>';
						}
						if($listrecord->efficiency_measure=='backlog'){
						echo 'Efficiency Measures <span class="access">:</span><span class="a1">'.$name['backlog'].'</span><br>';
						}
						if($listrecord->efficiency_measure=='continuity'){
						echo 'Efficiency Measures<span class="access">:</span><span class="a1">'.$name['continuity'].'</span><br>';
						}
						//clinical
						if($listrecord->clinical=='hypertension'){
							echo 'Clinical <span class="dot">:</span><span class="a1">'.$name['hypertension'].'<br>';
						}
						if($listrecord->clinical=='diabetes_control'){
							echo 'Clinical <span class="dot">:</span><span class="a1">'.$name['diabetes_control'].'<br>';
						}
						if($listrecord->clinical=='tobacco_use_queried'){
							echo 'Clinical <span class="dot">:</span><span class="a1">'.$name['tobacco_use_queried'].'<br>';
						}
						if($listrecord->clinical=='weight_screening'){
							echo 'Clinical <span class="dot">:</span><span class="a1">'.$name['weight_screening'].'<br>';
						}
						if($listrecord->clinical=='cad_ldl'){
							echo 'Clinical <span class="dot">:</span><span class="a1">'.$name['cad_ldl'].'<br>';
						}
						if($listrecord->clinical=='other'){
							echo 'Clinical<span class="dot">:</span><span class="a1">'.$name['other'].'<br>';
						}
						//financial
						if($listrecord->financial=='operating_margin'){
							echo 'Financial<span class="dot7">:</span><span class="a1">'.$name['operating_margin'].'<br>';
						}
						if($listrecord->financial=='cost_per_encounter'){
							echo 'Financial<span class="dot7">:</span><span class="a1">'.$name['cost_per_encounter'].'<br>';
						}
						if($listrecord->financial=='cost_per_patient'){
							echo 'Financial <span class="dot7">:</span><span class="a1">'.$name['cost_per_patient'].'<br>';
						}
						if($listrecord->financial=='patient_receivables'){
							echo 'Financial<span class="dot7">:</span><span class="a1">'.$name['patient_receivables'].'<br>';
						}
						if($listrecord->financial=='cash_on_hand'){
							echo 'Financial <span class="dot7">:</span><span class="a1">'.$name['cash_on_hand'].'<br>';
						}
						if($listrecord->financial=='other'){
							echo 'Financial <span class="dot7">:</span><span class="a1">'.$name['other'].'<br>';
						}
						//Patient Satisfaction
						if($listrecord->patient_satisfaction=='tachc_cahps'){
							echo 'Patient Satisfaction <span class="dot1">:</span><span class="a1">'.$name['tachc_cahps'].'<br>';
						}
						if($listrecord->patient_satisfaction=='cahps'){
							echo 'Patient Satisfaction <span class="dot1">:</span><span class="a1">'.$name['cahps'].'<br>';
						}
						if($listrecord->patient_satisfaction=='internally_developed_document'){
							echo 'Patient Satisfaction<span class="dot1">:</span><span class="a1">'.$name['internally_developed_document'].'<br>';
						}
						if($listrecord->patient_satisfaction=='other'){
							echo 'Patient Satisfaction <span class="dot1">:</span><span class="a1">'.$name['other'].'<br>';
						}
						//Utilization Measure
						if($listrecord->utilization_measure=='er_visits'){
							echo 'Utilization Measure <span class="dot2">:</span><span class="a1">'.$name['er_visits'].'<br>';
						}
						if($listrecord->utilization_measure=='hospitalizations'){
							echo 'Utilization Measure <span class="dot2">:</span><span class="a1">'.$name['hospitalizations'].'<br>';
						}
						if($listrecord->utilization_measure=='redundant_imaging'){
							echo 'Utilization Measure <span class="dot2">:</span><span class="a1">'.$name['redundant_imaging'].'<br>';
						}
						if($listrecord->utilization_measure=='generic_brand'){
							echo 'Utilization Measure <span class="dot2">:</span><span class="a1">'.$name['generic_brand'].'<br>';
						}
						if($listrecord->utilization_measure=='specialty_referrals'){
							echo 'Utilization Measure <span class="dot2">:</span><span class="a1">'.$name['specialty_referrals'].'<br>';
						}
						if($listrecord->utilization_measure=='other'){
							echo 'Utilization Measure<span class="dot2">:</span><span class="a1">'.$name['other'].'<br>';
						}
						//Staff Engagement/Satisfaction
						if($listrecord->staff_satisfaction=='coding/level'){
							echo 'Staff Engagement/Satisfaction<span class="dot3">:</span><span class="a1">'.$name['coding/level'].'<br>';
						}
						if($listrecord->staff_satisfaction=='internally_prepared'){
							echo 'Staff Engagement/Satisfaction <span class="dot3">:</span><span class="a1">'.$name['internally_prepared'].'<br>';
						}
						if($listrecord->staff_satisfaction=='vendor'){
							echo 'Staff Engagement/Satisfaction <span class="dot3">:</span><span class="a1">'.$name['vendor'].'<br>';
						}
					echo'	</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Performance Improvement Plan.</h5>
						Performance Improvement Plan<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->performance_impovement.'</span><br>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Team Roster</h5>';
						if($listrecord->team_roster=='team_coordinator'){
						echo 'Team Roster:'.$name['team_coordinator'].'<br>';
						}
						if($listrecord->team_roster=='chief_executive_officer'){
						echo 'Team Roster:'.$name['chief_executive_officer'].'<br>';
						}
						if($listrecord->team_roster=='chief_medical_officer'){
						echo 'Team Roster:'.$name['chief_medical_officer'].'<br>';
						}
						if($listrecord->team_roster=='chief_operating_officer'){
						echo 'Team Roster:'.$name['chief_operating_officer'].'<br>';
						}
						if($listrecord->team_roster=='nursing_supervisor'){
						echo 'Team Roster:'.$name['nursing_supervisor'].'<br>';
						}
						if($listrecord->team_roster=='site_manager'){
						echo 'Team Roster:'.$name['site_manager'].'<br>';
						}
						if($listrecord->team_roster=='quality_improvement'){
						echo 'Team Roster:'.$name['quality_improvement'].'<br>';
						}
						if($listrecord->team_roster=='medical_assistant'){
						echo 'Team Roster:'.$name['medical_assistant'].'<br>';
						}
						if($listrecord->team_roster=='compliance_coordinator'){
						echo 'Team Roster:'.$name['compliance_coordinator'].'<br>';
						}
						if($listrecord->team_roster=='front_desk'){
						echo 'Team Roster:'.$name['front_desk'].'<br>';
						}
						if($listrecord->team_roster=='call_center'){
						echo 'Team Roster:'.$name['call_center'].'<br>';
						}
						if($listrecord->team_roster=='other'){
						echo 'Team Roster:'.$name['other'].'<br>';
						}
					echo '</div>
				</div>
			</div>
			
			
			
			<div class="col-md-12 col-sm-3 col-xs-6  col-xs-12">
				<div class="jumbotron">
					<div class="caption">
						<h5>Commitment and Signatures</h5>
						Commitment<span style="padding-left:50px;">:</span><span style="padding-left:50px;">'.$listrecord->signature.'</span><br>
					</div>
				</div>
			</div>
			</div>';
		}
		else {
			$record = $DB->get_record('local_clinic_care',array('id' => $id));
			if($record){
				echo '<div class="alert alert-warning">You cant not access this is page </div>';
			}else{
				echo '<div class="alert alert-danger">
   						Invalid id enterd.
						</div>';
			}			
		}
		
		echo'<form action="">
		<button type="submit" class="btn btn-primary btn-lg" id="primary" >Download</button>
		</form>';
	echo $OUTPUT->footer();