<?php
function url($path = '') {
    $basePath = '/gestion_ferme/public';
    return $basePath . '/' . trim($path, '/');
}
function csrf_field()
{
    $token = generate_csrf_token();
    return '<input type="hidden" name="_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
}

session_start(); // Ensure the session is started.

function generate_csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
if (!function_exists('method_field')) {
    function method_field($method)
    {
        return '<input type="hidden" name="_method" value="' . htmlspecialchars($method, ENT_QUOTES, 'UTF-8') . '">';
    }
}

