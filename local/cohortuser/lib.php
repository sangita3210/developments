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

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->dirroot/lib/accesslib.php");
require_once("$CFG->dirroot/lib/enrollib.php");
require_once("$CFG->dirroot/lib/grouplib.php");
require_once("$CFG->dirroot/lib/navigationlib.php");
require_once("$CFG->dirroot/group/lib.php");


/**
 * Hook to insert a link in global navigation menu block
 * @param global_navigation $navigation
 */
/*
/**
 * Hook to insert a link in settings navigation menu block
 *
 * @param settings_navigation $navigation
 * @param course_context      $context
 * @return void
 */
function local_cohortuser_extend_settings_navigation(settings_navigation $navigation, $context)
{
    // If not in a course context, then leave
    if ($context == null || $context->contextlevel != CONTEXT_COURSE) {
        return;
    }
    // When on front page there is 'frontpagesettings' node, other
    // courses will have 'courseadmin' node
    if (null == ($courseadmin_node = $navigation->get('courseadmin'))) {
        // Keeps us off the front page
        return;
    }
    if (null == ($useradmin_node = $courseadmin_node->get('users'))) {
        return;
    }
    // Add our links
    $useradmin_node->add(
        get_string('menu_name', local_cohortuser_plugin::PLUGIN_NAME),
        local_cohortuser_plugin::get_plugin_url('adduser', $context->instanceid),
        navigation_node::TYPE_SETTING,
        get_string('menu_short', local_cohortuser_plugin::PLUGIN_NAME),
        null, new pix_icon('i/adduser', 'adduser'));
}
class local_cohortuser_plugin
{
    /*
     * Class constants
     */
    const PLUGIN_NAME                 = 'local_cohortuser';
    const PLUGIN_PATH                 = 'local/cohortuser';
    const PLUGIN_FILEAREA             = 'uploads';
    const REQUIRED_CAP                = 'moodle/course:managegroups';
    const PARAM_COURSE_ID             = 'id';
    const MAXFILESIZE                 = 51200;
    const FORMID_ROLE_ID              = 'role_id';
    const FORMID_USER_ID_FIELD        = 'user_id';
    const FORMID_COHORT               = 'cohort';
    const FORMID_COHORT_ID            = 'cohort_id';
    const FORMID_FILES                = 'filepicker';
    const FORMID_METACOURSE           = 'metacourse';
    const FORMID_REMOVE_CURRENT       = 'remove';
    const DEFAULT_USER_ID_FIELD       = 'username';
    const DEFAULT_COHORT_ID_FIELD     = 'cohort_name';
     /**
     * @access private
     * @staticvar array
     */
    private static $user_id_field_options    = null;
    /**
     * Return a url for this plugin's interfaces
     *
     * @access public
     * @static
     * @param  int          $courseid        Optional id for course
     * @return moodle_url
     */
    public static function get_plugin_url($action, $courseid = 0)
    {
        global $CFG;
        return new moodle_url("$CFG->wwwroot/" . self::PLUGIN_PATH . "/{$action}.php", $courseid ? array(self::PARAM_COURSE_ID => $courseid) : null);
    }
    /**
     * Return list of valid options for user record field matching
     *
     * @access public
     * @static
     * @return array
     */
    public static function get_user_id_field_options()
    {
        if (self::$user_id_field_options == null) {
            self::$user_id_field_options = array(
                'username' => get_string('username'),
                'email'    => get_string('email'),
                'idnumber' => get_string('idnumber')
                );
        }
        return self::$user_id_field_options;
    }
    /**
     * Make a role assignment in the specified course using the specified role
     * id for the user whose id information is passed in the line data.
     *
     * @access public
     * @static
     * @param stdClass      $course           Course in which to make the role assignment
     * @param string        $ident_field      The field (column) name in Moodle user rec against which to query using the imported data
     * @param stored_file   $import_file      File in local repository from which to get enrollment and group data
     * @param int            $cohortid         cohortid is passed to adding users. 
     * @return string                         String message with results
     *
     * @uses $DB
     */
    public static function import_file(stdClass $course, $ident_field, $cohortid,stored_file $import_file)
    {
        global $DB;
        // Default return value
        $result = '';
        // Need one of these in the loop
        $course_context = context_course::instance($course->id);
        // Choose the regex pattern based on the $ident_field
        switch($ident_field)
        {
            case 'email':
            $regex_pattern = '/^"?\s*([a-z0-9][\w.%-]*@[a-z0-9][a-z0-9.-]{0,61}[a-z0-9]\.[a-z]{2,6})\s*"?(?:\s*[;,\t]\s*"?\s*([a-z0-9][\w\' .,&-]*))?\s*"?$/Ui';
            break;
            case 'idnumber':
            $regex_pattern = '/^"?\s*(\d{1,32})\s*"?(?:\s*[;,\t]\s*"?\s*([a-z0-9][\w\' .,&-]*))?\s*"?$/Ui';
            break;
            default:
            $regex_pattern = '/^"?\s*([a-z0-9][\w@.-]*)\s*"?(?:\s*[;,\t]\s*"?\s*([a-z0-9][\w\' .,&-]*))?\s*"?$/Ui';
            break;
        }
        // Get an instance of the enrol_manual_plugin (not to be confused
        // with the enrol_instance arg)
        // Open and fetch the file contents
        $fh = $import_file->get_content_file_handle();
        $line_num = 0;
        while (false !== ($line = fgets($fh))) {
            $line_num++;
            // Clean these up for each iteration
            if (!($line = trim($line))) continue;
            // Parse the line, from which we may get one or two
            // matches since the group name is an optional item
            // on a line by line basis
            if (!preg_match($regex_pattern, $line, $matches)) {
                $result .= sprintf(get_string('ERR_PATTERN_MATCH', self::PLUGIN_NAME), $line_num, $line);
                continue;
            }
            $ident_value    = $matches[1];
            $group_name     = isset($matches[2]) ? $matches[2] : '';
            // User must already exist, we import enrollments
            // into courses, not users into the system. Exclude
            // records marked as deleted. Because idnumber is
            // not enforced unique, possible multiple records
            // returned when using that identifying field, so
            // use ->get_records method to make that detection
            // and inform user
            $user_rec_array = $DB->get_records('user', array($ident_field => addslashes($ident_value), 'deleted' => 0));
            // Should have one and only one record, otherwise
            // report it and move on to the next
            $user_rec_count = count($user_rec_array);
            if ($user_rec_count == 0) {
                // No record found
                $result .= sprintf(get_string('ERR_USERID_INVALID', self::PLUGIN_NAME), $line_num, $ident_value);
                continue;
            } elseif ($user_rec_count > 1) {
                // Too many records
                $result .= sprintf(get_string('ERR_USER_MULTIPLE_RECS', self::PLUGIN_NAME), $line_num, $ident_value);
                continue;
            }
            $user_rec = array_shift($user_rec_array);
            $records = [];
            //check weather record is exist or not then insert into cohort_memeber rtable
            $exist_record = $DB->record_exists('cohort_members',array('cohortid'=>$cohortid,'userid'=>$user_rec->id));
            if(!$exist_record){                   
                $insert = new stdClass();
                $insert->cohortid = $cohortid;
                $insert->userid = $user_rec->id ;
                $insert->timeadded = time();
                $records[] = $insert;
            }
            if(count($records) > 0){
                $DB->insert_records('cohort_members',$records);
            }
        }
        fclose($fh);
             return (empty($result)) ? get_string('successful', self::PLUGIN_NAME) : $result;
        } // import_file
    } // class
