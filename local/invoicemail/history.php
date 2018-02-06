<?php
/**
 *Buykart Cart Report Page
 *
 * @package     local
 * @subpackage  local_buykart
 * @author   	Arjun Singh
 * @copyright   2017 Dhruv Infoline Pvt Ltd
 * @license     http://www.lmsofindia.com 2017 or later
 */
//require( '/path/to/moodle/config.php' );
//require_once dirname(__FILE__) .'/../../config.php';
require_once $CFG->wwwroot .'../../config.php';
require_once ('lib.php');
require_once("$CFG->libdir/pdflib.php");
require_login();
$transid = optional_param('transid', null, PARAM_RAW);
$action = optional_param('action', null, PARAM_TEXT);
$systemcontext = context_system::instance();

$PAGE->set_context($systemcontext);
$PAGE->set_url($CFG->wwwroot . '/local/invoicemail/history.php');
$PAGE->requires->css(new moodle_url($CFG->wwwroot.'/local/invoicemail/bootstrap-select.min.css'), true);
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/invoicemail/js/bootstrap.min.js'), true);
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/invoicemail/js/bootstrap-select.min.js'), true);
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/invoicemail/js/jquery.min.js'), true);

// For datatable.
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/invoicemail/js/jquery.dataTables.min.js'), true);
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/invoicemail/js/dataTables.bootstrap.js'), true);
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/invoicemail/js/dataTables.fixedColumns.min.js'), true);
$PAGE->requires->js(new moodle_url($CFG->wwwroot.'/local/invoicemail/js/dataTables.tableTools.js'), true);
$PAGE->requires->css(new moodle_url($CFG->wwwroot.'/local/invoicemail/css/dataTables.bootstrap.min.css'));
$PAGE->requires->css(new moodle_url($CFG->wwwroot.'/local/invoicemail/css/fixedColumns.bootstrap.min.css'));
$PAGE->requires->css(new moodle_url($CFG->wwwroot.'/local/invoicemail/css/dataTables.tableTools.css'));


$PAGE->set_title(get_string('history_title', 'local_invoicemail'));
$PAGE->set_heading(get_string('history_title', 'local_invoicemail'));



$i = 1;
$flag = 0; 
if (isloggedin()){
    if (empty($action))
    { 
        echo $OUTPUT->header();
    	$table = new html_table();
    	$table->head = (array) get_strings(array('slno','cname','ccost','invoice'),'local_invoicemail');
      
        $transaction = $DB->get_records('enrol_paypal',array('userid' => $USER->id));

    	foreach ($transaction as $value) {
    		     
        		$insid = $value->instanceid;
                
        		$cvalue = $DB->get_record('course',array('id'=> $value->courseid));
                $price = $DB->get_record('enrol',array('id'=> $insid));
               
                $cprice = $price->cost .  $price->currency;
               
                $link = new moodle_url('/local/invoicemail/history.php?transid='.$value->txn_id.'&action=get');
                $button = new single_button($link, '&#9745;');
                  
                    $button->add_action(new popup_action('click', $link, 'view' . $value->txn_id, array('height' => 600, 'width' => 800)));
                
               
               
               $inv = html_writer::tag('div', $OUTPUT->render($button), array('class' => 'invoicelink'));

               
                
                $table->data[] = array(
                            $i,
                           
                            $cvalue->fullname,
                            
                            $cprice,
                           
                            $inv
                );
                $i++;    
    			
    			}
    			
    		
    	
    	echo html_writer::table($table);
    }else{
         $save = 1;
         pdf_download($transid,$save,false);
        
    }
 }
 

echo $OUTPUT->footer();