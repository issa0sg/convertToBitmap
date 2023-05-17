<?php

function debug($data, $die = false)
{
    echo "<pre>".print_r($data,1)."</pre>";
    if($die){
        die;
    }
}

function h($str)
{
    return htmlspecialchars($str);
}

function redirect($http=false)
{
    if($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}

function base_url()
{
    return PATH . '/';
}

/**
 * @param string $key
 * @param string $type
 * @return float|int|string
 */
function get($key, $type = 'i')
{
    $param = $key;
    $$param = $_GET[$param] ?? '';
    // $page = $_GET['page'] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

/**
 * @param string $key
 * @param string $type
 * @return float|int|string
 */
function post($key, $type = 's')
{
    $param = $key;
    $$param = $_POST[$param] ?? '';
    // $page = $_GET['page'] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

function __($key)
{
    // echo \wfm\Language::get($key);
}
function ___($key)
{
    // return \wfm\Language::get($key);
}