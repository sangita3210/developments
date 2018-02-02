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
 * Form for editing a users profile
 *
 * @copyright 1999 Martin Dougiamas  http://dougiamas.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core_user
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    //  It must be included from a Moodle page.
}

require_once($CFG->dirroot.'/lib/formslib.php');

/**
 * Class user_editadvanced_form.
 *
 * @copyright 1999 Martin Dougiamas  http://dougiamas.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class edit_course_approve_intel_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        global $USER, $CFG, $COURSE;

        $mform = $this->_form;

        // Accessibility: "Required" is bad legend text.
        $strgeneral  = get_string('general');
        $strrequired = get_string('required');

        // Add some extra hidden fields.
        $mform->addElement('hidden', 'id');
        $mform->setType('id', core_user::get_property_type('id'));
        $mform->addElement('hidden', 'course', $COURSE->id);
        $mform->setType('course', PARAM_INT);

        // Print the required moodle fields first.
        $mform->addElement('header', 'moodle', $strgeneral);
		
		$options = array(
		'Curriculum item issue' => 'Curriculum item issue',
		'Course structure issue' => 'Course structure issue',
		'Content quality issue' => 'Content quality issue',
		'Assessment quality issue' => 'Assessment quality issue',
		);
		
		$select = $mform->addElement('select', 'reason', get_string('reason','local_course_approval_intel'), $options);
		$mform->setType('reason', PARAM_RAW);
		$mform->addRule('reason', get_string('required'), 'required', null);
		
		$mform->addElement('textarea', 'comment', get_string('commenttext', 'local_course_approval_intel'), 'wrap="virtual" rows="15" cols="35"');
		$mform->addHelpButton('comment', 'comment', 'local_course_approval_intel');
        $mform->setType('comment', PARAM_RAW);
		$mform->addRule('comment', get_string('required'), 'required', null);

		$btnstring = 'Save changes';
        $this->add_action_buttons(false, $btnstring);

//        $this->set_data();
    }

    /**
     * Extend the form definition after data has been parsed.
     */
    public function definition_after_data() {
        global $USER, $CFG, $DB, $OUTPUT;

        $mform = $this->_form;

    }

    /**
     * Validate the form data.
     * @param array $usernew
     * @param array $files
     * @return array|bool
     */
    public function validation($data,$files) {
        global $DB;
      /*   $errors = parent::validation($data);
        if (empty($data['reason'])) {
             $errors['idnumber'] = get_string('categoryidnumbertaken', 'error');
        }
        return $errors; */
        
    }
}


