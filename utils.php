<?php

function sanitize($data) {
    return htmlspecialchars(trim($data));
}

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_required($value) {
    return !empty(trim($value));
}