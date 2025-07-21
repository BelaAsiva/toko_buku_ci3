<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_login() {
    $CI =& get_instance();
    if (!$CI->session->userdata('logged_in')) {
        redirect('auth/login');
    }
}

function check_role($role) {
    $CI =& get_instance();
    if ($CI->session->userdata('role') !== $role) {
        show_error('Access denied. Role not allowed.', 403, 'Forbidden');
    }
}
