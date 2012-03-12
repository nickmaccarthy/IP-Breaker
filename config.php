<?php

/*
 * CONFIG file for IP Breaker 
 *
 */

error_reporting(E_ALL);

// For large ammounts of IP's 512M should be more than enough.  
ini_set('memory_limit', '512M');

// Get our IPTools class loaded ( https://github.com/nickmaccarthy/IPTools/ )
require "IPTools/IPTools.class.php";

// Number of IP's before we will return back a text file instead of pushing IP's back to the browerser  ( I suggest to keep this below 10k )
$result_threshold = 3000;
