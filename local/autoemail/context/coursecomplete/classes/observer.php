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
namespace autoemailcontext_coursecomplete\task;

defined('MOODLE_INTERNAL') || die();
//require_once('./../../config.php');
//require_once("./../../../../../config.php");

 function send_autoemail_coursecomplete(){
      global $CFG, $SITE,$USER,$DB;

  //  print_object("helllo11111")||die()/;

      $lastcron = $DB->get_field_sql("SELECT MAX(lastruntime) FROM {task_scheduled} WHERE component='autoemailcontext_coursecomplete'");
    // print_object($lastcron);

      $userrecord = $DB->get_records_sql('SELECT * FROM {course_completions} WHERE timestarted >= ?', array($lastcron));
      print_object($userrecord);
       foreach ($userrecord as $value) {
            $uid = $value->userid;
            $cid = $value->course;
            $userinfo = $DB->get_record('user',array('id' =>$uid));
            print_object($userinfo);
             $sender = get_admin();

             if (!empty($userinfo->email)) {

           print_object("emailbody");

            $config = get_config('autoemailcontext_coursecomplete');
            $config1 = get_config('local_autoemail');
          print_object($config);
            $moderator = clone($sender);

            if (!empty($config->auth_plugins)) {
                $auths = explode(',', $config->auth_plugins);
                if (!in_array($user->auth, $auths)) {
                    return '';
                }
            }

            $sender->email = $config->sender_email;
            $sender->firstname = $config->sender_firstname;
            $sender->lastname = $config->sender_lastname;

             print_object($sender->email);
             print_object($sender->firstname);
            // print_object("111111");
            // //print_object($config)||die();
            $messageuserenabled = $config->message_user_enabled;
            
           $messageuser = $config->message_user. $config1->signature_subject;
             
            $messageusersubject = $config->message_user_subject;

             $welcome = new \autoemailcontext_coursecomplete\message($cid);
           //print_object($welcome)||die();
            $messageuser = $welcome->replace_values($userinfo, $messageuser);
            $messageusersubject = $welcome->replace_values($userinfo, $messageusersubject);
            
            print_object($messageuser);
            print_object($messageusersubject);
           //  $messageusersubject1 = "course completion mesaage";

            if (!empty($messageuser) && !empty($sender->email) && $messageuserenabled) {
              
                email_to_user($userinfo, $sender, $messageusersubject, html_to_text($messageuser), $messageuser);
               //print_object("xxxx");
            }

            
         } 
       }
  }     
     