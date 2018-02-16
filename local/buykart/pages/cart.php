<?php
/**
 *Buykart Cart Page
 *
 * @package     local
 * @subpackage  local_buykart
 * @author   	Thomas Threadgold
 * @copyright   2015 LearningWorks Ltd
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once dirname(__FILE__) . '/../../../config.php';
require_once $CFG->dirroot . '/local/buykart/lib.php';

$systemcontext = context_system::instance();

$PAGE->set_context($systemcontext);
$PAGE->set_url($CFG->wwwroot . '/local/buykart/pages/cart.php');

// Check if the theme has a buykart pagelayout defined, otherwise use standard
if (array_key_exists('buykart_cart', $PAGE->theme->layouts)) {
	$PAGE->set_pagelayout('buykart_cart');
} else if(array_key_exists('buykart', $PAGE->theme->layouts)) {
	$PAGE->set_pagelayout('coursecategory');
} else {
	$PAGE->set_pagelayout('coursecategory');
}

$PAGE->set_title(get_string('cart_title', 'local_buykart'));
$PAGE->set_heading(get_string('cart_title', 'local_buykart'));

// Get the renderer for this page
$renderer = $PAGE->get_renderer('local_buykart');

$cart = new BuykartCart();
$userid = $USER->id;
if (isset($_POST['action']) && $_POST['action'] === 'addToCart') {
	$pid = $_POST['id'];
	if(!($DB->record_exists('local_buykart_incart', array('productid'=>$pid,'userid'=>$userid)))){
		$recordinsert = new stdClass();
		$recordinsert->productid = $pid;
		$recordinsert->userid = $userid;
		$recordinsert->variation = '0';
		$result = $DB->insert_record('local_buykart_incart', $recordinsert);
	}	
}else if (isset($_POST['action']) && $_POST['action'] === 'addVariationToCart') {
	if(!($DB->record_exists('local_buykart_incart', array('productid'=>$_POST['id'],'userid'=>$userid)))){
		$recordinsert1 = new stdClass();
		$recordinsert1->productid = $_POST['id'];
		$recordinsert1->userid = $userid;
		$recordinsert1->variation = $_POST['variation'];
		$result = $DB->insert_record('local_buykart_incart', $recordinsert1);
	}	
}
if($DB->record_exists('local_buykart_incart', array('userid'=>$userid))){
	$cartproducts = $DB->get_records('local_buykart_incart',array('userid'=>$userid));
	foreach ($cartproducts as $key => $cartproduct) {
		$cart->add($cartproduct->productid, $cartproduct->variation);
	}
}
if (isset($_POST['action']) && $_POST['action'] === 'removeFromCart') {
	$pid = $_POST['id'];
	if($DB->record_exists('local_buykart_incart', array('productid'=>$pid,'userid'=>$userid))){
		$cart->remove($pid);
		$deleteproduct = $DB->delete_records('local_buykart_incart',array('productid'=>$pid,'userid'=>$userid));
	}
	redirect(new moodle_url($CFG->wwwroot . '/local/buykart/pages/cart.php'));
}
if (isset($_POST['action']) && $_POST['action'] === 'removeallFromCart') {
	$productids = $DB->get_records('local_buykart_incart',array('userid'=>$userid));
	foreach ($productids as $key => $pids) {
			$cart->remove($pids->productid);
			$deletepdt = $DB->delete_records('local_buykart_incart',array('productid'=>$pids->productid));
	}	
	redirect(new moodle_url($CFG->wwwroot . '/local/buykart/pages/cart.php'));
}

echo $OUTPUT->header();

// Render page title
printf('<h1 class="page__title">%s</h1>', get_string('cart_title', 'local_buykart'));

// Render the product page content
echo $renderer->buykart_cart($cart);


$relatedOutput = '';
// Check if there are any related products for each product in the cart
foreach($cart->get() as $id => $variation) {
	
	// Get the product for the given ID
	$product = local_buykart_get_product($id);
		
	// Get the HTML output of the related products renderer
	$relatedOutput = $renderer->related_products($product);

	// If there is any output, then we are happy and can continue!
	if( $relatedOutput !== '') {
		break;
	}
}

echo $relatedOutput;


echo $OUTPUT->footer();
