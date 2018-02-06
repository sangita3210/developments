<?php

require_once('../../config.php');
require_once('lib.php');
$context = context_system::instance();
global $DB;

require_login();
if (!is_siteadmin()) {
    return '';

  
}
	//print_object("11111111111")||die();
 $value = $DB->get_records('config_plugins',array('plugin' =>'local_invoicemail'));

            // if($value)
            // {
            // 	require($CFG->dirroot.'/local/invoicemail/lib.php');
            // 	invoice_mail($user,$data);
            //     print_object("hello2222");
            // }	
            // //die();
if($value)
{
	//echo "111111";
}
else
{
	//echo "222222";
}
//print_object($value);
$user ="20";
$data = "tx_id123456";
$message= new sendmail();
//$message->invoice_mail($user,$data);
$message->get_invoice_items($data);
//die();
$PAGE->set_context($context);
$PAGE->set_url('/local/invoiceemail/index.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('pluginname', 'local_invoicemail'));
$PAGE->navbar->add(get_string('pluginname', 'local_invoicemail'));

$editurl = new moodle_url('/admin/settings.php', array('section' => 'local_invoicemail'));

echo $OUTPUT->header();

echo html_writer::tag('h2', get_string('pluginname', 'local_invoicemail'));
echo html_writer::tag('p', get_string('globalhelp', 'local_invoicemail'));
echo $OUTPUT->single_button($editurl, get_string('configure', 'local_invoicemail'));

// echo html_writer::tag('h2', get_string('customprofilefields', 'autoemailcontext_user'));
// echo html_writer::table($tablecustom);

// echo html_writer::tag('h2', get_string('welcomefields', 'autoemailcontext_user'));
// echo html_writer::table($tablewelcome);

// echo html_writer::tag('h2', get_string('defaultprofilefields', 'autoemailcontext_user'));
// echo html_writer::table($tabledefault);
echo $OUTPUT->footer();