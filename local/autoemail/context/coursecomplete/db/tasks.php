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
 * Copyright (C) 2007-2011 Catalyst IT (http://www.catalyst.net.nz)
 * Copyright (C) 2011-2013 Totara LMS (http://www.totaralms.com)
 * Copyright (C) 2014 onwards Catalyst IT (http://www.catalyst-eu.net)
 *
 * @package    local
 * @subpackage coursecomplete
 * 
 */

defined('MOODLE_INTERNAL') || die();

// $tasks = array(
//     array(
//         'classname' => 'local_autoemail\context\coursecomplete\task\cron_task',
//         'blocking'  => 0,
//         'minute'    => '*',
//         'hour'      => '1',
//         'day'       => '*',
//         'month'     => '*',
//         'dayofweek' => '*'
//     )
// );

$tasks = array(
    array(
        'classname' => 'autoemailcontext_coursecomplete\task\cron_task',
        'blocking'  => 0,
        'minute'    => '*',
        'hour'      => '*',
        'day'       => '*',
        'month'     => '*',
        'dayofweek' => '*'
    )
);
