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
 * @package local_metadata
 * @author Mike Churchward <mike.churchward@poetgroup.org>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright 2016 POET
 */

defined('MOODLE_INTERNAL') || die;

// Required for non-standard context constants definition.
//require_once($CFG->dirroot.'/local/metadata/lib.php');

if ($hassiteconfig) {
    $ADMIN->add('localplugins', new admin_category('autoemailfolder', get_string('autoemail', 'local_autoemail')));
    $contextplugins = core_component::get_plugin_list('autoemailcontext');

    // print_object($value)||die();
    // print_object($contextplugins)||die();

    // Create a settings page and add an enable setting for each metadata context type.
    $settings = new admin_settingpage('local_autoemail', get_string('settings'));
   //print_object($settings)||die();
   //print_object($ADMIN->fulltree)||die();

    if ($ADMIN->fulltree) {
            //print_object($contextplugins)||die();
        foreach ($contextplugins as $contextname => $contextlocation) {
            $item = new admin_setting_configcheckbox('autoemailcontext_'.$contextname.'/autoemailenabled',
                new lang_string('metadataenabled', 'autoemailcontext_'.$contextname), '', 0);
           //print_object($item)||die();
            $settings->add($item);
        }
    }
     $ADMIN->add('autoemailfolder', $settings);
    
    require('/home/server/work/newmoodle/local/autoemail/context/user/settings.php');
    require('/home/server/work/newmoodle/local/autoemail/context/password/settings.php');
    require('/home/server/work/newmoodle/local/autoemail/context/enrolment/settings.php');
    require('/home/server/work/newmoodle/local/autoemail/context/assignment/settings.php');
    require('/home/server/work/newmoodle/local/autoemail/context/certificate/settings.php');
    require('/home/server/work/newmoodle/local/autoemail/context/post/settings.php');
    require('/home/server/work/newmoodle/local/autoemail/context/quiz/settings.php');
    $settings = null;
}