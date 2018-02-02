<?php
/**
/**
 * *************************************************************************
 * *                       aboutaboutoc3 - ABout aboutaboutoc3 block                          **
 * *************************************************************************
 * @package     block - #60: Home Page - Messaging                                                   **
 * *************************************************************************
 * ************************************************************************ */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.'); /// It must be included from a Moodle page
}
require_once($CFG->libdir.'/formslib.php');

class local_image_grid_form extends moodleform {
    function definition() {
        global $CFG;
        $mform =& $this->_form;      
        //$mform->addHelpButton('name','name','blocks_about_oc3');
        //1st block
        $mform->addElement('filemanager', 'image1', get_string('image1', 'local_image_grid'), null, array('subdirs' => false, 'maxbytes' => '10MB', 'accepted_types' => '*', 'maxfiles' => 1));
        $mform->addElement('text', 'image_link1', get_string('image_link1','local_image_grid'));
        $mform->setDefault('image_link1', null);
        $mform->setType('image_link1', PARAM_NOTAGS);
        //second block
        $mform->addElement('filemanager', 'image2', get_string('image2', 'local_image_grid'), null, array('subdirs' => false, 'maxbytes' => '10MB', 'accepted_types' => '*', 'maxfiles' => 1));
        $mform->addElement('text', 'image_link2', get_string('image_link2','local_image_grid'));
        $mform->setDefault('image_link2', null);
        $mform->setType('image_link2', PARAM_NOTAGS);
        //third block
        $mform->addElement('filemanager', 'image3', get_string('image3', 'local_image_grid'), null, array('subdirs' => false, 'maxbytes' => '10MB', 'accepted_types' => '*', 'maxfiles' => 1));
        $mform->addElement('text', 'image_link3', get_string('image_link3','local_image_grid'));
        $mform->setDefault('image_link3', null);
        $mform->setType('image_link3', PARAM_NOTAGS);
        //fourth block
        $mform->addElement('filemanager', 'image4', get_string('image4', 'local_image_grid'), null, array('subdirs' => false, 'maxbytes' => '10MB', 'accepted_types' => '*', 'maxfiles' => 1));
        $mform->addElement('text', 'image_link4', get_string('image_link4','local_image_grid'));
        $mform->setDefault('image_link4', null);
        $mform->setType('image_link4', PARAM_NOTAGS);
        //fifth block
        $mform->addElement('filemanager', 'image5', get_string('image5', 'local_image_grid'), null, array('subdirs' => false, 'maxbytes' => '10MB', 'accepted_types' => '*', 'maxfiles' => 1));
        $mform->addElement('text', 'image_link5', get_string('image_link5','local_image_grid'));
        $mform->setDefault('image_link5', null);
        $mform->setType('image_link5', PARAM_NOTAGS);
        //sixth block
        $mform->addElement('filemanager', 'image6', get_string('image6', 'local_image_grid'), null, array('subdirs' => false, 'maxbytes' => '10MB', 'accepted_types' => '*', 'maxfiles' => 1));
        $mform->addElement('text', 'image_link6', get_string('image_link6','local_image_grid'));
        $mform->setDefault('image_link6', null);
        $mform->setType('image_link6', PARAM_NOTAGS);      

        $this->add_action_buttons();
    }
}

