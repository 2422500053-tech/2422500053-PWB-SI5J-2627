<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function is_admin_logged_in()
{
    if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== TRUE) {
    redirect('admin/login');
}
}
