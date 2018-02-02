<?php
$settings = null;

defined('MOODLE_INTERNAL') || die;
    
	$ADMIN->add('themes', new admin_category('theme_adaptit', 'adaptit'));

	// "genericsettings" settingpage
	$temp = new admin_settingpage('theme_adaptit_generic',  get_string('geneicsettings', 'theme_adaptit'));
	
    // Logo file setting.   
    $name = 'theme_adaptit/logo';
    $title = get_string('logo','theme_adaptit');
    $description = get_string('logodesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);  

    // Layout - sidebar position.
    $name = 'theme_adaptit/layout';
    $title = get_string('layout', 'theme_adaptit');
    $description = get_string('layoutdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Include Awesome Font from Bootstrapcdn
    $name = 'theme_adaptit/bootstrapcdn';
    $title = get_string('bootstrapcdn', 'theme_adaptit');
    $description = get_string('bootstrapcdndesc', 'theme_adaptit');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    // Navbar Seperator.
    $name = 'theme_adaptit/navbarsep';
    $title = get_string('navbarsep' , 'theme_adaptit');
    $description = get_string('navbarsepdesc', 'theme_adaptit');
    $nav_thinbracket = get_string('nav_thinbracket', 'theme_adaptit');
    $nav_doublebracket = get_string('nav_doublebracket', 'theme_adaptit');
    $nav_thickbracket = get_string('nav_thickbracket', 'theme_adaptit');
    $nav_slash = get_string('nav_slash', 'theme_adaptit');
    $nav_pipe = get_string('nav_pipe', 'theme_adaptit');
    $dontdisplay = get_string('dontdisplay', 'theme_adaptit');
    $default = '\f105';
    $choices = array('\f105'=>$nav_thinbracket, '/'=>$nav_slash, '\f101'=>$nav_doublebracket, '\f054'=>$nav_thickbracket, '|'=>$nav_pipe);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Copyright setting.
    $name = 'theme_adaptit/copyright';
    $title = get_string('copyright', 'theme_adaptit');
    $description = get_string('copyrightdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footerwidget setting.
    $name = 'theme_adaptit/footerwidget';
    $title = get_string('footerwidget', 'theme_adaptit');
    $description = get_string('footerwidgetdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Custom CSS file.
    $name = 'theme_adaptit/customcss';
    $title = get_string('customcss', 'theme_adaptit');
    $description = get_string('customcssdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_adaptit', $temp);
    
    /* Header Settings */
    $temp = new admin_settingpage('theme_adaptit_header', get_string('headerheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_header', get_string('headerheadingsub', 'theme_adaptit'),
            format_text(get_string('headerdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
    
    // Header widget setting
    $name = 'theme_adaptit/headerwidget';
    $title = get_string('headerwidget','theme_adaptit');
    $description = get_string('headerwidgetdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Header phone number settings
    $name = 'theme_adaptit/headerphone';
    $title = get_string('headerphone','theme_adaptit');
    $description = get_string('headerphonedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Header email settings
    $name = 'theme_adaptit/headeremail';
    $title = get_string('headeremail','theme_adaptit');
    $description = get_string('headeremaildesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_adaptit', $temp);
    
    /* Custom Menu Settings */
    $temp = new admin_settingpage('theme_adaptit_custommenu', get_string('custommenuheading', 'theme_adaptit'));
	            
    // Description for mydashboard
    $name = 'theme_adaptit/mydashboardinfo';
    $heading = get_string('mydashboardinfo', 'theme_adaptit');
    $information = get_string('mydashboardinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable dashboard display in custommenu.
    $name = 'theme_adaptit/displaymydashboard';
    $title = get_string('displaymydashboard', 'theme_adaptit');
    $description = get_string('displaymydashboarddesc', 'theme_adaptit');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Description for mycourse
    $name = 'theme_adaptit/mycoursesinfo';
    $heading = get_string('mycoursesinfo', 'theme_adaptit');
    $information = get_string('mycoursesinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Toggle courses display in custommenu.
    $name = 'theme_adaptit/displaymycourses';
    $title = get_string('displaymycourses', 'theme_adaptit');
    $description = get_string('displaymycoursesdesc', 'theme_adaptit');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Set wording for dropdown course list
	$name = 'theme_adaptit/mycoursetitle';
	$title = get_string('mycoursetitle','theme_adaptit');
	$description = get_string('mycoursetitledesc', 'theme_adaptit');
	$default = 'course';
	$choices = array(
		'course' => get_string('mycourses', 'theme_adaptit'),
		'lesson' => get_string('mylessons', 'theme_adaptit'),
		'class' => get_string('myclasses', 'theme_adaptit'),
		'module' => get_string('mymodules', 'theme_adaptit'),
		'Unit' => get_string('myunits', 'theme_adaptit'),
	);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
    
    $ADMIN->add('theme_adaptit', $temp);
    
    
    /* Footer Blocks Settings */
	$temp = new admin_settingpage('theme_adaptit_footerblocks', get_string('footerblocksheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_footerblocks', get_string('footerblocksheadingsub', 'theme_adaptit'),
            format_text(get_string('footerblocksdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
            
	
	//Enable Footer Blocks.
    $name = 'theme_adaptit/enablefooterblocks';
    $title = get_string('enablefooterblocks', 'theme_adaptit');
    $description = get_string('enablefooterblocksdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	//Footer Block One.
	$name = 'theme_adaptit/footerblock1';
    $title = get_string('footerblock1', 'theme_adaptit');
    $description = get_string('footerblock1desc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Footer Block Two.
	$name = 'theme_adaptit/footerblock2';
    $title = get_string('footerblock2', 'theme_adaptit');
    $description = get_string('footerblock2desc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Footer Block Three.
	$name = 'theme_adaptit/footerblock3';
    $title = get_string('footerblock3', 'theme_adaptit');
    $description = get_string('footerblock3desc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
        
    $ADMIN->add('theme_adaptit', $temp);
    
    
    /* Frontpage Alerts */
    $temp = new admin_settingpage('theme_adaptit_alerts', get_string('alertsheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_alerts', get_string('alertsheadingsub', 'theme_adaptit'),
            format_text(get_string('alertsdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
    
    /* Alert 1 */
    
    // Description for Alert One
    $name = 'theme_adaptit/alert1info';
    $heading = get_string('alert1', 'theme_adaptit');
    $information = get_string('alert1desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert One
    $name = 'theme_adaptit/enable1alert';
    $title = get_string('enablealert', 'theme_adaptit');
    $description = get_string('enablealertdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert One Type.
    $name = 'theme_adaptit/alert1type';
    $title = get_string('alerttype' , 'theme_adaptit');
    $description = get_string('alerttypedesc', 'theme_adaptit');
    $alert_info = get_string('alert_info', 'theme_adaptit');
    $alert_warning = get_string('alert_warning', 'theme_adaptit');
    $alert_general = get_string('alert_general', 'theme_adaptit');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert One Title.
    $name = 'theme_adaptit/alert1title';
    $title = get_string('alerttitle', 'theme_adaptit');
    $description = get_string('alerttitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert One Text.
    $name = 'theme_adaptit/alert1text';
    $title = get_string('alerttext', 'theme_adaptit');
    $description = get_string('alerttextdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Alert 2 */
    
    // Description for Alert Two
    $name = 'theme_adaptit/alert2info';
    $heading = get_string('alert2', 'theme_adaptit');
    $information = get_string('alert2desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert Two
    $name = 'theme_adaptit/enable2alert';
    $title = get_string('enablealert', 'theme_adaptit');
    $description = get_string('enablealertdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Two Type.
    $name = 'theme_adaptit/alert2type';
    $title = get_string('alerttype' , 'theme_adaptit');
    $description = get_string('alerttypedesc', 'theme_adaptit');
    $alert_info = get_string('alert_info', 'theme_adaptit');
    $alert_warning = get_string('alert_warning', 'theme_adaptit');
    $alert_general = get_string('alert_general', 'theme_adaptit');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Two Title.
    $name = 'theme_adaptit/alert2title';
    $title = get_string('alerttitle', 'theme_adaptit');
    $description = get_string('alerttitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Two Text.
    $name = 'theme_adaptit/alert2text';
    $title = get_string('alerttext', 'theme_adaptit');
    $description = get_string('alerttextdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Alert 3 */
    
    // Description for Alert Three.
    $name = 'theme_adaptit/alert3info';
    $heading = get_string('alert3', 'theme_adaptit');
    $information = get_string('alert3desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert Three.
    $name = 'theme_adaptit/enable3alert';
    $title = get_string('enablealert', 'theme_adaptit');
    $description = get_string('enablealertdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Three Type.
    $name = 'theme_adaptit/alert3type';
    $title = get_string('alerttype' , 'theme_adaptit');
    $description = get_string('alerttypedesc', 'theme_adaptit');
    $alert_info = get_string('alert_info', 'theme_adaptit');
    $alert_warning = get_string('alert_warning', 'theme_adaptit');
    $alert_general = get_string('alert_general', 'theme_adaptit');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Three Title.
    $name = 'theme_adaptit/alert3title';
    $title = get_string('alerttitle', 'theme_adaptit');
    $description = get_string('alerttitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Three Text.
    $name = 'theme_adaptit/alert3text';
    $title = get_string('alerttext', 'theme_adaptit');
    $description = get_string('alerttextdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
            
    
    $ADMIN->add('theme_adaptit', $temp);
 
 
    /* Slideshow Widget Settings */
    $temp = new admin_settingpage('theme_adaptit_slideshow', get_string('slideshowheading', 'theme_adaptit'));
    $temp->add(new admin_setting_heading('theme_adaptit_slideshow', get_string('slideshowheadingsub', 'theme_adaptit'),
            format_text(get_string('slideshowdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
    
    // Enable Slideshow.    
    $name = 'theme_adaptit/useslideshow';
    $title = get_string('useslideshow', 'theme_adaptit');
    $description = get_string('useslideshowdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    

    /* Slide 1 */
     
    // Description for Slide One
    $name = 'theme_adaptit/slide1info';
    $heading = get_string('slide1', 'theme_adaptit');
    $information = get_string('slideinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_adaptit/slide1';
    $title = get_string('slidetitle', 'theme_adaptit');
    $description = get_string('slidetitledesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_adaptit/slide1image';
    $title = get_string('slideimage', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_adaptit/slide1caption';
    $title = get_string('slidecaption', 'theme_adaptit');
    $description = get_string('slidecaptiondesc', 'theme_adaptit');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_adaptit/slide1url';
    $title = get_string('slideurl', 'theme_adaptit');
    $description = get_string('slideurldesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /* Slide 2 */
     
    //Description for Slide Two
    $name = 'theme_adaptit/slide2info';
    $heading = get_string('slide2', 'theme_adaptit');
    $information = get_string('slideinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_adaptit/slide2';
    $title = get_string('slidetitle', 'theme_adaptit');
    $description = get_string('slidetitledesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_adaptit/slide2image';
    $title = get_string('slideimage', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_adaptit/slide2caption';
    $title = get_string('slidecaption', 'theme_adaptit');
    $description = get_string('slidecaptiondesc', 'theme_adaptit');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_adaptit/slide2url';
    $title = get_string('slideurl', 'theme_adaptit');
    $description = get_string('slideurldesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /* Slide 3 */

    //Description for Slide Three
    $name = 'theme_adaptit/slide3info';
    $heading = get_string('slide3', 'theme_adaptit');
    $information = get_string('slideinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Title.
    $name = 'theme_adaptit/slide3';
    $title = get_string('slidetitle', 'theme_adaptit');
    $description = get_string('slidetitledesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_adaptit/slide3image';
    $title = get_string('slideimage', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_adaptit/slide3caption';
    $title = get_string('slidecaption', 'theme_adaptit');
    $description = get_string('slidecaptiondesc', 'theme_adaptit');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_adaptit/slide3url';
    $title = get_string('slideurl', 'theme_adaptit');
    $description = get_string('slideurldesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /* Slide 4 */
     
    // Description for Slide Four
    $name = 'theme_adaptit/slide4info';
    $heading = get_string('slide4', 'theme_adaptit');
    $information = get_string('slideinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_adaptit/slide4';
    $title = get_string('slidetitle', 'theme_adaptit');
    $description = get_string('slidetitledesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_adaptit/slide4image';
    $title = get_string('slideimage', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_adaptit/slide4caption';
    $title = get_string('slidecaption', 'theme_adaptit');
    $description = get_string('slidecaptiondesc', 'theme_adaptit');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_adaptit/slide4url';
    $title = get_string('slideurl', 'theme_adaptit');
    $description = get_string('slideurldesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_adaptit', $temp);

    /*custom slide and text moment*/
    $temp = new admin_settingpage('theme_adaptit_slideandtext', get_string('slideandtext', 'theme_adaptit'));
    // $temp->add(new admin_setting_heading('theme_adaptit_slideandtext', get_string('slideandtextheading', 'theme_adaptit'),
    //         format_text(get_string('slideandtextdesc', 'theme_adaptit'), FORMAT_MARKDOWN)));

    /*Enable Slide and Text Content*/
    $name = 'theme_adaptit/useslideandtext1';
    $title = get_string('useslideandtext', 'theme_adaptit');
    $desc = get_string('useslideshowandtextdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $desc, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*slide 1 */
    $name = 'theme_adaptit/slide1andtextinfo';
    $heading = get_string('slide1', 'theme_adaptit');
    $information = get_string('slidetextinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /* slide1 image*/
    $name = 'theme_adaptit/slide1andtextimage';
    $title = get_string('slideandtextimage', 'theme_adaptit');
    $desc = get_string('slideandtextimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $desc,'slide1andtextimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*text heading*/

    $name = 'theme_adaptit/slide1andtextheading';
    $title = get_string('slideandtextheading', 'theme_adaptit');
    $desc = get_string('slideandtextheadingdesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $desc, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // text or description of slide
    $name = 'theme_adaptit/slide1andtextdesc';
    $title = get_string('slideandtextdesc', 'theme_adaptit');
    $desc = get_string('sidetextdesc', 'theme_adaptit');
    $setting = new admin_setting_confightmleditor($name, $title, $desc, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_adaptit/slide1andtexturl';
    $title = get_string('slideandtexturl', 'theme_adaptit');
    $desc = get_string('slideandtexturldesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $desc, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*slide 2*/

    $name = 'theme_adaptit/slide2andtextinfo';
    $heading = get_string('slide2', 'theme_adaptit');
    $information = get_string('slidetextinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /* slide2 image*/
    $name = 'theme_adaptit/slide2andtextimage';
    $title = get_string('slideandtextimage', 'theme_adaptit');
    $desc = get_string('slideandtextimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $desc, 'slide2andtextimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

     /*text heading*/
    $name = 'theme_adaptit/slide2andtextheading';
    $title = get_string('slideandtextheading', 'theme_adaptit');
    $desc = get_string('slideandtextheadingdesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $desc, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    // text or description of slide
    $name = 'theme_adaptit/slide2andtextdesc';
    $title = get_string('slideandtextdesc', 'theme_adaptit');
    $desc = get_string('sidetextdesc', 'theme_adaptit');
    $setting = new admin_setting_confightmleditor($name, $title, $desc, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_adaptit/slide2andtexturl';
    $title = get_string('slideandtexturl', 'theme_adaptit');
    $desc =  get_string('slideandtexturldesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $desc, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*slide 3*/
    $name = 'theme_adaptit/slide3andtextinfo';
    $heading = get_string('slide3', 'theme_adaptit');
    $information = get_string('slidetextinfodesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /* slide3 image*/
    $name = 'theme_adaptit/slide3andtextimage';
    $title = get_string('slideandtextimage', 'theme_adaptit');
    $desc = get_string('slideandtextimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $desc, 'slide3andtextimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*text heading*/
    $name = 'theme_adaptit/slide3andtextheading';
    $title = get_string('slideandtextheading', 'theme_adaptit');
    $desc = get_string('slideandtextheadingdesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $desc, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);




    // text or description of slide
    $name = 'theme_adaptit/slide3andtextdesc';
    $title = get_string('slideandtextdesc', 'theme_adaptit');
    $desc = get_string('sidetextdesc', 'theme_adaptit');
    $setting = new admin_setting_confightmleditor($name, $title, $desc, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_adaptit/slide3andtexturl';
    $title = get_string('slideandtexturl', 'theme_adaptit');
    $desc = get_string('slideandtexturldesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $desc, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_adaptit', $temp);


    /* Frontpage Promo Box */
    $temp = new admin_settingpage('theme_adaptit_promo', get_string('promoheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_promo', get_string('promosub', 'theme_adaptit'),
            format_text(get_string('promodesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
    
    // Enable Promo Box
    $name = 'theme_adaptit/usepromo';
    $title = get_string('usepromo', 'theme_adaptit');
    $description = get_string('usepromodesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Frontpage Promo Box Title
    $name = 'theme_adaptit/promotitle';
    $title = get_string('promotitle', 'theme_adaptit');
    $description = get_string('promotitledesc', 'theme_adaptit');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Frontpage Promo Copy
    $name = 'theme_adaptit/promocopy';
    $title = get_string('promocopy', 'theme_adaptit');
    $description = get_string('promocopydesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
        
    //Frontpage Promo Box CTA button text
    $name = 'theme_adaptit/promocta';
    $title = get_string('promocta', 'theme_adaptit');
    $description = get_string('promoctadesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Frontpage Promo Box CTA button URL
    $name = 'theme_adaptit/promoctaurl';
    $title = get_string('promoctaurl', 'theme_adaptit');
    $description = get_string('promoctaurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        
    $ADMIN->add('theme_adaptit', $temp);
    

	/* Home Blocks Settings */	
	$temp = new admin_settingpage('theme_adaptit_homeblocks', get_string('homeblocksheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_homeblocks', get_string('homeblocksheadingsub', 'theme_adaptit'),
            format_text(get_string('homeblocksdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
            
	
	//Enable Home Blocks.
    $name = 'theme_adaptit/usehomeblocks';
    $title = get_string('usehomeblocks', 'theme_adaptit');
    $description = get_string('usehomeblocksdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
     // Block Item Min Height
	$name = 'theme_adaptit/homeblockminheight';
	$title = get_string('homeblockminheight','theme_adaptit');
	$description = get_string('homeblockminheightdesc', 'theme_adaptit');
	$default = '360';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
	
	/* Home Block 1 */	
	$name = 'theme_adaptit/homeblock1';
    $title = get_string('homeblocktitle', 'theme_adaptit');
    $description = get_string('homeblocktitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock1image';
    $title = get_string('homeblockimage', 'theme_adaptit');
    $description = get_string('homeblockimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock1content';
    $title = get_string('homeblockcontent', 'theme_adaptit');
    $description = get_string('homeblockcontentdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock1buttontext';
    $title = get_string('homeblockbuttontext', 'theme_adaptit');
    $description = get_string('homeblockbuttontextdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock1buttonurl';
    $title = get_string('homeblockbuttonurl', 'theme_adaptit');
    $description = get_string('homeblockbuttonurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Home Block 2 */    
	$name = 'theme_adaptit/homeblock2';
    $title = get_string('homeblocktitle', 'theme_adaptit');
    $description = get_string('homeblocktitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock2image';
    $title = get_string('homeblockimage', 'theme_adaptit');
    $description = get_string('homeblockimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock2content';
    $title = get_string('homeblockcontent', 'theme_adaptit');
    $description = get_string('homeblockcontentdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock2buttontext';
    $title = get_string('homeblockbuttontext', 'theme_adaptit');
    $description = get_string('homeblockbuttontextdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock2buttonurl';
    $title = get_string('homeblockbuttonurl', 'theme_adaptit');
    $description = get_string('homeblockbuttonurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Home Block 3 */    
	$name = 'theme_adaptit/homeblock3';
    $title = get_string('homeblocktitle', 'theme_adaptit');
    $description = get_string('homeblocktitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock3image';
    $title = get_string('homeblockimage', 'theme_adaptit');
    $description = get_string('homeblockimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock3content';
    $title = get_string('homeblockcontent', 'theme_adaptit');
    $description = get_string('homeblockcontentdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock3buttontext';
    $title = get_string('homeblockbuttontext', 'theme_adaptit');
    $description = get_string('homeblockbuttontextdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_adaptit/homeblock3buttonurl';
    $title = get_string('homeblockbuttonurl', 'theme_adaptit');
    $description = get_string('homeblockbuttonurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    $ADMIN->add('theme_adaptit', $temp);
    

    /* Frontpage Awards */
    $temp = new admin_settingpage('theme_adaptit_awards', get_string('awardsheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_awards', get_string('awardssub', 'theme_adaptit'),
            format_text(get_string('awardsdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
    
    // Enable Awards Section
    $name = 'theme_adaptit/useawards';
    $title = get_string('useawards', 'theme_adaptit');
    $description = get_string('useawardsdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Award 1 */
    
    // Description for Award One
    $name = 'theme_adaptit/award1info';
    $heading = get_string('award1', 'theme_adaptit');
    $information = get_string('award1desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Award Image 
    $name = 'theme_adaptit/award1image';
    $title = get_string('awardimage', 'theme_adaptit');
    $description = get_string('awardimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'award1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Award Image Alt Text
    $name = 'theme_adaptit/award1alttext';
    $title = get_string('awardalttext', 'theme_adaptit');
    $description = get_string('awardalttextdesc', 'theme_adaptit');
    $default = 'award';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    

    // Award URL
    $name = 'theme_adaptit/award1url';
    $title = get_string('awardurl', 'theme_adaptit');
    $description = get_string('awardurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    
    /* Award 2 */
    
    // Description for Award Two
    $name = 'theme_adaptit/award2info';
    $heading = get_string('award2', 'theme_adaptit');
    $information = get_string('award2desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Award Image 
    $name = 'theme_adaptit/award2image';
    $title = get_string('awardimage', 'theme_adaptit');
    $description = get_string('awardimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'award2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Award Image Alt Text
    $name = 'theme_adaptit/award2alttext';
    $title = get_string('awardalttext', 'theme_adaptit');
    $description = get_string('awardalttextdesc', 'theme_adaptit');
    $default = 'award';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Award URL
    $name = 'theme_adaptit/award2url';
    $title = get_string('awardurl', 'theme_adaptit');
    $description = get_string('awardurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    /* Award 3 */
    
    // Description for Award Three
    $name = 'theme_adaptit/award3info';
    $heading = get_string('award3', 'theme_adaptit');
    $information = get_string('award3desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Award Image 
    $name = 'theme_adaptit/award3image';
    $title = get_string('awardimage', 'theme_adaptit');
    $description = get_string('awardimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'award3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Award Image Alt Text
    $name = 'theme_adaptit/award3alttext';
    $title = get_string('awardalttext', 'theme_adaptit');
    $description = get_string('awardalttextdesc', 'theme_adaptit');
    $default = 'award';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Award URL
    $name = 'theme_adaptit/award3url';
    $title = get_string('awardurl', 'theme_adaptit');
    $description = get_string('awardurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Award 4 */
    
    // Description for Award Four
    $name = 'theme_adaptit/award4info';
    $heading = get_string('award4', 'theme_adaptit');
    $information = get_string('award4desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Award Image 
    $name = 'theme_adaptit/award4image';
    $title = get_string('awardimage', 'theme_adaptit');
    $description = get_string('awardimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'award4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Award Image Alt Text
    $name = 'theme_adaptit/award4alttext';
    $title = get_string('awardalttext', 'theme_adaptit');
    $description = get_string('awardalttextdesc', 'theme_adaptit');
    $default = 'award';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Award URL
    $name = 'theme_adaptit/award4url';
    $title = get_string('awardurl', 'theme_adaptit');
    $description = get_string('awardurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Award 5 */
    
    // Description for Award Five
    $name = 'theme_adaptit/award5info';
    $heading = get_string('award5', 'theme_adaptit');
    $information = get_string('award5desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Award Image 
    $name = 'theme_adaptit/award5image';
    $title = get_string('awardimage', 'theme_adaptit');
    $description = get_string('awardimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'award5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Award Image Alt Text
    $name = 'theme_adaptit/award5alttext';
    $title = get_string('awardalttext', 'theme_adaptit');
    $description = get_string('awardalttextdesc', 'theme_adaptit');
    $default = 'award';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Award URL
    $name = 'theme_adaptit/award5url';
    $title = get_string('awardurl', 'theme_adaptit');
    $description = get_string('awardurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Award 6 */
    
    // Description for Award Six
    $name = 'theme_adaptit/award6info';
    $heading = get_string('award6', 'theme_adaptit');
    $information = get_string('award6desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Award Image 
    $name = 'theme_adaptit/award6image';
    $title = get_string('awardimage', 'theme_adaptit');
    $description = get_string('awardimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'award6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Award Image Alt Text
    $name = 'theme_adaptit/award6alttext';
    $title = get_string('awardalttext', 'theme_adaptit');
    $description = get_string('awardalttextdesc', 'theme_adaptit');
    $default = 'award';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Award URL
    $name = 'theme_adaptit/award6url';
    $title = get_string('awardurl', 'theme_adaptit');
    $description = get_string('awardurldesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
       
    $ADMIN->add('theme_adaptit', $temp);
    
    /* Frontpage Testimonials */
    $temp = new admin_settingpage('theme_adaptit_testimonials', get_string('testimonialsheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_testimonials', get_string('testimonialssub', 'theme_adaptit'),
            format_text(get_string('testimonialsdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
    
    // Enable Testimonails section
    $name = 'theme_adaptit/usetestimonials';
    $title = get_string('usetestimonials', 'theme_adaptit');
    $description = get_string('usetestimonialsdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Testimonial 1 */
    
    // Description for Testimonial One
    $name = 'theme_adaptit/testimonial1info';
    $heading = get_string('testimonial1', 'theme_adaptit');
    $information = get_string('testimonial1desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Testimonial Image 
    $name = 'theme_adaptit/testimonial1image';
    $title = get_string('testimonialimage', 'theme_adaptit');
    $description = get_string('testimonialimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_adaptit/testimonial1name';
    $title = get_string('testimonialname', 'theme_adaptit');
    $description = get_string('testimonialnamedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Title
    $name = 'theme_adaptit/testimonial1title';
    $title = get_string('testimonialtitle', 'theme_adaptit');
    $description = get_string('testimonialtitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Content 
    $name = 'theme_adaptit/testimonial1content';
    $title = get_string('testimonialcontent', 'theme_adaptit');
    $description = get_string('testimonialcontentdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Testimonial 2 */
    
    // Description for Testimonial Two
    $name = 'theme_adaptit/testimonial2info';
    $heading = get_string('testimonial2', 'theme_adaptit');
    $information = get_string('testimonial2desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Testimonial Image 
    $name = 'theme_adaptit/testimonial2image';
    $title = get_string('testimonialimage', 'theme_adaptit');
    $description = get_string('testimonialimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_adaptit/testimonial2name';
    $title = get_string('testimonialname', 'theme_adaptit');
    $description = get_string('testimonialnamedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Title
    $name = 'theme_adaptit/testimonial2title';
    $title = get_string('testimonialtitle', 'theme_adaptit');
    $description = get_string('testimonialtitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Content 
    $name = 'theme_adaptit/testimonial2content';
    $title = get_string('testimonialcontent', 'theme_adaptit');
    $description = get_string('testimonialcontentdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Testimonial 3 */
    
    // Description for Testimonial Three
    $name = 'theme_adaptit/testimonial3info';
    $heading = get_string('testimonial3', 'theme_adaptit');
    $information = get_string('testimonial3desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);    $temp->add($setting);
    
    // Testimonial Image 
    $name = 'theme_adaptit/testimonial3image';
    $title = get_string('testimonialimage', 'theme_adaptit');
    $description = get_string('testimonialimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_adaptit/testimonial3name';
    $title = get_string('testimonialname', 'theme_adaptit');
    $description = get_string('testimonialnamedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Title
    $name = 'theme_adaptit/testimonial3title';
    $title = get_string('testimonialtitle', 'theme_adaptit');
    $description = get_string('testimonialtitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Content 
    $name = 'theme_adaptit/testimonial3content';
    $title = get_string('testimonialcontent', 'theme_adaptit');
    $description = get_string('testimonialcontentdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /* Testimonial 4 */
    
    // Description for Testimonial Four
    $name = 'theme_adaptit/testimonial4info';
    $heading = get_string('testimonial4', 'theme_adaptit');
    $information = get_string('testimonial4desc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Testimonial Image 
    $name = 'theme_adaptit/testimonial4image';
    $title = get_string('testimonialimage', 'theme_adaptit');
    $description = get_string('testimonialimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_adaptit/testimonial4name';
    $title = get_string('testimonialname', 'theme_adaptit');
    $description = get_string('testimonialnamedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Profile Title
    $name = 'theme_adaptit/testimonial4title';
    $title = get_string('testimonialtitle', 'theme_adaptit');
    $description = get_string('testimonialtitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Testimonial Content 
    $name = 'theme_adaptit/testimonial4content';
    $title = get_string('testimonialcontent', 'theme_adaptit');
    $description = get_string('testimonialcontentdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_adaptit', $temp);
    

	/* Social Network Settings */
	$temp = new admin_settingpage('theme_adaptit_social', get_string('socialheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_social', get_string('socialheadingsub', 'theme_adaptit'),
            format_text(get_string('socialdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
            
    // Enable social media in the topbar
    $name = 'theme_adaptit/enabletopbarsocial';
    $title = get_string('enabletopbarsocial', 'theme_adaptit');
    $description = get_string('enabletopbarsocialdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Enable social media in the bottombar
    $name = 'theme_adaptit/enablebottombarsocial';
    $title = get_string('enablebottombarsocial', 'theme_adaptit');
    $description = get_string('enablebottombarsocialdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
            
    // Twitter url setting.
    $name = 'theme_adaptit/twitter';
    $title = get_string('twitter', 'theme_adaptit');
    $description = get_string('twitterdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Facebook url setting.
    $name = 'theme_adaptit/facebook';
    $title = get_string('facebook', 'theme_adaptit');
    $description = get_string('facebookdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // YouTube url setting.
    $name = 'theme_adaptit/youtube';
    $title = get_string('youtube', 'theme_adaptit');
    $description = get_string('youtubedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // LinkedIn url setting.
    $name = 'theme_adaptit/linkedin';
    $title = get_string('linkedin', 'theme_adaptit');
    $description = get_string('linkedindesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Flickr url setting.
    $name = 'theme_adaptit/flickr';
    $title = get_string('flickr', 'theme_adaptit');
    $description = get_string('flickrdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Google+ url setting.
    $name = 'theme_adaptit/googleplus';
    $title = get_string('googleplus', 'theme_adaptit');
    $description = get_string('googleplusdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Pinterest url setting.
    $name = 'theme_adaptit/pinterest';
    $title = get_string('pinterest', 'theme_adaptit');
    $description = get_string('pinterestdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Instagram url setting.
    $name = 'theme_adaptit/instagram';
    $title = get_string('instagram', 'theme_adaptit');
    $description = get_string('instagramdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Skype account setting.
    $name = 'theme_adaptit/skype';
    $title = get_string('skype', 'theme_adaptit');
    $description = get_string('skypedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // RSS url setting.
    $name = 'theme_adaptit/rss';
    $title = get_string('rss', 'theme_adaptit');
    $description = get_string('rssdesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    //Description for iOS Icons
    $name = 'theme_adaptit/iosiconinfo';
    $heading = get_string('iosicon', 'theme_adaptit');
    $information = get_string('iosicondesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // iPhone Icon.
    $name = 'theme_adaptit/iphoneicon';
    $title = get_string('iphoneicon', 'theme_adaptit');
    $description = get_string('iphoneicondesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPhone Retina Icon.
    $name = 'theme_adaptit/iphoneretinaicon';
    $title = get_string('iphoneretinaicon', 'theme_adaptit');
    $description = get_string('iphoneretinaicondesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPad Icon.
    $name = 'theme_adaptit/ipadicon';
    $title = get_string('ipadicon', 'theme_adaptit');
    $description = get_string('ipadicondesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPad Retina Icon.
    $name = 'theme_adaptit/ipadretinaicon';
    $title = get_string('ipadretinaicon', 'theme_adaptit');
    $description = get_string('ipadretinaicondesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_adaptit', $temp);
       
    
    /* Analytics Settings */
    $temp = new admin_settingpage('theme_adaptit_analytics', get_string('analyticsheading', 'theme_adaptit'));
	$temp->add(new admin_setting_heading('theme_adaptit_analytics', get_string('analyticsheadingsub', 'theme_adaptit'),
            format_text(get_string('analyticsdesc' , 'theme_adaptit'), FORMAT_MARKDOWN)));
    
    // Enable Analytics
    $name = 'theme_adaptit/useanalytics';
    $title = get_string('useanalytics', 'theme_adaptit');
    $description = get_string('useanalyticsdesc', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Google Analytics ID
    $name = 'theme_adaptit/analyticsid';
    $title = get_string('analyticsid', 'theme_adaptit');
    $description = get_string('analyticsiddesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
        
    $ADMIN->add('theme_adaptit', $temp);

     /*About Us Content*/
    $temp = new admin_settingpage('theme_adaptit_aboutus', get_string('aboutus', 'theme_adaptit'));
    //$temp->add(new admin_setting_heading('theme_adaptit_aboutus', get_string('aboutus', 'theme_adaptit'),
      //       format_text(get_string('slideandtextdesc', 'theme_adaptit'), FORMAT_MARKDOWN)));

    /*Content Heding and Description*/
    $name = 'theme_adaptit/aboutustitle';
    $title = get_string('aboutustitle', 'theme_adaptit');
    $desc = get_string('aboutcheck', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $desc, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*About Us Heading */
    $name = 'theme_adaptit/aboutusheading';
    $heading = get_string('title', 'theme_adaptit');
    $information = get_string('titledesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /*heading text for setting*/
    $name = 'theme_adaptit/headingtext';
    $title = get_string('aboutustitle', 'theme_adaptit');
    $description = get_string('aboutustitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*heading description*/
    $name = 'theme_adaptit/aboutusdescription';
    $title = get_string('aboutusdesc', 'theme_adaptit');
    $description = get_string('aboutustitledesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*Progress Bar Setting here*/
    $name = 'theme_adaptit/progressbar';
    $heading = get_string('pbtitle', 'theme_adaptit');
    $information = get_string('pbtitledesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);


     /*1st progress bar percentage*/
    $name = 'theme_adaptit/progressbar1';
    $title = get_string('progbar1', 'theme_adaptit');
    $description = get_string('progbartext1', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*1st Enter progrress bar text*/
    $name = 'theme_adaptit/progressbartext1';
    $title = get_string('progtext1', 'theme_adaptit');
    $description ='';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

      /*2nd progress bar percentage*/
    $name = 'theme_adaptit/progressbar2';
    $title = get_string('progbar2', 'theme_adaptit');
    $description = get_string('progbartext2', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*2nd Enter progrress bar text*/
    $name = 'theme_adaptit/progressbartext2';
    $title = get_string('progtext2', 'theme_adaptit');
    $description ='';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

  /*3rd progress bar percentage*/
    $name = 'theme_adaptit/progressbar3';
    $title = get_string('progbar3', 'theme_adaptit');
    $description = get_string('progbartext3', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*3rd Enter progrress bar text*/
    $name = 'theme_adaptit/progressbartext3';
    $title = get_string('progtext3', 'theme_adaptit');
    $description ='';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

  /*4th progress bar percentage*/
    $name = 'theme_adaptit/progressbar4';
    $title = get_string('progbar4', 'theme_adaptit');
    $description = get_string('progbartext4', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*4th Enter progrress bar text*/
    $name = 'theme_adaptit/progressbartext4';
    $title = get_string('progtext4', 'theme_adaptit');
    $description ='';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*Accordion Heading*/
    $name = 'theme_adaptit/accordionheading';
    $heading = get_string('actitle', 'theme_adaptit');
    $information = get_string('actitledesc', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    /*First Accordion Setting here*/
    $name = 'theme_adaptit/accordionheading1';
    $title = get_string('accorheading1', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*First accordion title */
    $name = 'theme_adaptit/accordiontitle1';
    $title = get_string('accortitle1', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*First Accordion Image*/
    $name = 'theme_adaptit/accordion1';
    $title = get_string('accorimage1', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'accordion1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    

    /*First Accordion Description*/
    $name = 'theme_adaptit/accordiondesc1';
    $title = get_string('accordesc1', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*Second Accordion Heading*/
    $name = 'theme_adaptit/acheading2';
    $heading = get_string('actitle2', 'theme_adaptit');
    $information = get_string('actitledesc2', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    
    /*Second Accordion Setting here*/
    $name = 'theme_adaptit/accordionheading2';
    $title = get_string('accorheading2', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*Second accordion title */
    $name = 'theme_adaptit/accordiontitle2';
    $title = get_string('accortitle2', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*Second Accordion Image*/
    $name = 'theme_adaptit/accordion2';
    $title = get_string('accorimage2', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'accordion2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    /*Second Accordion Description*/
    $name = 'theme_adaptit/accordiondesc2';
    $title = get_string('accordesc2', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*3rd Accodion Setting here*/
    $name = 'theme_adaptit/acheading3';
    $heading = get_string('actitle3', 'theme_adaptit');
    $information = get_string('actitledesc3', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    
    /*3rd Accordion Setting here*/
    $name = 'theme_adaptit/accordionheading3';
    $title = get_string('accorheading3', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*3rd accordion title */
    $name = 'theme_adaptit/accordiontitle3';
    $title = get_string('accortitle3', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*3rd Accordion Image*/
    $name = 'theme_adaptit/accordion3';
    $title = get_string('accorimage3', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'accordion3');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*3rd Accordion Description*/
    $name = 'theme_adaptit/accordiondesc3';
    $title = get_string('accordesc3', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*4th Accodion Setting here*/
    $name = 'theme_adaptit/acheading4';
    $heading = get_string('actitle4', 'theme_adaptit');
    $information = get_string('actitledesc4', 'theme_adaptit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    
    /*4th Accordion Setting here*/
    $name = 'theme_adaptit/accordionheading4';
    $title = get_string('accorheading4', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*4th accordion title */
    $name = 'theme_adaptit/accordiontitle4';
    $title = get_string('accortitle4', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*4th Accordion Image*/
   $name = 'theme_adaptit/accordion4';
    $title = get_string('accorimage4', 'theme_adaptit');
    $description = get_string('slideimagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'accordion4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    /*4th Accordion Description*/
    $name = 'theme_adaptit/accordiondesc4';
    $title = get_string('accordesc4', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    $ADMIN->add('theme_adaptit', $temp);

     /*Service Settings Here */
    $temp = new admin_settingpage('theme_adaptit_service', get_string('service', 'theme_adaptit'));

    /* Service Content Heding and Description*/
    $name = 'theme_adaptit/servicetitle';
    $title = get_string('servicetitle', 'theme_adaptit');
    $desc = get_string('servicecheck', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $desc, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*Service Heading */
    $name = 'theme_adaptit/serviceheading';
    $heading = get_string('service', 'theme_adaptit');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /*heading text for setting*/
    $name = 'theme_adaptit/serviceheadingtext';
    $title = get_string('serviceheading', 'theme_adaptit');
    $description = get_string('servicedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*service main page  description*/
    $name = 'theme_adaptit/servicedescfront';
    $title = get_string('servicedescription', 'theme_adaptit');
    $description = get_string('servicedesc', 'theme_adaptit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*First Block  Setting here*/
    $name = 'theme_adaptit/serviceblock1';
    $heading = get_string('block1', 'theme_adaptit');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /*1st block service  Image*/
    $name = 'theme_adaptit/serviceimage1';
    $title = get_string('blockimage1', 'theme_adaptit');
    $description = get_string('block1imagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'serviceimage1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

  
    /*First Block Title */
    $name = 'theme_adaptit/blocktitle1';
    $title = get_string('serviceblocktitle1', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
  
    /*First Block  Description*/
    $name = 'theme_adaptit/blockdesc1';
    $title = get_string('serviceblockdesc1', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*Second Block  Setting here*/
    $name = 'theme_adaptit/serviceblock2';
    $heading = get_string('block2', 'theme_adaptit');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /*2nd block service  Image*/
    $name = 'theme_adaptit/serviceimage2';
    $title = get_string('blockimage2', 'theme_adaptit');
    $description = get_string('block2imagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'serviceimage2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

  
    /*2nd Block Title */
    $name = 'theme_adaptit/blocktitle2';
    $title = get_string('serviceblocktitle2', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
  
    /*2nd Block  Description*/
    $name = 'theme_adaptit/blockdesc2';
    $title = get_string('serviceblockdesc2', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /********************************/
    /*3rd Block  Setting here*/
    $name = 'theme_adaptit/serviceblock3';
    $heading = get_string('block3', 'theme_adaptit');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /*3rd block service  Image*/
    $name = 'theme_adaptit/serviceimage3';
    $title = get_string('blockimage3', 'theme_adaptit');
    $description = get_string('block3imagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'serviceimage3');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

  
    /*3rd Block Title */
    $name = 'theme_adaptit/blocktitle3';
    $title = get_string('serviceblocktitle3', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
  
    /*3rd  Block  Description*/
    $name = 'theme_adaptit/blockdesc3';
    $title = get_string('serviceblockdesc3', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /********************************/
    /*4th Block  Setting here*/
    $name = 'theme_adaptit/serviceblock4';
    $heading = get_string('block4', 'theme_adaptit');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    /*4th block service  Image*/
    $name = 'theme_adaptit/serviceimage4';
    $title = get_string('blockimage4', 'theme_adaptit');
    $description = get_string('block4imagedesc', 'theme_adaptit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'serviceimage4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

  
    /*4th Block Title */
    $name = 'theme_adaptit/blocktitle4';
    $title = get_string('serviceblocktitle4', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
  
    /*4th  Block  Description*/
    $name = 'theme_adaptit/blockdesc4';
    $title = get_string('serviceblockdesc4', 'theme_adaptit');
    $description = '';
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_adaptit', $temp);

    /*OVER PLAY SLIDER SETTING HERE*/
    /*$temp = new admin_settingpage('theme_adaptit_overplayslider', get_string('overslider2', 'theme_adaptit'));
*/
    /* Service Content Heding and Description*/
   /* $name = 'theme_adaptit/overslider2title';
    $title = get_string('overslider2title', 'theme_adaptit');
    $desc = get_string('overslider2check', 'theme_adaptit');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $desc, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);*/

    /*Service Heading */
    /*$name = 'theme_adaptit/overslider2heading';
    $heading = get_string('overslider2title', 'theme_adaptit');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
*/

