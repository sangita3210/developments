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
 * Metadata user context plugin language file.
 *
 * @package local_invoicemail
 * @author Mike Churchward <mike.churchward@poetgroup.org>
 * @copyright 2017 onwards Mike Churchward (mike.churchward@poetgroup.org)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;



$string['usersettings'] = 'User Paypal Settings';
$string['logo'] = 'Upload Mail Logo';
$string['logodesc'] = 'Upload your custom logo here if you want to add it to the logo list. Image works best if image size 					 is 100px * 100px.';

$string['footermsg'] = 'Footer message';
$string['footer_message_desc'] = 'Footer message send to users';
$string['pluginname'] = 'Invoicemail';
$string['globalhelp'] = 'This plugin for Moodle sends a configurable paypal payment message to users.
<br><br>
The plugin uses the event system in Moodle and will be triggerd when 
user pay the course payments using paypal<br>
<br>
The tables on this page show the available profile fields that can be used in the message template on this plugin\'s configuration page.
The values shown in this table are YOUR profile field values, they will be replaced by the recipients values when the welcome email is send.';
$string['configure'] = 'Configure this plugin';
$string['customprofilefields'] = 'Custom profile fields';
$string['invoicemail_settings'] = 'Invoicemail settings';
$string['uploadimage'] = 'Upload image';
$string['uploadimagedesc'] = "This button will take you to a new screen where you will be able to upload images.";
$string['invoicetext'] = 'Invoice custom text';
$string['invoicetext_desc'] = 'The text entered for Invoicemail footer.';
$string['unsupportedfiletype'] = 'Image type not supported (Please Use JPG images)'; 
$string['filesizelimit'] = 'File size should be less than 1MB'; 
$string['nofileselected'] = 'No file selected'; 
$string['userdetail'] = "User details";
$string['invoice'] = "Invoice";
$string['invoiceid'] = "Order id : ";
$string['companyname'] = "@Dhruv Infoline Pvt Ltd";
$string['history_title'] = "Course history";
$string['slno'] = 'Sl.No';
$string['cname'] = 'Course Name';
$string['invoice'] = 'Invoice';
$string['ccost'] = 'Course Price';
$string['itemdetail'] = '<span class="cost">Amount</span>-<span class="itemname">Course Name</span>';
$string['paypalinvoicetext'] = 'Paypal Invoice';
$string['ordersummary'] = 'Order Details';
$string['mailbody'] = '<p>You have successfully done the payment of course.In this mail one attachment is there please find it.</p>';
$string['mailsubject'] = 'Paypal Statement';

