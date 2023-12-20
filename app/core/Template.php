<?php

/**
 * @author      Hi-Teak Digital Solution Ltd
 * @copyright   Copyright (c), 2023 Hi-Teak Digital Solution Ltd
 * @license     MIT public license
 */

 namespace App\Core;

/**
 * Class Template.
 */
class Template
{


    /**
     * pags title
     */
    public $title;

    /**
     * pags lang
     */
    public $lang;

    /**
     * Set Data
     */
    public $data;

    /**
     * base url
     */
    public $link;

    public function __construct()
    {
        $this->link = $this->baseUrl();
        $this->setLang(LANG);
        if (MULTILANG) {
            if (isset($_COOKIE['lang'])) {
                $lang = $_COOKIE['lang'];
            } else {
                $lang = 'en';
            }
            $this->lang = require('resources/translation/lang.' . $lang . '.php');
        }
    }

    /**
     * set default language
     * @param string $lang
     */
    public function setLang($lang)
    {
        if (!isset($_COOKIE['lang'])) {
            setcookie('lang', $lang, time() + (60 * 60 * 24 * 360), "/");
        }
        return $lang;
    }

    /**
     * header location
     * @param string $url
     * @param boolen $full_url
     */
    public function view($url, $full_url = false)
    {
        // set url header location
        if ($full_url) {
            return header('location:' . $this->link . '/' . $url);
        } else {
            return header('location:' . $url);
        }
    }

    public function Session()
    {
        ob_start();
        $currentTime = time() + 25200;
        $expired = 3600;
        // if session not set go to login page
        if (!isset($_SESSION['userId'])) {
            echo "<script> window.location = '" . $this->link . "/Login'; </script>";
            exit();
        }
        // if current time is more than session timeout back to login page
        if ($currentTime > $_SESSION['timeout']) {
            unset($_SESSION['userId']);
            session_destroy();
            echo "<script> window.location = '" . $this->link . "/Login'; </script>";
            exit();
        }

        // destroy previous session timeout and create new one
        unset($_SESSION['timeout']);
        $_SESSION['timeout'] = $currentTime + $expired;
    }


    /**
     * set default base url
     */
    public function baseUrl()
    {
        // Program to display complete URL
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $link = "https";
        else $link = "http";

        // Here append the common URL
        // characters.
        $link .= "://";

        // Append the host(domain name,
        // ip) to the URL.
        $link .= $_SERVER['HTTP_HOST'];
        // require configrtion file
        require_once 'config/config.php';

        // folder name
        $link .= URL_ROOT;

        return $link;
    }

    /**
     * conver img to base64
     */
    public function img($img)
    {
        $image = file_get_contents($img);
        $image_type = pathinfo($img, PATHINFO_EXTENSION);
        $base64_encode = 'data:image:/' . $image_type . ';base64,' . base64_encode($image);
        return $base64_encode;
    }

    /**
     * create object model class
     * @param string $model
     */
    public function models($models)
    {
        //Require model file
        require 'app/models/' . $models . '.php';
        //Instantiate model
        return new $models();
    }


    /**
     * Pages Title
     * @param string $title
     */
    public function title($title)
    {
        // set page title
        $this->title = $title;
    }

    /**
     * Pages Title
     * @param array $data
     */
    public function data($data)
    {
        // set page title
        $this->data = $data;
    }

    /**
     * view file name
     * @param string $name
     * @param bool $noInclude
     */
    public function load($name, $noInclude = false)
    {
        // exists file
        $file = 'templates/views/' . $name . '.php';
        if (file_exists($file)) {

            \App\Core\CSRF::generateToken();

            if ($noInclude) {
                require 'views/' . $name . '.php';
            } else {
                // include views file
                require 'templates/layout/Navbar.php';
                require 'templates/views/' . $name . '.php';
                require 'templates/layout/Footer.php';
            }
        } else {
            die("View does not exists.");
        }
    }
}
