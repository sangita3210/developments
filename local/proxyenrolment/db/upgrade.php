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
 * @package    local_proxyenrolment
 * @copyright  Prashant Yallatti<prashant@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */

    defined('MOODLE_INTERNAL') || die();

    require_once("$CFG->dirroot/lib/ddllib.php");


    /**
     * Handle database updates
     *
     * @param   int         $oldversion     The currently recorded version for this mod/plugin
     * @return  boolean
     * @uses $DB
     */
    function xmldb_local_proxyenrolment_upgrade($oldversion=0) {

        global $DB;


        $dbman = $DB->get_manager();
        $result = true;


        if ($oldversion < 2013052002) {

            try
            {

                // Use a stable to persist metacourse->group prefs
                $table = new xmldb_table('local_proxyenrol_metagroup');

                $table->add_field('id',     XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
                $table->add_field('course', XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, XMLDB_NOTNULL, false, null);
                $table->add_field('data',   XMLDB_TYPE_TEXT, null, false, XMLDB_NOTNULL, false, null);

                $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
                $table->add_index('course', XMLDB_INDEX_UNIQUE, array('course'));

                if (!$dbman->table_exists($table)) {
                    $dbman->create_table($table);
                }

                upgrade_plugin_savepoint(true, 2013052002, 'local', 'proxyenrolment');

            }
            catch (Exception $exc)
            {
                $result = false;
            }

        }

        return $result;

    } // 
