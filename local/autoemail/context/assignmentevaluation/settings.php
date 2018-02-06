<?php

defined('MOODLE_INTERNAL') || die;

// Required for non-standard context constants definition.
//require_once($CFG->dirroot.'/local/metadata/lib.php');

if ($hassiteconfig) {

    $moderator = get_admin();
    $site = get_site();

    $settings = new admin_settingpage('local_assignmentevaluation', get_string('usersettings','autoemailcontext_assignmentevaluation'));
    $ADMIN->add('localplugins', $settings);

    $availablefields = new moodle_url('/local/autoemail/context/assignmentevaluation/index.php');
   

    $name = 'autoemailcontext_assignmentevaluation/message_user_enabled';
    $title = get_string('message_user_enabled', 'autoemailcontext_assignmentevaluation'); 
    $description = get_string('message_user_enabled_desc', 'autoemailcontext_assignmentevaluation', $availablefields->out());
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $settings->add($setting);

   

    $name = 'autoemailcontext_assignmentevaluation/message_user_subject';
    $default = get_string('default_user_email_subject', 'autoemailcontext_assignmentevaluation', $site->fullname);
    $title = get_string('message_user_subject', 'autoemailcontext_assignmentevaluation');
    $description = get_string('message_user_subject_desc', 'autoemailcontext_assignmentevaluation');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    
    $name = 'autoemailcontext_assignmentevaluation/message_user';
    $title = get_string('message_user', 'autoemailcontext_assignmentevaluation');
    $description = get_string('message_user_desc', 'autoemailcontext_assignmentevaluation');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

    
    $name = 'autoemailcontext_assignmentevaluation/sender_email';
    $title = get_string('sender_email', 'autoemailcontext_assignmentevaluation');
    $description = get_string('sender_email_desc', 'autoemailcontext_assignmentevaluation');
    $setting = new admin_setting_configtext($name, $title, $description, $moderator->email);
    $settings->add($setting);

    $name = 'autoemailcontext_assignmentevaluation/sender_firstname';
    $title = get_string('sender_firstname', 'autoemailcontext_assignmentevaluation');
    $description = get_string('sender_firstname_desc', 'autoemailcontext_assignmentevaluation');
    $setting = new admin_setting_configtext($name, $title, $description, $moderator->firstname);
    $settings->add($setting);

    $name = 'autoemailcontext_assignmentevaluation/sender_lastname';
    $title = get_string('sender_lastname', 'autoemailcontext_assignmentevaluation');
    $description = get_string('sender_lastname_desc', 'autoemailcontext_assignmentevaluation');
    $setting = new admin_setting_configtext($name, $title, $description, $moderator->lastname);
    $settings->add($setting);

   } 