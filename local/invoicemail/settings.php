<?php

defined('MOODLE_INTERNAL') || die;
require_once $CFG->dirroot . '/local/invoicemail/lib.php';
require_once $CFG->dirroot . '/local/invoicemail/classes/admin_setting_upload.php';

// Required for non-standard context constants definition.
//require_once($CFG->dirroot.'/local/metadata/lib.php');

if ($hassiteconfig) {

    global $PAGE;
    $moderator = get_admin();
    $site = get_site();
   // get_string('usersettings','local_paypalwork')
   //  $settings = new admin_settingpage('paypalwork',"paypalwork plugin" );
   // $ADMIN->add('localplugins', $settings);

   // $page = new admin_settingpage('invoicemail',get_string('usersettings','local_invoicemail'));
   // $ADMIN->add('localplugins', $page);

   //  $availablefields = new moodle_url('/local/invoicemail/index.php');
       
   //  /*Insert First Logos*/

   //  $name = 'local_invoicemail/logo';
   //  $title = get_string('logo', 'local_invoicemail');
   //  $description = get_string('logodesc', 'local_invoicemail');
   //  $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
   //  $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo', 0, $opts);
   //  $setting->set_updatedcallback('theme_reset_all_caches');
   //  $page->add($setting);

    
   //  $name = 'local_invoicemail/footermsg';
   //  $title = get_string('footermsg', 'local_invoicemail');
   //  $description = get_string('footer_message_desc', 'local_invoicemail');
   //  $setting = new admin_setting_confightmleditor($name, $title, $description, '');
   //  $page->add($setting);
     

     // Add invoice settings page

   //  $page = new admin_settingpage('invoicemail',get_string('usersettings','local_invoicemail'));
   // /$ADMIN->add('localplugins', $page);

  $page = new admin_settingpage('local_invoicemail_settings',get_string('invoicemail_settings','local_invoicemail'));
  $ADMIN->add('localplugins', $page);
  $settings=new local_invoicemail_admin_setting_upload('invoicemail/uploadimage',
        get_string('uploadimage', 'local_invoicemail'), get_string('uploadimagedesc', 'local_invoicemail'), '');
  $page->add($settings);

  $settings=new admin_setting_configtextarea('local_invoicemail/invoicetext',get_string('invoicetext',
        'local_invoicemail'),get_string('invoicetext_desc','local_invoicemail'),'');
  $page->add($settings);


  
   } 