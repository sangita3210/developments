<?php
/**
 * buykart Catalogue Page
 *
 * @package     local
 * @subpackage  local_buykart
 * @author   	Thomas Threadgold
 * @copyright   2015 LearningWorks Ltd
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once dirname(__FILE__) . '/../../../config.php';
require_once $CFG->dirroot . '/local/buykart/lib.php';

$categoryID = optional_param('category', null, PARAM_INT);
$sort = optional_param('sort', null, PARAM_TEXT);
$page = optional_param('page', 1, PARAM_INT);

$systemcontext = context_system::instance();

$PAGE->set_context($systemcontext);
$PAGE->set_url($CFG->wwwroot . '/local/buykart/pages/catalogue.php');

// Check if the theme has a buykart pagelayout defined, otherwise use standard
if (array_key_exists('buykart_catalogue', $PAGE->theme->layouts)) {
	$PAGE->set_pagelayout('buykart_catalogue');
} else if(array_key_exists('buykart', $PAGE->theme->layouts)) {
	$PAGE->set_pagelayout('buykart');
} else {
	$PAGE->set_pagelayout('standard');
}

$PAGE->set_title(get_string('catalogue_title', 'local_buykart'));
$PAGE->set_heading(get_string('catalogue_title', 'local_buykart'));
$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/local/buykart/js/jquery.min.js'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/local/buykart/js/catalogue.js'));

// Get the renderer for this page
$renderer = $PAGE->get_renderer('local_buykart');

list($sortfield, $sortorder) = local_buykart_extract_sort_vars($sort);

echo $OUTPUT->header();

?>

<h1 class="page__title"><?php echo get_string('catalogue_title', 'local_buykart'); ?></h1>

<?php 

// Render catalogue filter bar
echo $renderer->filter_bar($categoryID, $sort); 

// Get the products for this page
$products = local_buykart_get_products($page, $categoryID, $sortfield, $sortorder);

// Outputs this page of products
echo $renderer->catalogue($products);

// Get all products matching the filter parameters
$allProducts = local_buykart_get_products(-1, $categoryID, $sortfield, $sortorder);
// Pass them to the pagination function
echo $renderer->pagination($allProducts, $page, $categoryID, $sort);

echo $OUTPUT->footer();
