<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>;.

/**
 * @package     local_greetings
 * @copyright   2023 Muh Rofiadhim Rajab <muhammadrofiadhim@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 require_once('../../config.php'); // Memanggil file config php terluar
 require_once($CFG->dirroot .  '/local/greetings/lib.php'); 

//  require_login(); // membutuhkan login, kalau tidak login akan direct ke halaman login

 $context = context_system::instance();
 $PAGE->set_context($context); // set the page context
 $PAGE->set_url('/local/greetings/index.php'); // set the page url
 $PAGE->set_pagelayout('standard'); // set page layout
 $PAGE->set_title(get_string('pluginname', 'local_greetings')); // set title site
 $PAGE->set_heading(get_string('pluginname', 'local_greetings')); // set page heading

 echo $OUTPUT->header(); // display header (navbar etc.)

 if (isloggedin()) {
   echo local_greetings_get_greeting($USER);
 } else {
   echo get_string('greetinguser', 'local_greetings');
 }


 echo $OUTPUT->footer(); // display footer 




