<?php
/**
 * @package     local_userinfo
 * @author      Camilo Mezú Mina
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');




$PAGE->set_url(new moodle_url('/local/userinfo/index.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Información sobre usuarios');
$PAGE->requires->js_call_amd('local_userinfo/modal', 'init');
$PAGE->navbar->add('Userinfo Plugins', new moodle_url('/local/userinfo/index.php'));

echo $OUTPUT->header();

$templatecontext = (object)[
    'title' => "Example modal",
        "body"=>"Some example content for the body",
        "footer"=> "Footer text, right here!"
];

if (isloggedin()){
    echo $OUTPUT->render_from_template('local_userinfo/index', $templatecontext);

}
else{
    echo '<h1> Por favor inicia sesión </h1>';
}


echo $OUTPUT->footer();
