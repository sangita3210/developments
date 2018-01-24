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
   *  local_userenrols
   *
   *  This plugin will import user enrollments and group assignments
   *  from a delimited text file. It does not create new user accounts
   *  in Moodle, it will only enroll existing users in a course.
   *
   * @author      prashant <prashant@elearn10.com>
   * @copyright   (c)lmsofindia.com
   * @license     lms of india
   * @package     local
   * @subpackage  cohortuser
   */

  defined('MOODLE_INTERNAL') || die();
  $string['pluginname']               = 'Bulk Users Adding into Cohort';
  $string['menu_name']                = 'Add users into Cohort';
  $string['menu_short']               = 'Add user';
  $string['useradd']                  = 'User Added into Cohort';
  $string['successful']               = 'Users are added into selected Cohort';  
  $string['LBL_IMPORT_TITLE']         = 'Import User into Cohort';  
  $string['LBL_USER_ID_FIELD_help']   = 'Specify which field in the user record is represented in the first column of the import file.';
  $string['LBL_REMOVE_CURRENT']       = 'Remove existing:';
  $string['LBL_REMOVE_CURRENT_help']  = 'Remove any other group assignments users have.';
  $string['VAL_NO_FILES']             = 'No file was selected for import';
  $string['VAL_INVALID_SELECTION']    = 'Invalid selection';
  $string['VAL_INVALID_FORM_DATA']    = 'Invalid form data submission.';
  $string['INF_METACOURSE_WARN']      = '<b>WARNING</b>: You can not import enrollments directly into a metacourse. Instead, make enrollments into one of its child courses.<br /><br />';
  $string['ERR_PATTERN_MATCH']        = "Line %u: Unable to parse the line contents '%s'\n";
  $string['ERR_USERID_INVALID']       = "Line %u: Invalid user ident value '%s'\n";
  $string['ERR_USER_MULTIPLE_RECS']   = "Line %u: User ident value '%s' not unique. Multiple records found\n";
  $string['cname']                    = 'Cohort Name';
  $string['coption']                  = 'Cohort Options';
  $string['coption1']                 = 'Select Cohort Name';
  $string['upload_file']              = 'Upload File';
  $string['import_title']             = 'Import CSV User File';
  $string['HELP_PAGE_IMPORT']         = 'Import Users for Adding into Cohort';
  $string['cap']                      = 'Access is denied for this page';
  $string['LBL_IDENTITY_OPTIONS']     = 'User Identity';
  $string['LBL_USER_ID_FIELD']        = 'User field:';
  $string['LBL_USER_ID_FIELD_help']   = 'Specify which field in the user record is represented in the first column of the import file.';
  $string['LBL_IMPORT']               = 'Import';

  $string['HELP_PAGE_IMPORT']         = 'Import Enrollments & Group Assignments';
  $string['HELP_PAGE_IMPORT_help']    = '
  <p>
  Use this Cohortuser import plugin to import user into cohort. New user accounts will not be created, so each of the
    users listed in the input file must already have an account set up in the site.<br />
    <br />
    If a cohort name is include with any user record (line) then that user will be
    added to that cohort if it exists.
  </p>

  <ul>
    <li>Each line of the import file represents a signle record</li>
    <li>Each record should at least contain one field with a userid value, whether it be a username, an e-mail address, or an internal idnumber.</li>   
    <li>Blank lines in the import file will be skipped</li>
  </ul>
  
  <h3>Examples</h3>
  Internal idnumber value and group
  <pre>
    2144323548;Tuesday Laborary
    2144323623
    2144323647;Wednesday Laborary
    2144323638;Wednesday Laborary
  </pre>

  E-mail addresses
  <pre>
    smith-john@university.edu
    janedoe@university.edu, "Honors"
    alan.jones@university.edu, "HonorsPlus"
  </pre>

  Usernames (separated from group field with a tab character)
  <pre>
    johnsonf    "Presentation, Group One"
    samsel      Ten O\'Clock Testing
  </pre>';
  $string['note'] = 'Note : ';
  $string['desc'] = 'First we will select user identity dropdown option in that below UserName,Email,ID Number is geven selected user identity field we need to prepare csv file <br>Example -> if we select User Name in user identity field,csv file data should be<br>User Name
  <br>Username1<br>Username2<br> Username3<br>
  ';
  $string['desc1'] = 'Please selet the cohort from the dropdown below. The dropdown shows the list of cohorts, which are added in this course.';
  $string['cohortuser:adduser'] = 'Add Bulk Users into Cohort';
