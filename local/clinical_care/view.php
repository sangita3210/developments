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

	/*defined('MOODLE_INTERNAL') || die();
	*/
	require('../../config.php');
	require_login(0 , FALSE);
	$context = context_user::instance($USER->id);
	$PAGE->set_context($context);
	$authenticate = has_capability('local/clinical_care:viewall', $context);
	$PAGE->set_pagelayout('admin');
	$PAGE->set_title(get_string('pluginname', 'local_clinical_care'));
	$PAGE->set_heading(get_string('pluginname', 'local_clinical_care'));
	$PAGE->set_url('/local/clinical_care/view.php');
	$PAGE->requires->css(new moodle_url($CFG->wwwroot.'/local/clinical_care/simplePagination.css'));
	$PAGE->requires->css('/styles.css');
	$PAGE->requires->jquery('pagination.js');
	echo $OUTPUT->header();
	$records = $DB->get_records('local_clinic_care');

	$table = new html_table();
	
	$page_per_records = 5;
	$page = '';
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	else{
		$page = 1;
	}
	
	$start_from = ($page-1)*$page_per_records;
	$table->head = (array) get_strings(array('health', 'firstname','lastname','email','action'), 'local_clinical_care');
	$id = $USER->id;
	if(!$authenticate){
		$sql = "SELECT  cc.id,health_center_name,firstname,lastname,email,userid
			from {local_clinic_care}  cc
			INNER JOIN {user}  u
			on cc.userid = u.id
			where cc.userid = $id
			ORDER BY cc.id ASC LIMIT $start_from,$page_per_records";
		}else{
			
			$sql = "SELECT  cc.id,health_center_name,firstname,lastname,email,userid
			from {local_clinic_care}  cc
			INNER JOIN {user}  u
			on cc.userid = u.id
			ORDER BY cc.id ASC LIMIT $start_from,$page_per_records";
	}


	$records1 = $DB->get_records_sql($sql);
	//$total_record = count($records1);
	//print_object($records1);
	if($records1==null){
		echo '<div class="alert alert-danger">
   					Record is not exists!!!
						</div>';
	}else{
	//print_object($records1);
	foreach($records1 as $record){
		 $table->data[] = array(
		 	$record->health_center_name,
		 	$record->firstname,
		 	$record->lastname,
		 	$record->email,
		 	 html_writer::link(
	            new moodle_url(
	                $CFG->wwwroot.'/local/clinical_care/list.php',
	                array('id' => $record->id)
	                ),
	            	'view',
	           		 array(
	                'class' => 'btn btn-small btn-primary'
	            	)
	            ),
		 	 html_writer::link(
	            new moodle_url(
	                $CFG->wwwroot.'/local/clinical_care/pdf.php',
	                array('id' => $record->id)
	                ),
	            	'Download',
	           		 array(
	                'class' => 'btn btn-small btn-primary fa fa-file-pdf-o'
	            	)
	            )
		 	);
	}

	$query ="SELECT * FROM {local_clinic_care} ORDER BY id DESC ";
	$page_result = $DB->get_records_sql($query);

	$total_records = count($page_result);
	
	$total_pages = ceil($total_records/$page_per_records);
	if($total_pages){
		$pagLink = "<nav><ul class='pagination'>";  
        	for ($i=1; $i<=$total_pages; $i++) {  
                     $pagLink .= "<li><a href='view.php?page=".$i."'>".$i."</a></li>";  
        	}
    	}
    	echo html_writer::table($table);
    	echo $pagLink . "</ul></nav>"; 
	} 

	echo $OUTPUT->footer();

?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.pagination').pagination({
			items:<?php echo $total_records; ?>,
			itemOnPage:<?php echo $page_per_records; ?>,
			 cssStyle: 'light-theme',
			currentPage:<?php echo $page;?>,			
			hrefTextPrefix:'view.php?page='
		});
	});
</script>

