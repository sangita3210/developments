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
 * This plugin sends users a welcome message after logging in
 * and notify a moderator a new user has been added
 * it has a settings page that allow you to configure the messages
 * send.
 *
 * @package    local
 * @subpackage welcome
 * @copyright  2017 Bas Brands, basbrands.nl, bas@sonsbeekmedia.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//namespace local_autoemail;
namespace autoemailcontext_certificate;

defined('MOODLE_INTERNAL') || die();

class observer {

    public static function send_autoemail(\core\event\course_module_viewed $event) {
      global $CFG, $SITE,$DB;

     // print_object("sangita")||die();
       $eventdata = $event->get_data();

    // print_object($eventdata)||die();

       $adminvalue = $eventdata['userid'];
       $id = $eventdata['courseid'];
       //print_object($id)||die();

        $user = \core_user::get_user($eventdata ['relateduserid']);
        //$user1 = \core_user::get_user($eventdata ['objectid']);
        // print_object($user)||die();
        $uid = $eventdata ['relateduserid'];
        $roleassignid = $DB-> get_record('role_assignments',array('userid' => $uid),'*',MUST_EXIST);
         //print_object($roleassignid)||die();
         $rid = $roleassignid->roleid;
        // print_object($rid)||die();
        $roleid = $DB-> get_record('role',array('id' => $rid),'*',MUST_EXIST);

       // print_object($roleid)||die();
        $rolename = $roleid ->shortname;
        //print_object($rolename)||die();
        $sender = get_admin();
       //print_object($sender)||die();
        //print_object($user->email)||die();

        if (!empty($user->email)) {

            //print_object("hello");

            $config = get_config('autoemailcontext_certificate');
         //  print_object($config)||die();
            $moderator = clone($sender);

            if (!empty($config->auth_plugins)) {
                $auths = explode(',', $config->auth_plugins);
                if (!in_array($user->auth, $auths)) {
                    return '';
                }
            } 

            

            //print_object($moderator->email);

            $sender->email = $config->sender_email;
            $sender->firstname = $config->sender_firstname;
            $sender->lastname = $config->sender_lastname;

            // print_object($sender->email);
            // print_object($sender->firstname);
            // print_object("111111");
            // //print_object($config)||die();
            $messageuserenabled = $config->message_user_enabled;
            if($adminvalue!= 0){
               $messageuser = $config->message_user;
             }else {
                   $messageuser = $config->message_user_self;
            }  
             $messageuser = $config->message_mentor;

            $messageusersubject = $config->message_user_subject;

            // print_object($messageuserenabled);
            // print_object($messageuser);
            // print_object($messageusersubject);

            

            $welcome = new \autoemailcontext_certificate\message();
           //print_object($welcome)||die();
            $messageuser = $welcome->replace_values($user, $messageuser);
            $messageusersubject = $welcome->replace_values($user, $messageusersubject);
            
           // print_object($messageuser);
           // print_object($messageusersubject)||die();
            $messageusersubject1="Download certificata";

            if (!empty($messageuser) && !empty($sender->email) && $messageuserenabled) {
              
                email_to_user($user, $sender, $messageusersubject1, html_to_text($messageuser), $messageuser);
               // print_object("xxxx")||die();
            }

            
         }    
    }


  

}       