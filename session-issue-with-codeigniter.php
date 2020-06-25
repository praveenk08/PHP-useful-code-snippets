===========================================ERROR===========================================

Message: session_start(): Cannot send session cache limiter - headers already sent
 
Filename: Session/Session.php
 
Line Number: 140
 
Backtrace:
 
File: /Users/lionel/Documents/php/-3.0.0/index.php
Line: 292
Function: require_once

===========================================SOLUTION===========================================
Go to the folder applications/config and open up the config.php write this in the starting of file like this

<?php

  if (!defined('BASEPATH')) exit('No direct script access allowed');
    ob_start();
    /* Remaining Part Of your file
     .........................................
   */
