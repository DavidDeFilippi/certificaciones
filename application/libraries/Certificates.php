<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
class Certificates{
    function __construct()
    {
        require_once('certificates/cert-normal.php');
    }
}

?>