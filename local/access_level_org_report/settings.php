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
 * @package    local_access_level_org_report
 * @author     Prashant Yallatti<prashant@elearn10.com>
 * @copyright  Dhruv Infoline Pvt Ltd <lmsofindia.com>
 * @license    http://www.lmsofindia.com 2017 or later
 */
defined('MOODLE_INTERNAL') || die();
if(is_siteadmin()){
	$ADMIN->add('localplugins',new admin_category('local_access_level_org_report',get_string('pluginname','local_access_level_org_report')));

	$ADMIN->add('local_access_level_org_report',new admin_externalpage('accessreport',get_string('pluginname','local_access_level_org_report'),
		$CFG->wwwroot . '/local/access_level_org_report/access_level_org_report.php'));
}