<?php

require_once('../../../../config.php');
$context = context_system::instance();

require_login();
if (!is_siteadmin()) {
    return '';

  
}

$welcome = new \autoemailcontext_assignmentevaluation\message(null,null);
$PAGE->set_context($context);
$PAGE->set_url('/local/autoemail/context/assignmentevaluation/index.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('pluginname', 'autoemailcontext_assignmentevaluation'));
$PAGE->navbar->add(get_string('pluginname', 'autoemailcontext_assignmentevaluation'));

$tableheader = array(
    get_string('fieldname', 'autoemailcontext_assignmentevaluation'),
    get_string('yourvalue', 'autoemailcontext_assignmentevaluation'));
$customfields = $welcome->customfields;
$customvalues = $welcome->get_user_custom_values($USER);

// Custom profile Fields.
$tablecustom = new html_table();
$tablecustom->head = $tableheader;

foreach ($customfields as $field) {
    $tablecustom->data[] = array('[['.$field.']]', $customvalues[$field]);
}

// Moodle welcome template Fields.
$tablewelcome = new html_table();
$tablecustom->head = $tableheader;

foreach ($welcome->welcomefields as $field) {
    $tablewelcome->data[] = array('[['.$field.']]', $welcome->welcomevalues[$field]);
}

// Moodle default user template Fields.
$tabledefault = new html_table();
$tabledefault->head = $tableheader;
$userdefaultvalues = $welcome->get_user_default_values($USER);

foreach ($welcome->defaultfields as $field) {
    $tabledefault->data[] = array('[['.$field.']]', $userdefaultvalues[$field]);
}

$tablecourse = new html_table();
$tablecustom->head = $tableheader;

foreach ($welcome->coursefields as $field) {
    $tablecourse->data[] = array('[['.$field.']]', $welcome->coursevalues[$field]);
}


$tablecourse = new html_table();
$tablecustom->head = $tableheader;


foreach ($welcome->assignmentsfields as $field) {
    $tablecourse->data[] = array('[['.$field.']]', $welcome->assignmentsvalues[$field]);
}


$editurl = new moodle_url('/admin/settings.php', array('section' => 'autoemailcontext_assignmentevaluation'));

echo $OUTPUT->header();

echo html_writer::tag('h2', get_string('pluginname', 'autoemailcontext_assignmentevaluation'));
echo html_writer::tag('p', get_string('globalhelp', 'autoemailcontext_assignmentevaluation'));
echo $OUTPUT->single_button($editurl, get_string('configure', 'autoemailcontext_assignmentevaluation'));

echo html_writer::tag('h2', get_string('customprofilefields', 'autoemailcontext_assignmentevaluation'));
echo html_writer::table($tablecustom);

echo html_writer::tag('h2', get_string('welcomefields', 'autoemailcontext_assignmentevaluation'));
echo html_writer::table($tablewelcome);

echo html_writer::tag('h2', get_string('defaultprofilefields', 'autoemailcontext_assignmentevaluation'));
echo html_writer::table($tabledefault);
echo $OUTPUT->footer();