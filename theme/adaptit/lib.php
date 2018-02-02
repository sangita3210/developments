<?php
/**
 * @author     Based on code originally written by Julian Ridden, G J Barnard, Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * Include the Awesome Font.
 */
function theme_adaptit_set_fontwww($css) {
    global $CFG, $PAGE;
    if(empty($CFG->themewww)){
        $themewww = $CFG->wwwroot."/theme";
    } else {
        $themewww = $CFG->themewww;
    }
    $tag = '[[setting:fontwww]]';
    
    $theme = theme_config::load('adaptit');
    if (!empty($theme->settings->bootstrapcdn)) {
    	$css = str_replace($tag, '//netdna.bootstrapcdn.com/font-awesome/4.0.3/fonts/', $css);
    } else {
    	$css = str_replace($tag, $themewww.'/adaptit/fonts/', $css);
    }
    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_adaptit_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        $theme = theme_config::load('adaptit');
        if ($filearea === 'logo') {
            return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
        } else if ((substr($filearea, 0, 5) === 'slide') && (substr($filearea, 6, 5) === 'image')) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if ((substr($filearea, 0, 9) === 'homeblock') && (substr($filearea, 10, 5) === 'image')) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if ((substr($filearea, 0, 5) === 'award') && (substr($filearea, 6, 5) === 'image')) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if ((substr($filearea, 0, 11) === 'testimonial') && (substr($filearea, 12, 5) === 'image')) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if ($filearea === 'iphoneicon') {
            return $theme->setting_file_serve('iphoneicon', $args, $forcedownload, $options);
        } else if ($filearea === 'iphoneretinaicon') {
            return $theme->setting_file_serve('iphoneretinaicon', $args, $forcedownload, $options);
        } else if ($filearea === 'ipadicon') {
            return $theme->setting_file_serve('ipadicon', $args, $forcedownload, $options);
        } else if ($filearea === 'ipadretinaicon') {
            return $theme->setting_file_serve('ipadretinaicon', $args, $forcedownload, $options);
        } else if ($filearea === 'slide1andtextimage') {
            return $theme->setting_file_serve('slide1andtextimage', $args, $forcedownload, $options);
        } else if ($filearea === 'slide2andtextimage') {
            return $theme->setting_file_serve('slide2andtextimage', $args, $forcedownload, $options);
        } else if ($filearea === 'slide3andtextimage') {
            return $theme->setting_file_serve('slide3andtextimage', $args, $forcedownload, $options);
        }  else if ($filearea === 'accordion1') {
            return $theme->setting_file_serve('accordion1', $args, $forcedownload, $options);
        }  else if ($filearea === 'accordion2') {
            return $theme->setting_file_serve('accordion2', $args, $forcedownload, $options);
        }  else if ($filearea === 'accordion3') {
            return $theme->setting_file_serve('accordion3', $args, $forcedownload, $options);
        }  else if ($filearea === 'accordion4') {
            return $theme->setting_file_serve('accordion4', $args, $forcedownload, $options);
        }   else if ($filearea === 'serviceimage1') {
            return $theme->setting_file_serve('serviceimage1', $args, $forcedownload, $options);
        }   else if ($filearea === 'serviceimage2') {
            return $theme->setting_file_serve('serviceimage2', $args, $forcedownload, $options);
        }   else if ($filearea === 'serviceimage3') {
            return $theme->setting_file_serve('serviceimage3', $args, $forcedownload, $options);
        }   else if ($filearea === 'serviceimage4') {
            return $theme->setting_file_serve('serviceimage4', $args, $forcedownload, $options);
        }  
        else {
            send_file_not_found();
        }
    } else {
        send_file_not_found();
    }
}


/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */

function adaptit_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

function theme_adaptit_process_css($css, $theme) {
 
    // Set the navbar seperator.
    if (!empty($theme->settings->navbarsep)) {
        $navbarsep = $theme->settings->navbarsep;
    } else {
        $navbarsep = '\f105';
    }
    $css = theme_adaptit_set_navbarsep($css, $navbarsep);
    
    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = adaptit_set_customcss($css, $customcss);

    // Set Homeblock Block Item Min Height.
    if (!empty($theme->settings->homeblockminheight)) {
        $homeblockminheight = $theme->settings->homeblockminheight;
    } else {
        $homeblockminheight = null;
    }
    $css = theme_adaptit_set_homeblockminheight($css, $homeblockminheight);
    

    // Set the font path.

    $css = theme_adaptit_set_fontwww($css); 
 
    return $css;
}


function theme_adaptit_set_navbarsep($css, $navbarsep) {
    $tag = '[[setting:navbarsep]]';
    $replacement = $navbarsep;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function theme_adaptit_set_homeblockminheight($css, $homeblockminheight) {
    $tag = '[[setting:homeblockminheight]]';
    $replacement = $homeblockminheight;
    if (is_null($replacement)) {
        $replacement = 360;
    }
    $css = str_replace($tag, $replacement.'px', $css);
    return $css;
}


function theme_adaptit_page_init(moodle_page $page) {
    $page->requires->jquery();    
    $page->requires->jquery_plugin('alert', 'theme_adaptit');
    $page->requires->jquery_plugin('carousel', 'theme_adaptit');
    $page->requires->jquery_plugin('collapse', 'theme_adaptit');
    $page->requires->jquery_plugin('modal', 'theme_adaptit');
    $page->requires->jquery_plugin('scrollspy', 'theme_adaptit');
    $page->requires->jquery_plugin('tab', 'theme_adaptit');
    $page->requires->jquery_plugin('tooltip', 'theme_adaptit');
    $page->requires->jquery_plugin('transition', 'theme_adaptit');
    $page->requires->jquery_plugin('backtotop', 'theme_adaptit');
    $page->requires->jquery_plugin('hoverdropdown', 'theme_adaptit');
    $page->requires->jquery_plugin('flexslider', 'theme_adaptit');
    $page->requires->jquery_plugin('anyar-function', 'theme_adaptit');
    $page->requires->jquery_plugin('anyar-wow', 'theme_adaptit');
   
}
