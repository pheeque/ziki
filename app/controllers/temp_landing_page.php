<?php

function temp_landing_page() {
    require_once SITE_ROOT . '/app/controllers/auth/Authentication/auth/googleinit.php';

    print_r($_SESSION);

    include 'views/temp_landing_page.php';
}