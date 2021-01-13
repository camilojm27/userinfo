<?php
//https://stackoverflow.com/questions/41920223/navigation-drawer-contents-of-moodle-3-2-boost-theme
//https://moodle.org/mod/forum/discuss.php?d=345598#p1402870

function local_userinfo_extend_navigation(global_navigation $navigation)
{
    $item = $navigation->add('Plugin User Info', new moodle_url('/local/userinfo/index.php'), 0, null, 'local_userinfo');
    $item->showinflatnavigation = true;
}
