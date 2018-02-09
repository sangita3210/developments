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
* Course renderer.
*
* @package    theme_noanme
* @copyright  2016 Frédéric Massart - FMCorz.net
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

namespace theme_boost\output\core;
defined('MOODLE_INTERNAL') || die();

use moodle_url;
use html_writer;

require_once($CFG->dirroot . '/course/renderer.php');
/**
* Course renderer class.
*
* @package    theme_noanme
* @copyright  2016 Frédéric Massart - FMCorz.net
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/
class course_renderer extends \core_course_renderer {

/**
 * Renders html to display a course search form.
 *
 * @param string $value default value to populate the search field
 * @param string $format display format - 'plain' (default), 'short' or 'navbar'
 * @return string
 */
//image function here
/**
* @course object of course here  
**/ 
public function course_image_url($course){
    global $OUTPUT, $CFG,$DB,$PAGE;
    require_once($CFG->libdir . '/coursecatlib.php');
    $courseinlist = new \course_in_list((object) array('id' => $course->id));
    //print_object($courseinlist);
    $imgturl = '';
    foreach ($courseinlist->get_course_overviewfiles() as $file) {
        if ($isimage = $file->is_valid_image()) {
            $imgturl = file_encode_url("$CFG->wwwroot/pluginfile.php", '/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
                $file->get_filearea() . $file->get_filepath() . $file->get_filename(), $isimage);
        }
    }
    return $imgturl;
}
public function course_category($category) {
    global $OUTPUT, $CFG,$DB,$PAGE;
    require_once($CFG->libdir . '/coursecatlib.php');
    require_once($CFG->dirroot.'/course/classes/management_renderer.php');
    //for custom css included below file
    $PAGE->requires->css(new 
     moodle_url($CFG->wwwroot.'/theme/boost/custom.css'));
    //for filter option parameter taken 
    $categories = \coursecat::make_categories_list();
    $ids = optional_param('categoryid','',PARAM_RAW );
    $catid = optional_param('Categories', '', PARAM_RAW);
    $sort = optional_param('Sort', '', PARAM_RAW);
    $list = optional_param('list','',PARAM_RAW);
    $grid = optional_param('grid','',PARAM_RAW);
    $coursename = optional_param('course','',PARAM_RAW);
    $cat = $DB->get_record('course_categories',array('id' =>$ids),'id,name');
    $output = '';
    if($cat){
        foreach ($categories as $key => $value) {
            if($cat->id == $key){
                $output .= html_writer::tag('h2', $value, array('class' => 'text-center'));
            }
        } 
    } else{
        $output .= html_writer::tag('h2', get_string('course'), array('class' => 'text-center'));
    }           
    $output .= html_writer::start_tag('nav',array('class'=>'navbar'));
    $output .= html_writer::start_tag('div',array('class'=>'topnav'));
    $output .= html_writer::start_tag('div', array('class'=>' new col-md-8'));
    foreach ($categories as $key => $cat) {
        //print_object($cat);
        $output .= html_writer::start_tag('ul', array('class' =>'nav navbar-nav css'));
        $output .= html_writer::start_tag('li', array('class'=>'custom'));
        $output .= html_writer::start_tag('a',array('href' => new moodle_url($CFG->wwwroot.'/course/index.php?categoryid='.$key)),array('catid'));
        $output .= $cat;
        $output .= html_writer::end_tag('a');
        $output .= html_writer::end_tag('li');//end of active
        $output .= html_writer::end_tag('ul');//endd of navbar-nav
        # code...
    }
    $output .= html_writer::end_tag('div');//end of col-md-8
    //list and grid view button code here 
    $output .=html_writer::start_tag('div' ,array('class' =>'col-md-4'));
    $output .= html_writer::start_tag('ul', array('class' =>'nav navbar-nav css'));
    $output .= html_writer::start_tag('li', array('class'=>'new cat'));
    //list view link code here
    $output .= html_writer::start_tag('a',array('href' => new moodle_url($CFG->wwwroot.'/course/index.php?categoryid='.$ids.'&list='.'list'.'&course='.$coursename)),array('lll'));
    $output .=html_writer::start_tag('span' ,array('class' =>'fa fa-bars'));
    
    $output .=html_writer::end_tag('span');
    $output .= 'List';
    $output .= html_writer::end_tag('a');
    //grid view code here 
    //list view link code here
    $output .= html_writer::start_tag('a',array('href' => new moodle_url($CFG->wwwroot.'/course/index.php?categoryid='.$ids.'&grid='.'grid'.'&course='.$coursename)),array('aaa'));
    $output .=html_writer::start_tag('span' ,array('class' =>'fa fa-th-large'));
    $output .=html_writer::end_tag('span');
    $output .= 'Grid';
    $output .= html_writer::end_tag('a');
    $output .=html_writer::end_tag('li');
    $output .=html_writer::end_tag('ul');
    $output .=html_writer::end_tag('div');
    $output .= html_writer::end_tag('div');//end of topnav

    $output .= html_writer::end_tag('nav');//end of navbar
    $output .=html_writer::start_tag('div',array('class' => 'row'));
    $output .=html_writer::start_tag('div',array('class' => 'col-md-12'));
    $output .='<div class="col-md-12">
    <div class="col-md-6 offset-md-3">
        <form  method = "post" action="'.$_SERVER['PHP_SELF'].'">
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Search" name="course">
            </div>
            <div class="form-group">
                <input type="submit" class="btn pull-xs-left m-r-1 btn-primary">
            </div>
        </form>
    </div>
</div>';
    $output .= html_writer::end_tag('div');//col-md-12
    $output .= html_writer::end_tag('div');
    //manually search here 
    
    $coursesgrid = '';
    $courselist = '';  
    $searchcourse = ''; 
    $searchlist = '';
    $searchgrid = '';
    $image_url = '';
    //pagination code here 
    $limit = 10;  
    if (isset($_GET["page"]) && !empty($_GET['page'])) {
        $page  = $_GET["page"];
    }
    else {
        $page=1; 
    }
    $start_from = ($page * $limit)-$limit;  
    //print_object($start_from);
    //global query here 
    $gridvalue = $DB->get_records('course',array('category'=>$ids),'fullname ASC','id,fullname,summary',$start_from,$limit);
    $gridvalue1 =  $DB->get_records('course',array(),'fullname  ASC','id,fullname,summary',$start_from,$limit);
    if (!empty($ids)) {
        $coursesgrid = $gridvalue; 
        if($grid == 'grid' && $page){
            $coursesgrid = $gridvalue; 
        }else {
            $coursesgrid = array();
        }
        if ($list == 'list' && $page){
            //echo 'list';
            $courselist =  $gridvalue;
        } else {
            $courselist = array(); 
        }
        if((!$grid) && (!$list)){
            $coursesgrid =  $gridvalue ;               
        }
        if($coursename && $page){
            $sc = "SELECT id,fullname,summary from {course} where fullname like '$coursename%'";
            $searchcourse = $DB->get_records_sql($sc);
            //print_object($searchcourse);exit;
        }else{
            $searchcourse  = '';
        }
        if(($list =='list') && (!empty($coursename))){
         $sc = "SELECT id,category from {course} where fullname like '$coursename%'";$sc1 = $DB->get_records_sql($sc);
         $courselist = $DB->get_records('course',array('category'=>$sc1->category),'','id,fullname,summary');
     }
 } 
 else {
    $coursesgrid = $gridvalue1;
    if($grid == 'grid'){
        $coursesgrid = $gridvalue1;
    }else{
        $coursesgrid = array();
    }
    if ($list == 'list' ){
            //echo 'list';
        $courselist = $gridvalue1;
    }else{
        $courselist = array();
    }
    if((!$grid=='grid') && (!$list == 'list')){
        $coursesgrid = $gridvalue1;
    }
    if($coursename && $page){
        $sc = "SELECT id,fullname,summary from {course} where fullname like '$coursename%'";
        $searchcourse = $DB->get_records_sql($sc);
    }else{
        $searchcourse = '';
    }
    if(($list =='list') && (!empty($coursename))){
        $sc = "SELECT id,fullname,summary from {course} where fullname like '$coursename%'";
        $searchlist = $DB->get_records_sql($sc);
        //print_object($searchlist);
    }else{
        $searchlist = array();
    }
    if(($grid =='grid') && (!empty($coursename))){
        $sc = "SELECT id,fullname,summary from {course} where fullname like '$coursename%'";
        $searchgrid = $DB->get_records_sql($sc);
    }else{
        $searchgrid = array();
    }
}
if(!$ids){
    $num = $DB->count_records('course',array(),'');
    $num1 = $num;
}else if($coursename && $page){
    exit;
}else{ 
    $num1 = $DB->count_records('course', array('category'=>$ids));
}
$total_pages = ceil($num1 / $limit);
$pagLink = "<div class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<a href='index.php?page=".$i."&list=".$list."&categoryid=".$ids."&grid=".$grid."&course=".$coursename."'>".$i."</a>";
};
$output .= $pagLink . "</div>"; 
unset($courselist[1]);

if($coursesgrid && (!($searchcourse)) &&( !$searchgrid)){
    unset($coursesgrid[1]);
    $output .= html_writer::start_tag('div' , array('class'=> 'row grid'));
    $output .= '<hr>';
    $output .= html_writer::start_tag('div' , array('class'=> 'col-md-12'));
    if($num1){
        if(!$ids){
            $output .= '<p>Showing <b>1-'.($num1-1).'</b> of about <b> '.($num1-1).' </b> item</p>';
        }else{
            $output .= '<p>Showing <b>1-'.$num1.'</b> of about <b> '.$num1.' </b> item</p>';
        }
    }
    foreach($coursesgrid as $course){
            //print_object($course);
        $image_url = $this->course_image_url($course);
            //end image code here  
        $output .= html_writer::start_tag('div' , array('class'=> 'col-md-3'));
        $output .= html_writer::start_tag('div' , array('class'=> 'card'));
        if(!$image_url){
            $output .= '<img src="/g/demo.png" alt="Avatar" style="width:100%">';
        }else{
            $output .= '<img src="'.$image_url.'" alt="Avatar" style="width:100%">';
        }
            $output .= html_writer::end_tag('div');//end of card
            $output .= '<div class="card">
            <h4><b>'.$course->fullname.'</b></h4> 
            <p>'.$course->summary.'</p> 
        </div>';
            $output .= html_writer::end_tag('div');//end of col-md-3
        }
        $output .= html_writer::end_tag('div');//end of col-md-12
        $output .= html_writer::end_tag('div');//end of row
    }
    else if(($searchcourse && (!$searchlist) && (!$searchgrid))){
        unset($searchcourse[1]);
        $output .= '<hr>';
        $output .= '<p>Searching for course <b>'.$coursename.' </b> string!!</p>'; 
        foreach ($searchcourse as $key => $searchcourse1) {
            $image_url = $this->course_image_url($searchcourse1);
            $output .= html_writer::start_tag('div' , array('class'=> 'col-md-3'));
            $output .= html_writer::start_tag('div' , array('class'=> 'card'));
            if(!$image_url){
                $output .= '<img src="/g/demo.png" alt="Avatar" style="width:100%">';
            }else{
                $output .= '<img src="'.$image_url.'" alt="Avatar" style="width:100%">';
            }
        $output .= html_writer::end_tag('div');//end of card
        $output .= '<div class="card">
        <h4><b>'.$searchcourse1->fullname.'</b></h4> 
        <p>'.$searchcourse1->summary.'</p> 
    </div>';
        $output .= html_writer::end_tag('div');//end of col-md-8
    }
}
else if($courselist && (!$searchcourse)){
    $output .= html_writer::start_tag('div' , array('class'=> 'row list'));
    $output .= '<hr>';
    $output .= html_writer::start_tag('div' , array('class'=> 'col-md-12'));
    if($num1){
        if(!$ids){
            $output .= '<p>Showing <b>1-'.($num1-1).'</b> of about <b> '.($num1-1).' </b> item</p>';
        }else{
            $output .= '<p>Showing <b>1-'.$num1.'</b> of about <b> '.$num1.' </b> item</p>';
        }
    }foreach($courselist as $course){
        $image_url = $this->course_image_url($course);
        $output .= html_writer::start_tag('div' , array('class'=> 'col-md-12'));
        $output .= html_writer::start_tag('div' , array('class'=> 'col-md-4'));
        $output .= html_writer::start_tag('div' , array('class'=> 'card'));
        if(!$image_url){
            $output .= '<img src="/g/demo.png" alt="Avatar" style="width:100%">';
        }else{
            $output .= '<img src="'.$image_url.'" alt="Avatar" style="width:100%">'; 
        }
            $output .= html_writer::end_tag('div');//end of card
            $output .= html_writer::end_tag('div');//end of col-md-4
            $output .= html_writer::start_tag('div' , array('class'=> 'col-md-8'));
            $output .= '<div class="card">
            <h4><b>'.$course->fullname.'</b></h4> 
            <p>'.$course->summary.'</p> 
        </div>';
            $output .= html_writer::end_tag('div');//end of col-md-8
            $output .= html_writer::end_tag('div');//end of col-md-12
        } 
        $output .= html_writer::end_tag('div');//end of col-md-12
        $output .= html_writer::end_tag('div');//end of row list
    }else if($searchlist && $searchcourse ){
      unset($searchlist[1]);
      $output .= '<hr>';
      $output .= '<p>Searching for course <b>'.$coursename.' </b> string!!</p>'; 
      foreach ($searchlist as $searchlist1) {
                      # code...
        $image_url = $this->course_image_url($searchlist1);

        $output .= html_writer::start_tag('div' , array('class'=> 'col-md-12'));
        $output .= html_writer::start_tag('div' , array('class'=> 'col-md-4'));
        $output .= html_writer::start_tag('div' , array('class'=> 'card'));
        if(!$image_url){
            $output .= '<img src="/g/demo.png" alt="Avatar" style="width:100%">';
        }else{
            $output .= '<img src="'.$image_url.'" alt="Avatar" style="width:100%">'; 
        }
            $output .= html_writer::end_tag('div');//end of col-md-4
            $output .= html_writer::end_tag('div');//end of card
            $output .= html_writer::start_tag('div' , array('class'=> 'col-md-8'));
            $output .= '<div class="card">
            <h4><b>'.$searchlist1->fullname.'</b></h4> 
            <p>'.$searchlist1->summary.'</p> 
        </div>';
            $output .= html_writer::end_tag('div');//end of col-md-8
             $output .= html_writer::end_tag('div');//end of col-md-8
         }
     }else if($searchgrid && (!empty($searchcourse))){
        unset($searchgrid[1]);
        $output .= '<hr>';
        $output .= '<p>Searching for course <b>'.$coursename.' </b> string!!</p>'; 
        foreach ($searchgrid as $key => $course) {
            $image_url = $this->course_image_url($course);
            //end image code here  
            $output .= html_writer::start_tag('div' , array('class'=> 'col-md-3'));
            $output .= html_writer::start_tag('div' , array('class'=> 'card img'));
            if(!$image_url){
                $output .= '<img src="/g/demo.png" alt="Avatar" style="width:100%">';
            }else{
                $output .= '<img src="'.$image_url.'" alt="Avatar" style="width:100%">';
            }
            $output .= html_writer::end_tag('div');//end of card
            $output .= '<div class="card desc">
            <h4><b>'.$course->fullname.'</b></h4> 
            <p>'.$course->summary.'</p> 
        </div>';
            $output .= html_writer::end_tag('div');//end of col-md-3
        }
    }
    else if(!empty($searchcourse)){
       $output .= '<hr>';
       $output .= html_writer::start_tag('div' , array('class'=> 'alert alert-danger'));
       $output .='<p>Course is not found here!!</p>';
       $output .= html_writer::end_tag('div');
   }
   else{
    $output .= '<hr>';
    $output .= html_writer::start_tag('div' , array('class'=> 'alert alert-danger'));
    $output .='<p>Course is not found here!!</p>';
    $output .= html_writer::end_tag('div');
}
return $output;
}
} 