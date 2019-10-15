<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 12/05/2018
 * Time: 13:49
 */

require 'RestApi.php';

// all requests are sent through this script.
$api = new RestApi();
$api->getRequest();
