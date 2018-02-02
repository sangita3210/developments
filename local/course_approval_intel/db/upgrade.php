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
 * Upgrade script for the quiz module.
 *
 * @package    course_approval
 * @copyright  lms of india
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

/**
 * Quiz module upgrade function.
 * @param string $oldversion the version we are upgrading from.
 */
function xmldb_local_course_approval_intel_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 20171122012) {

        $table = new xmldb_table('local_course_approval_intel');

        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('status', XMLDB_TYPE_INTEGER, '2', null, null, null, null);
        $table->add_field('courseid', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('sendby', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('approvedby', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('createdate', XMLDB_TYPE_INTEGER, '11', null, null, null, null);
        $table->add_field('modidate', XMLDB_TYPE_INTEGER, '11', null, null, null, null);
        $table->add_field('reason', XMLDB_TYPE_TEXT, null, null, null, null);
        $table->add_field('modidate', XMLDB_TYPE_TEXT, null, null, null, null);
        $table->add_key('comment', XMLDB_KEY_PRIMARY, array('id'));

        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }
        upgrade_plugin_savepoint(true, 20171122012, 'local', 'course_approval_intel');
    }

    return true;
}
