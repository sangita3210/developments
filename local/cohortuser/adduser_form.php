<?php

// This file is part of the Certificate module for Moodle - http://moodle.org/
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
 * Handles uploading files
 *
 * @package    local_cohortuser
 * @copyright  Prashant Yallatti<prashant@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */

require_once($CFG->libdir.'/formslib.php');
/**
 * Form definition for the plugin
 *
 */
class local_cohortuser_index_form extends moodleform {

    /**
     * Define the form's contents
     *
     */
    public function definition()
    {
        global $DB,$COURSE;

        // Want to know if there are any meta enrol plugin
        // instances in this course.

        $metacourse = $this->_customdata['data']->metacourse;
        $this->_form->addElement('hidden', local_cohortuser_plugin::FORMID_METACOURSE, $metacourse ? '1' : '0');
        $this->_form->setType(local_cohortuser_plugin::FORMID_METACOURSE, PARAM_INT);

        if ($metacourse) {
            $this->_form->addElement('warning', null, null, get_string('INF_METACOURSE_WARN', local_cohortuser_plugin::PLUGIN_NAME));
        }
        $this->_form->addElement('header', 'identity', get_string('LBL_IDENTITY_OPTIONS', local_cohortuser_plugin::PLUGIN_NAME));
        // The userid field name drop down list
        $this->_form->addElement('select', local_cohortuser_plugin::FORMID_USER_ID_FIELD, get_string('LBL_USER_ID_FIELD', local_cohortuser_plugin::PLUGIN_NAME), $this->_customdata['data']->user_id_field_options);
        $this->_form->setDefault(local_cohortuser_plugin::FORMID_USER_ID_FIELD, local_cohortuser_plugin::DEFAULT_COHORT_ID_FIELD);
        $this->_form->addHelpButton(local_cohortuser_plugin::FORMID_USER_ID_FIELD, 'LBL_USER_ID_FIELD', local_cohortuser_plugin::PLUGIN_NAME);
        $this->_form->addElement('header', 'identity1', get_string('coption', local_cohortuser_plugin::PLUGIN_NAME));
        $this->_form->addElement('static', 'description1', get_string('note', 'local_cohortuser'),
            get_string('desc1', 'local_cohortuser'));
       // cohort name selection here 
        $cohorts = array(0 => get_string('coption1', local_cohortuser_plugin::PLUGIN_NAME));
        $sql = "SELECT c.id,c.name
        FROM {cohort} as c
        join {enrol} as e
        on e.name = c.name and e.enrol ='cohort'
        where e.courseid = $COURSE->id";
        $cohorts = $DB->get_records_sql_menu($sql);
        $this->_form->addElement('select', local_cohortuser_plugin::FORMID_COHORT_ID, get_string('cname', local_cohortuser_plugin::PLUGIN_NAME,''), $cohorts);
        $this->_form->setDefault(local_cohortuser_plugin::FORMID_COHORT_ID,
            local_cohortuser_plugin::DEFAULT_USER_ID_FIELD);
         $this->_form->addRule(local_cohortuser_plugin::FORMID_COHORT_ID, null, 'required', null, 'client');
        $this->_form->disabledIf(local_cohortuser_plugin::FORMID_COHORT_ID, local_cohortuser_plugin::FORMID_COHORT, 'eq', '0');
        // File picker
        $this->_form->addElement('header', 'upload', get_string('upload_file', local_cohortuser_plugin::PLUGIN_NAME));
        $this->_form->addElement('static', 'description', get_string('note', 'local_cohortuser'),
            get_string('desc', 'local_cohortuser'));
        $this->_form->addElement('filepicker', local_cohortuser_plugin::FORMID_FILES, null, null, $this->_customdata['options']);
        $this->_form->addRule(local_cohortuser_plugin::FORMID_FILES, null, 'required', null, 'client');
        $this->add_action_buttons(true, get_string('LBL_IMPORT', local_cohortuser_plugin::PLUGIN_NAME));
    } 
    public function validation($data, $files) {
        global $USER;
        $result = array();
        // User record field to match against, has to be
        // one of three defined in the plugin's class
        if (!array_key_exists($data[local_cohortuser_plugin::FORMID_USER_ID_FIELD], local_cohortuser_plugin::get_user_id_field_options())) {
            $result[local_cohortuser_plugin::FORMID_USER_ID_FIELD] = get_string('invaliduserfield', 'error', $data[local_cohortuser_plugin::FORMID_USER_ID_FIELD]);
        }
        // File is not in the $files var, rather the itemid is in
        // $data, but we can get to it through file api. At this
        // stage, the file should be in the user's draft area
        $area_files = get_file_storage()->get_area_files(context_user::instance($USER->id)->id, 'user', 'draft', $data[local_cohortuser_plugin::FORMID_FILES], false, false);
        $import_file = array_shift($area_files);
        if (null == $import_file) {
            $result[local_cohortuser_plugin::FORMID_FILES] = get_string('VAL_NO_FILES', local_cohortuser_plugin::PLUGIN_NAME);
        }
        return $result;
    } // validation
} // class  