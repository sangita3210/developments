<?php
/**
 * @author     Based on code originally written by Julian Ridden, G J Barnard, Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
 class theme_adaptit_core_renderer extends theme_bootstrapbase_core_renderer {
 	
 	/*
     * This renders a notification message.
     * Uses bootstrap compatible html.
     */
    public function notification($message, $classes = 'notifyproblem') {
        $message = clean_text($message);
        $type = '';

        if ($classes == 'notifyproblem') {
            $type = 'alert alert-error';
        }
        if ($classes == 'notifysuccess') {
            $type = 'alert alert-success';
        }
        if ($classes == 'notifymessage') {
            $type = 'alert alert-info';
        }
        if ($classes == 'redirectmessage') {
            $type = 'alert alert-block alert-info';
        }
        return "<div class=\"$type\">$message</div>";
    } 
    
		
    protected function render_custom_menu(custom_menu $menu) {
        /*
    	* This code replaces adds the My Dashboard
    	* functionality to the custommenu.
    	*/
        $hasdisplaymydashboard = (empty($this->page->theme->settings->displaymydashboard)) ? false : $this->page->theme->settings->displaymydashboard;
        if (isloggedin() && !isguestuser() && $hasdisplaymydashboard) {
            $branchlabel = '<i class="fa fa-dashboard"></i>'.get_string('mydashboard', 'theme_adaptit');
            $branchurl   = new moodle_url('/my/index.php');
            $branchtitle = get_string('mydashboard', 'theme_adaptit');
            $branchsort  = 10000;
 
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
            $branch->add('<em><i class="fa fa-home"></i>'.get_string('myhome').'</em>',new moodle_url('/my/index.php'),get_string('myhome'));
 			$branch->add('<em><i class="fa fa-user"></i>'.get_string('profile').'</em>',new moodle_url('/user/profile.php'),get_string('profile'));
 			$branch->add('<em><i class="fa fa-calendar"></i>'.get_string('pluginname', 'block_calendar_month').'</em>',new moodle_url('/calendar/view.php'),get_string('pluginname', 'block_calendar_month'));
 			$branch->add('<em><i class="fa fa-envelope"></i>'.get_string('pluginname', 'block_messages').'</em>',new moodle_url('/message/index.php'),get_string('pluginname', 'block_messages'));
 			$branch->add('<em><i class="fa fa-certificate"></i>'.get_string('badges').'</em>',new moodle_url('/badges/mybadges.php'),get_string('badges'));
 			$branch->add('<em><i class="fa fa-file"></i>'.get_string('privatefiles', 'block_private_files').'</em>',new moodle_url('/user/files.php'),get_string('privatefiles', 'block_private_files'));
 			$branch->add('<em><i class="fa fa-sign-out"></i>'.get_string('logout').'</em>',new moodle_url('/login/logout.php'),get_string('logout'));    
        }
    	/*
    	* This code replaces adds the current enrolled
    	* courses to the custommenu.
    	*/
    
    	$hasdisplaymycourses = (empty($this->page->theme->settings->displaymycourses)) ? false : $this->page->theme->settings->displaymycourses;
        if (isloggedin() && !isguestuser() && $hasdisplaymycourses) {
        	$mycoursetitle = $this->page->theme->settings->mycoursetitle;
            if ($mycoursetitle == 'module') {
				$branchtitle = get_string('mymodules', 'theme_adaptit');
			} else if ($mycoursetitle == 'unit') {
				$branchtitle = get_string('myunits', 'theme_adaptit');
			} else if ($mycoursetitle == 'class') {
				$branchtitle = get_string('myclasses', 'theme_adaptit');
			} else {
				$branchtitle = get_string('mycourses', 'theme_adaptit');
			}
			$branchlabel = '<i class="fa fa-briefcase"></i>'.$branchtitle;
            $branchurl   = new moodle_url('/my/index.php');
            $branchsort  = 10000;
 
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 			if ($courses = enrol_get_my_courses(NULL, 'fullname ASC')) {
 				foreach ($courses as $course) {
 					if ($course->visible){
 						$branch->add(format_string($course->fullname), new moodle_url('/course/view.php?id='.$course->id), format_string($course->shortname));
 					}
 				}
 			} else {
                $noenrolments = get_string('noenrolments', 'theme_adaptit');
 				$branch->add('<em>'.$noenrolments.'</em>', new moodle_url('/'), $noenrolments);
 			}
            
        }
        
        
         
        return parent::render_custom_menu($menu);
    }
    
    
    /**
    * Get the HTML for blocks in the given region.
    *
    * @since 2.5.1 2.6
    * @param string $region The region to get HTML for.
    * @return string HTML.
    * Written by G J Barnard
    */
    
    public function adaptitblocks($region, $classes = array(), $tag = 'aside') {
        $classes = (array)$classes;
        $classes[] = 'block-region';
        $attributes = array(
            'id' => 'block-region-'.preg_replace('#[^a-zA-Z0-9_\-]+#', '-', $region),
            'class' => join(' ', $classes),
            'data-blockregion' => $region,
            'data-droptarget' => '1'
        );
        return html_writer::tag($tag, $this->blocks_for_region($region), $attributes);
    }
    
}

