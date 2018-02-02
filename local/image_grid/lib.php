<?php

function local_image_grid_extend_navigation(global_navigation $nav) {
     global $CFG;
         $coursename = get_string('pluginname','local_image_grid');
         $url = '#';
         $flat = new 
flat_navigation_node(navigation_node::create($coursename, $url), 0);
         $nav->add_node($flat);
         $abc = $nav->add(get_string('pluginname','local_image_grid'), 
                $CFG->wwwroot.'/local/image_grid/viewall.php');
         $abc->showinflatnavigation = true;
         
}

