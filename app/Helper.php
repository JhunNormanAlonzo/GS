<?php

use RealRashid\SweetAlert\Facades\Alert;

if (!function_exists('showConfirmDelete')) {
    function showConfirmDelete()
    {
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
    }
}
if (!function_exists('showAlert')) {
    function showAlert($status)
    {
        Alert::alert('Success', "$status Successfully!", 'success')
            ->autoClose(3000);
    }
}


if (!function_exists('customAlert')) {
    function customAlert($title, $message, $status)
    {
        Alert::alert($title, $message, $status)
            ->autoClose(3000);
    }
}
