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
 * @package    mod_quiz
 * @copyright  2006 Eloy Lafuente (stronk7)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// function xmldb_local_oc3_team_upgrade($oldversion) {
//     global $DB;
//     $dbman = $DB->get_manager();
//     return true;
// }
defined('MOODLE_INTERNAL') || die();

/**
 * Quiz module upgrade function.
 * @param string $oldversion the version we are upgrading from.
 */
function xmldb_local_image_grid_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 20170701012) {

        $table = new xmldb_table('local_image_grid');

        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('image1', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image_link1', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image2', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image_link2', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image3', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image_link3', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image4', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image_link4', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image5', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image_link5', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image6', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('image_link6', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }
        upgrade_plugin_savepoint(true, 20170701012, 'local', 'image_grid');
    }

    return true;
}
