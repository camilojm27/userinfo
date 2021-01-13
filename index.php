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
 * @package     local_userinfo
 * @author      Camilo José Mezú Mina
 * @link        https://github.com/camilojm27/userinfo
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');




$PAGE->set_url(new moodle_url('/local/userinfo/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Información sobre usuarios');
$PAGE->requires->js_call_amd('local_userinfo/modal', 'init');
//$PAGE->navbar->add('Userinfo Plugins', new moodle_url('/local/userinfo/index.php'));

echo $OUTPUT->header();


if (is_siteadmin()){
    echo $OUTPUT->render_from_template('local_userinfo/index', null);

}
else{
    echo get_string('login', 'local_userinfo');
}


echo $OUTPUT->footer();
