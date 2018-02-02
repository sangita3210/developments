<?php

require_once(dirname(__FILE__) . '/../../config.php');
require_once('lib.php');


require_login();

// Check permissions.
$context = context_system::instance();
//require_capability('local/course_approval_intel:approve', $context);
require_capability('moodle/category:manage', $context);

$title = get_string('req', 'local_course_approval_intel');
$PAGE->set_url('/local/course_approval_intel/index.php');
$PAGE->set_context($context);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);

echo $OUTPUT->header();

// Display the courses.
$show = local_course_approval_intel_get_content();
echo $show->text;



echo $OUTPUT->footer();