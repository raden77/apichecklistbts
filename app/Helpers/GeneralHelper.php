<?php


if (!function_exists('respons')) {
    function respons($code, $message, $data = [])
    {
        return response()->json([
            "message"   => $message,
            "status"    => $code,
            "data"  => $data,
        ],$code);
    }
}

