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

class block_about_oc3_form extends moodleform {
    function definition() {
        global $CFG;
        $mform =& $this->_form;

        $mform->addElement('text', 'name', get_string('name','block_about_oc3'));
        $mform->setDefault('name', null);
        $mform->setType('name', PARAM_NOTAGS);
        $mform->addRule('name', 'required', 'required', null, 'client');
        //$mform->addHelpButton('name','name','blocks_about_oc3');

        $mform->addElement('filemanager', 'image', get_string('block_image', 'block_about_oc3'), null, array('subdirs' => false, 'maxbytes' => '10MB', 'accepted_types' => '*', 'maxfiles' => 1));

        $mform->addElement('htmleditor', 'description', get_string('description','block_about_oc3'));
        $mform->setDefault('description', null);
        $mform->setType('description', PARAM_NOTAGS);
        $mform->addRule('description', 'required', 'required', null, 'client');
        //$mform->addHelpButton('description','description','block_about_oc3');

        $mform->addElement('text', 'login_button_name', get_string('login_button_name','block_about_oc3'));
        $mform->setDefault('login_button_name', null);
        $mform->setType('login_button_name', PARAM_NOTAGS);
        //$mform->addHelpButton('login_button_name','login_button_name','block_about_oc3');

        $mform->addElement('text', 'login_button_link', get_string('login_button_link','block_about_oc3'));
        $mform->setDefault('login_button_link', null);
        $mform->setType('login_button_link', PARAM_NOTAGS);
        //$mform->addHelpButton('login_button_link','login_button_link','block_about_oc3');

        $mform->addElement('text', 'not_login_button_name', get_string('not_login_button_name','block_about_oc3'));
        $mform->setDefault('not_login_button_name', null);
        $mform->setType('not_login_button_name', PARAM_NOTAGS);
        //$mform->addHelpButton('not_login_button_name','not_login_button_name','block_about_oc3');

        $mform->addElement('text', 'not_login_button_link', get_string('not_login_button_link','block_about_oc3'));
        $mform->setDefault('not_login_button_link', null);
        $mform->setType('not_login_button_link', PARAM_NOTAGS);
        //$mform->addHelpButton('not_login_button_link','not_login_button_link','block_about_oc3');

        $this->add_action_buttons();
    }
}

