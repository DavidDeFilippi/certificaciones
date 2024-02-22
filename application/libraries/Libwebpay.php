<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
class Libwebpay{
    function __construct()
    {
        require_once('libwebpay/libwebpay/webpay.php');
    }

}

?>