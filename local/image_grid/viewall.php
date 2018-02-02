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
	require_once $CFG->dirroot . '/local/image_grid/lib.php';

	require_login(0 , FALSE);
	$context = context_user::instance($USER->id);
	$PAGE->set_context($context);
	//$authenticate = has_capability('local/clinical_care:viewall', $context);
	$PAGE->set_pagelayout('admin');
	$PAGE->set_title(get_string('pluginname', 'local_image_grid'));
	$PAGE->set_heading(get_string('pluginname', 'local_image_grid'));
	$PAGE->set_url('/local/image_grid/viewall.php');
	//$PAGE->set_url('/local/image_grid/image_grid.php');


	echo $OUTPUT->header();
	$records = $DB->get_records('local_image_grid');
	foreach($records as $record){

		$imagepath1 =image_grid_images($record->image1);
		$imagepath2 =image_grid_images($record->image2);
		$imagepath3 =image_grid_images($record->image3);
		$imagepath4 =image_grid_images($record->image4);
		$imagepath5 =image_grid_images($record->image5);
		$imagepath6 =image_grid_images($record->image6);
		//print_object($imagepath);die();
}
$url = $CFG->wwwroot.'/local/image_grid/image_grid.php';
echo '<a href="'.$url.'">image Form links</a><br><br>';
		echo '
			<div class="col-md-12">
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
 						 <img class="img-responsive" src="'.$imagepath1.'" alt="Card image cap">
  							<div class="card-block">
    							<h4 class="card-title">Card title</h4>
    								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    								<a href="#" class="btn btn-primary">Go somewhere</a>
  							</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
 						 <img class="img-responsive" src="'.$imagepath2.'" alt="Card image cap">
  							<div class="card-block">
    							<h4 class="card-title">Card title</h4>
    								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    								<a href="#" class="btn btn-primary">Go somewhere</a>
  							</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
 						 <img class="img-responsive" src="'.$imagepath3.'" alt="Card image cap">
  							<div class="card-block">
    							<h4 class="card-title">Card title</h4>
    								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    								<a href="#" class="btn btn-primary">Go somewhere</a>
  							</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
 						 <img class="img-responsive" src="'.$imagepath4.'" alt="Card image cap">
  							<div class="card-block">
    							<h4 class="card-title">Card title</h4>
    								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    								<a href="#" class="btn btn-primary">Go somewhere</a>
  							</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
 						 <img class="img-responsive" src="'.$imagepath5.'" alt="Card image cap">
  							<div class="card-block">
    							<h4 class="card-title">Card title</h4>
    								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    								<a href="#" class="btn btn-primary">Go somewhere</a>
  							</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
 						 <img class="img-responsive" src="'.$imagepath6.'" alt="Card image cap">
  							<div class="card-block">
    							<h4 class="card-title">Card title</h4>
    								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    								<a href="#" class="btn btn-primary">Go somewhere</a>
  							</div>
					</div>
				</div>
			</div>';	

	

	echo $OUTPUT->footer();



